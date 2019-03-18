<?php
require('../db.php');
$column=array('id','name','department','year','sem','email','mobile','pwd','division','rollno','gender');
$que="select * from s_reg";

if (isset($_POST['filter_depname'],$_POST['filter_year'],$_POST['filter_div'],$_POST['filter_sem']) && $_POST['filter_depname']!='' && $_POST['filter_year']!='' && $_POST['filter_div']!='' && $_POST['filter_sem']!='')
 {
	$que.='WHERE depname="'.$_POST['filter_depname'].'" AND year="'.$_POST['filter_year'].'" AND semester="'.$_POST['filter_sem'].'" AND division="'.$_POST['filter_div'].'"';
}


?>