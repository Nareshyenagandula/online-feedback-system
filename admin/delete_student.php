<?php
require('../db.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from s_reg where id='$info'");
	header("location:index.php?info=manage_student");
?>