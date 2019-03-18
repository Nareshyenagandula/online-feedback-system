<?php

require('../db.php');


$email="";
$errors = array(); 
if (isset($_REQUEST['email'])) {

  $name = mysqli_real_escape_string($conn, $_REQUEST['fname']);
  $designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
   $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
  $pwd = mysqli_real_escape_string($conn, $_REQUEST['pwd']);

    if(strlen($mobileno)<10 || strlen($mobileno)>10)
     { array_push($errors, "<div class='alert alert-warning'><b>Mobile number must be 10 digit</b></div>"); }
    
  $user_check_query = "SELECT * FROM faculty_reg WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['email'] === $email) {
      array_push($errors, "<div class='alert alert-warning'><b>Email already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO faculty_reg (fname,designation,mobileno,email,pwd) 
          VALUES('$name','$designation','$mobileno','$email','".md5($pwd)."')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Faculty added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Faculty not added</b></div>";
    }
  }
}
?>
<div class="container">
<div class="float-right">
 <form method="post" action="index.php?info=upload_fac" enctype="multipart/form-data" class="form-group">
  <input type="file" name="file" accept=".csv">
  <input type="submit" name="upload" value="upload" class="btn">
 </form>
</div>

  <form class="form-group" method="post" action="">
    <h3 class="mt-3">ADD FACULTY</h3><hr>
    <?php include('../errors.php'); 
    echo @$msg;
    ?>
   <div class="container">
    <label class="mt-3">Name:</label>
    <input type="text"  name="fname" class="form-control" required>
   <label class="mt-3">Designation:</label>
              <input type="text"  name="designation" class="form-control" required>
    <label class="mt-3">Mobile Number:</label>
       <input type="text" class="form-control" name="mobileno"  required>
   <label class="mt-3">Email Id :</label>
              <input type="email"   name="email" class="form-control" required>
   <label class="mt-3">Password :</label>
              <input type="password"   name="pwd" class="form-control" required>
    <button class="btn btn-success mt-3" type="submit">ADD FACULTY</button>
   </div>
  </form>
</div>