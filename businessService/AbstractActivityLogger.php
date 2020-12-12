<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AbstractActivityLogger {
    
    public $_object;
    public $_rootObject;
    
    public $logger;
    
    public function __construct($object) {
        $this->_object = $object;
        
        if (is_a($object, "ActivityLogger")){
            $this->_rootObject = $object->_rootObject;
        } else {
            $this->_rootObject = $object;
        }
        $object->intercepted = $this;
        
        $this->logger = new Logger('activity_logger');
        $this->logger->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/activities.log', Logger::DEBUG));
        $this->logger->info("created intercepter for " . get_class($object));
    }
    
    public function callMethod($method, $args){
        return call_user_func_array(array($this->_object, $method), $args);
    }
    
    public function __isset($name) {
        return isset($this->_rootObject->$name);
    }
    
    public function __unset($name) {
        unset($this->_rootObject->$name);
    }
    
    public function __set($name, $value) {
        $this->_rootObject->$name = $value;
    }
    
    public function __get($name) {
        return $this->_rootObject->$name;
    }
    
    public function __call($method, $args) {
        if ($method[0] == "_") {
            $method = substr($method, 1);
        }
        if (method_exists($this, "before")){
            $this->before($this->_rootObject, $method, $args);
        }
        if (method_exists($this, "around")) {
            $value = $this->around($this->_rootObject, $method, $args);
        } else {
            $value = $this->callMethod($method, $args);
        }
        if (method_exists($this, "after")) {
            $this->after($this->_rootObject, $method, $args);
        }
                            
        return $value;
    }
}