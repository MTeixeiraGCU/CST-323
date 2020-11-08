<?php
/**
 * This is a partial file to display a list of user
 */

?>
<section class="searchFormWrapper">
    <table class="searchResultList">
    	<thead>
    		<tr>
        		<th>ID</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Position</th>
    		</tr>
    	</thead>
    	
        <?php
            foreach($employees as $employee) {
                echo "<tr onclick=\"window.location.href='../handlers/editEmployee.php?ID=" . $employee['ID'] . "';\">";
                echo "<td>" . $employee['ID'] . "</td>" . "<td>" . $employee['FIRST_NAME'] . "</td>". "<td>" . $employee['LAST_NAME'] . "</td>". "<td>" . $employee['POSITION'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>