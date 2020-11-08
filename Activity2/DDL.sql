-- -----------------------------------------------------
-- Schema cst323_activities
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cst323_activities` ;
CREATE SCHEMA `cst323_activities` DEFAULT CHARACTER SET utf8 ;
USE `cst323_activities` ;

-- -----------------------------------------------------
-- Table `cst323_activities`.`employees`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cst323_activities`.`employees` ;
CREATE TABLE `cst323_activities`.`employees` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(50) NOT NULL,
  `LAST_NAME` VARCHAR(50) NOT NULL,
  `POSITION` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 860
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cst323_activities`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cst323_activities`.`users` ;
CREATE TABLE `cst323_activities`.`users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` VARCHAR(50) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Initial Data
-- -----------------------------------------------------
INSERT INTO `cst323_activities`.`users` (`USERNAME`, `PASSWORD`) VALUES ("tommy", "12344321") ;