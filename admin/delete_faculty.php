<?php
require('../db.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from faculty_reg where id='$info'");
	header("location:index.php?info=manage_faculty")
?>