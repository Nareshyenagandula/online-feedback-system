<?php
require('../db.php');

$depname=$_GET["depname"];
$sql_query=mysqli_query($conn,"select name from division where depname='$depname'");
while ($row_ajax=mysqli_fetch_assoc($sql_query)) {
	$divisionname=$row_ajax['name'];
	echo "<option value='".$divisionname."'>";
	 echo $divisionname; 
	 echo "</option>";

}


?> 