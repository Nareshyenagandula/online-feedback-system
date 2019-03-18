<?php
session_start();

include('auth_faculty.php');
require('../db.php');
$errors = array(); 
$session=$_SESSION['email'];

$query="select * from faculty_reg where email='$session'";
$sql=mysqli_query($conn,$query);

$row=mysqli_fetch_array($sql);
$name=$row['id'];
$fac_n=$row['fname'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Feedback System - FACULTY</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body>

	<nav class="navbar navbar-expand-md bg-info navbar-dark sticky-top col-lg-12 col-md-12">
		<div class="container">
  <a class="navbar-brand" href="#">WELCOME,   <?php echo strtoupper($fac_n);   ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav"> 
      <li class="nav-item mr-3">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-key"></i>change password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a>
      </li>
    </ul> 
  </div>
</nav>
<div class="container">
  <?php 
   echo @$error; ?>
</div>

<div class="container mt-3">
  <form class="form-inline" method="post" action="">
    <select class="form-control" name="sub">
      <?php
      $subject_name=mysqli_query($conn,"select * from subject where faculty_id='$name'");
      if (mysqli_num_rows($subject_name)>0) {
        while ($subject_detail=mysqli_fetch_array($subject_name)) {
          $sss=$subject_detail['subject_name'].'-'.$subject_detail['division'];
          echo "<option value='".$subject_detail['id']."'>".$subject_detail['subject_name']."-".$subject_detail['division']."</option>";
        }
      }else{
        echo "<option>".'No subject present'."</option>";
      }
      ?>
    </select>
    <button class="btn btn-info ml-3" type="submit" name="subject_search">Show</button>
  </form>
</div>

<?php

if (isset($_REQUEST['subject_search'])) {
   $fac_sub_name = mysqli_real_escape_string($conn, $_REQUEST['sub']);
    $check_query=mysqli_query($conn,"select * from percent where faculty_id='$name' and subject_id='$fac_sub_name'");
    $count_query=mysqli_query($conn,"select id from feedback where faculty_id='$name'");
    $count_result=mysqli_num_rows($count_query);
      if (mysqli_num_rows($check_query)>0) {
       while ($percent_row=mysqli_fetch_array($check_query)) {
         $percent_q1=$percent_row['Q1'];
         $percent_q2=$percent_row['Q2'];
         $percent_q3=$percent_row['Q3'];
         $percent_q4=$percent_row['Q4'];
         $percent_q5=$percent_row['Q5'];
         $percent_q6=$percent_row['Q6'];
         $percent_q7=$percent_row['Q7'];
         $percent_q8=$percent_row['Q8'];
         $total_percent=($percent_q1+$percent_q2+$percent_q3+$percent_q4+$percent_q5+$percent_q6+$percent_q7+$percent_q8)/8;

         echo "<div class='container mt-3'>";
         echo "<div>";
         echo "Total no of students : <div class='badge badge-pill badge-primary'>",$count_result;
         echo "</div>";
         echo "</div>";
         echo "<table class='table table-bordered  table-hover mt-3'>";
         echo "<tr>";
         echo "<td>Subject Knowledge</td>";
         echo "<td>".$percent_q1."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Interaction with student</td>";
         echo "<td>".$percent_q2."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Doubt Solving</td>";
         echo "<td>".$percent_q3."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>HandWriting of her/his work</td>";
         echo "<td>".$percent_q4."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Communication</td>";
         echo "<td>".$percent_q5."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Presenting submatter clearly/systematically</td>";
         echo "<td>".$percent_q6."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Use of ICT tools</td>";
         echo "<td>".$percent_q7."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>Class Control</td>";
         echo "<td>".$percent_q8."%"."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<th>OVERALL TOTAL</th>";
         echo "<th>".$total_percent."%"."</th>";
         echo "</tr>";
         echo "</table>";
         echo "</div>";
       }
        
      }else
      {
        echo "<div class='alert alert-warning mt-3'>FEEDBACK IS NOT GIVEN YET</div>";
      }
}
?>

    
<?php

if (isset($_REQUEST['update_password'])) {

 $op = mysqli_real_escape_string($conn, $_REQUEST['oldpwd']);
 $np = mysqli_real_escape_string($conn, $_REQUEST['newpwd']);
 $cp=mysqli_real_escape_string($conn,$_REQUEST['cpwd']);
 $opp=md5($op);

$pass_query="select pwd from faculty_reg where email='$session'";
$pass_sql=mysqli_query($conn,$pass_query);

$row=mysqli_fetch_array($pass_sql);
    $p=$row['pwd'];
  if($opp!=$p)
    {
   echo "<script type='text/javascript'> alert('You entered wrong password'); </script>";
    }
    
  elseif($np!=$cp)
    {
      echo "<script type='text/javascript'> alert('New password and confirm password must be same'); </script>";
    }
  else
  {
    mysqli_query($conn,"update faculty_reg set pwd='".md5($cp)."' where email='$session'");
   echo "<script type='text/javascript'> alert('Password changed successfully'); </script>";
  }
  }
?>
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="dialog">
    <div class="modal-content">
      <div class="modal-body">
       <form class="form-group" method="post" action="">
         <label class="mt-2">OLD PASSWORD:</label>
         <input type="password" name="oldpwd" class="form-control" required>
         <label class="mt-2">NEW PASSWORD:</label>
         <input type="password" name="newpwd" class="form-control" required>
         <label class="mt-2">CONFIRM PASSWORD:</label>
         <input type="password" name="cpwd" class="form-control" required>
         <button class="btn btn-success mt-2" type="submit" name="update_password">SUBMIT</button>
       </form>
      </div>
    </div>
  </div> 
</div>
</body>
</html>