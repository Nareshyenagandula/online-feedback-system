<?php

require('../db.php');
$errors = array(); 

  if (isset($_REQUEST['upload'])) {
    $ok = true;
    $filename = $_FILES['file']['tmp_name'];
    $file = fopen($filename, "r");
    $count=0;
                                      
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{   
  $c_dep=ucfirst($emapData[1]);
  $c_div=ucfirst($emapData[4]);
  $c_year=strtolower($emapData[2]);
  $c_sem=strtoupper($emapData[3]);

     $user_check_query_ex = "SELECT * FROM s_reg WHERE email='$emapData[6]' LIMIT 1";
  $result_ex = mysqli_query($conn, $user_check_query_ex);
  $user_ex = mysqli_fetch_assoc($result_ex);
  
  if ($user_ex) { 
    if ($user_ex['email'] === $emapData[6]) {
      array_push($errors, "<div class='alert alert-warning'><b>Email already exists</b>-> ".$emapData[6]."</div>");
    }
  }

$count++;

    if (count($errors) == 0 && $count>1){                                 
      $sql = "INSERT into s_reg(fname,depname,year,semester,division,mobileno,email,rollno,pwd) values ('$emapData[0]','$c_dep','$c_year','$c_sem','$c_div','$emapData[5]','$emapData[6]','$emapData[7]','".md5($emapData[8])."')";
      $sql_check=mysqli_query($conn,$sql);
    }                                            
    
  }}
?>
<div>
  <?php include('../errors.php');  ?>
</div>