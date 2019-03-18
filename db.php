<?php

$servername="localhost";
$username="root";
$password="";
$dbname="project";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
	echo " connected";
}
else
{

}


/*$create="CREATE DATABASE project";
$sql=mysqli_query($conn,$create);*/


/*$table="CREATE TABLE f_reg(id int(10) AUTO_INCREMENT PRIMARY KEY,fname varchar(30) not null,lname varchar(40) not null,depname varchar(20) not null,mobileno int(10) not null,email varchar(50) not null,password varchar(50) not null)";
$sql=mysqli_query($conn,$table);*/

/*$table="CREATE TABLE division(id int(10) AUTO_INCREMENT PRIMARY KEY,name varchar(30) not null,depname  varchar(10) not null,semester varchar(10) not null)";



$sql=mysqli_query($conn,$table);

if ($sql) {
	echo "created";
}else
{
	 echo mysqli_error($conn);
}*/


?>