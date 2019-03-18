<?php
session_start();
include('auth_student.php');
require('../db.php');

$errors = array(); 
$session=$_SESSION['email'];

$student_details = "SELECT id, fname, depname,year,semester,division,mobileno,rollno FROM s_reg where email='$session' ";
$student_result = mysqli_query($conn, $student_details);

if (mysqli_num_rows($student_result) > 0) {
  
    while($row = mysqli_fetch_array($student_result)) {
       $id=$row["id"];
       $student_id=$GLOBALS['id'];
       $fname=$row["fname"];
       $depname=$row["depname"];
       $dep=$GLOBALS['depname'];
       $year=$row["year"];
       $division=$row["division"];
       $divv=$GLOBALS['division'];
       $mobileno=$row["mobileno"];
       $rollno=$row["rollno"];
       $semester=$row["semester"];
       $ssem=$GLOBALS['semester'];

    }
} 

if (isset($_REQUEST['feedback'])) {
    $q1 = mysqli_real_escape_string($conn, $_REQUEST['q1']);
  $q2 = mysqli_real_escape_string($conn, $_REQUEST['q2']);
  $q3 = mysqli_real_escape_string($conn, $_REQUEST['q3']);
  $q4 = mysqli_real_escape_string($conn, $_REQUEST['q4']);
  $q5 = mysqli_real_escape_string($conn, $_REQUEST['q5']);
  $q6 = mysqli_real_escape_string($conn, $_REQUEST['q6']);
  $q7 = mysqli_real_escape_string($conn, $_REQUEST['q7']);
  $q8 = mysqli_real_escape_string($conn, $_REQUEST['q8']);
  $facultyname=mysqli_real_escape_string($conn,$_REQUEST['faculty_id']);
  $ff=$GLOBALS['facultyname'];


  $subject_detail=mysqli_query($conn,"select * from subject where faculty_id='$ff' and division='$divv' and depname='$dep' and sem='$ssem'");
  $subject_query=mysqli_fetch_array($subject_detail);
  $subject_name=$subject_query['id'];
  $subject_id=$GLOBALS['subject_name'];

  $check_stu_feed=mysqli_query($conn,"select * from feedback where student_id='$student_id' and faculty_id='$ff'");
  $r=mysqli_num_rows($check_stu_feed);

  if ($r==false) {
     $query = "INSERT INTO feedback (student_id,faculty_id) 
          VALUES('$student_id','$ff')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Feedback successfully submitted</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Feedback not submitted</b></div>";
      echo mysqli_error($conn);
    }
  $q1_p=($q1/5)*100;
  $q2_p=($q2/5)*100;
  $q3_p=($q3/5)*100;
  $q4_p=($q4/5)*100;
  $q5_p=($q5/5)*100;
  $q6_p=($q6/5)*100;
  $q7_p=($q7/5)*100;
  $q8_p=($q8/5)*100;

    $check=mysqli_query($conn,"select * from percent where faculty_id='$ff' and subject_id='$subject_id'");
     $cr=mysqli_num_rows($check);

    if ($cr==true) {
      $up_check=mysqli_query($conn,"select * from percent where faculty_id='$ff' and subject_id='$subject_id'");
      $up_data=mysqli_fetch_array($up_check);
      $up_q1=($q1_p+$up_data['Q1'])/2;
      $up_q2=($q2_p+$up_data['Q2'])/2;
      $up_q3=($q3_p+$up_data['Q3'])/2;
      $up_q4=($q4_p+$up_data['Q4'])/2;
      $up_q5=($q5_p+$up_data['Q5'])/2;
      $up_q6=($q6_p+$up_data['Q6'])/2;
      $up_q7=($q7_p+$up_data['Q7'])/2;
      $up_q8=($q8_p+$up_data['Q8'])/2;


      $update_fac=mysqli_query($conn,"update percent set Q1='$up_q1',Q2='$up_q2',Q3='$up_q3',Q4='$up_q4',Q5='$up_q5',Q6='$up_q6',Q7='$up_q7',Q8='$up_q8' where faculty_id='$ff' and subject_id='$subject_id'");
      
    }else{
 $query_s = "INSERT INTO percent (faculty_id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,subject_id) 
          VALUES('$ff','$q1_p','$q2_p','$q3_p','$q4_p','$q5_p','$q6_p','$q7_p','$q8_p','$subject_id')";
    $sql_s=mysqli_query($conn, $query_s);
  
  }

}else
{
   echo "<script type='text/javascript'> alert('You have already given to ".$ff."'); </script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Feedback System - STUDENT</title>
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
  <a class="navbar-brand" href="#">HELLO <?php  echo strtoupper($fname);  ?> ,  WELCOME TO STUDENT FEEDBACK SYSTEM</a>
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

<div class="jumbotron text-center col-lg-12 col-md-12">
  <div class="container">
  <form class="form-inline" method="post" action="">
         <div class="form-control">
      Name: <?php echo ($fname);  ?>
         </div>
         <div class="form-control">
      Department: <?php echo ($depname);  ?>
         </div>
         <div class="form-control">
      Year: <?php echo ($year);  ?>
         </div>
         <div class="form-control">
      Roll no: <?php echo ($rollno);  ?>
         </div>
         <div class="form-control">
      Mobile no: <?php echo ($mobileno);  ?>
         </div>
         <div class="form-control">
      Division: <?php echo ($division);  ?>
         </div>
         <div class="form-control">
      Semester: <?php echo ($semester);  ?>
         </div>
  </form>
</div>
</div>

<div class="container">
<h4 class="">Please give your answer about the following question by circling the given grade on the scale:</h4>
<button type="button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Excellent 5</button>
<button type="button" style="font-size:7pt;color:white;background-color:Brown;border:2px solid #336600;padding:3px">very good 4</button>
<button type="button" style="font-size:7pt;color:white;background-color:blue;border:2px solid #336600;padding:3px">good 3</button>
<button type="button" style="font-size:7pt;color:white;background-color:Black;border:2px solid #336600;padding:3px"> poor 2</button>
<button type="button" style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">fair 1</button>

 <form class="form-group mt-3" method="post" action="">
<table class="table table-bordered">
  <tr>
    <th>Select faculty:</th>
    <td>
      <select class="form-control" name="faculty_id">
      <?php
      $fac_query=mysqli_query($conn,"select subject.faculty_id,fname from subject,faculty_reg where depname='$depname' and sem='$semester' and division='$division' and subject.faculty_id=faculty_reg.id and subject.faculty_id NOT IN (select faculty_id from feedback where student_id='$student_id')");
      if (mysqli_num_rows($fac_query)>0) {
        while ($row_fac_name=mysqli_fetch_array($fac_query)) {
          $facultyid=$row_fac_name['faculty_id'];
           $facultyname=$row_fac_name['fname'];
          echo "<option value='".$facultyid."'>".$facultyname."</option>";
        }
      }else{
        echo "<script type='text/javascript'> alert('You have given feedback to all faculty'); </script>";
        echo "<option>".'No faculty present'."</option>";
      }
      ?>
    </select>
    </td>
  </tr>
</table>
<div class="container mt-3" >
  <h3 class="mt-3 text-center">FEEDBACK FORM</h3>
   <?php include('../errors.php'); 
    echo @$msg;
    ?>
  <table class="mt-3 table table-bordered">
    <tr>
      <td>Q.1] Subject Knowledge?</td>
      <td><input type="radio" name="q1" value="1" required>1</td>
    <td><input type="radio" name="q1" value="2">2</td>
    <td><input type="radio" name="q1" value="3">3</td>
    <td><input type="radio" name="q1" value="4">4</td>
    <td><input type="radio" name="q1" value="5">5</td>
    </tr>
    <tr>
      <td>Q.2] Interaction with student?</td>
      <td><input type="radio" name="q2" value="1" required>1</td>
    <td><input type="radio" name="q2" value="2">2</td>
    <td><input type="radio" name="q2" value="3">3</td>
    <td><input type="radio" name="q2" value="4">4</td>
    <td><input type="radio" name="q2" value="5">5</td>
    </tr>
    <tr>
      <td>Q.3] Doubt Solving?</td>
      <td><input type="radio" name="q3" value="1" required>1</td>
    <td><input type="radio" name="q3" value="2">2</td>
    <td><input type="radio" name="q3" value="3">3</td>
    <td><input type="radio" name="q3" value="4">4</td>
    <td><input type="radio" name="q3" value="5">5</td>
    </tr>
    <tr>
      <td>Q.4] HandWriting of her/his work?</td>
      <td><input type="radio" name="q4" value="1" required>1</td>
    <td><input type="radio" name="q4" value="2">2</td>
    <td><input type="radio" name="q4" value="3">3</td>
    <td><input type="radio" name="q4" value="4">4</td>
    <td><input type="radio" name="q4" value="5">5</td>
    </tr>
    <tr>
      <td>Q.5] Communication?</td>
      <td><input type="radio" name="q5" value="1" required>1</td>
    <td><input type="radio" name="q5" value="2">2</td>
    <td><input type="radio" name="q5" value="3">3</td>
    <td><input type="radio" name="q5" value="4">4</td>
    <td><input type="radio" name="q5" value="5">5</td>
    </tr>
    <tr>
      <td>Q.6] Presenting submatter clearly/systematically?</td>
      <td><input type="radio" name="q6" value="1" required>1</td>
    <td><input type="radio" name="q6" value="2">2</td>
    <td><input type="radio" name="q6" value="3">3</td>
    <td><input type="radio" name="q6" value="4">4</td>
    <td><input type="radio" name="q6" value="5">5</td>
    </tr>
    <tr>
      <td>Q.7] Use of ICT tools?</td>
      <td><input type="radio" name="q7" value="1" required>1</td>
    <td><input type="radio" name="q7" value="2">2</td>
    <td><input type="radio" name="q7" value="3">3</td>
    <td><input type="radio" name="q7" value="4">4</td>
    <td><input type="radio" name="q7" value="5">5</td>
    </tr>
    <tr>
      <td>Q.8] Class Control?</td>
      <td><input type="radio" name="q8" value="1" required>1</td>
    <td><input type="radio" name="q8" value="2">2</td>
    <td><input type="radio" name="q8" value="3">3</td>
    <td><input type="radio" name="q8" value="4">4</td>
    <td><input type="radio" name="q8" value="5">5</td>
    </tr>
  </table>
</div>
<button class="btn btn-success mt-3 mb-3 float-right" type="submit" name="feedback" id="disable">Submit</button>

</form>

</div>


<?php
if (isset($_REQUEST['update_password'])) {
   $op = mysqli_real_escape_string($conn, $_REQUEST['oldpwd']);
  $np = mysqli_real_escape_string($conn, $_REQUEST['newpwd']);
  $cp=mysqli_real_escape_string($conn,$_REQUEST['cpwd']);
  $opp=md5($op);

$pass_query="select pwd from s_reg where email='$session'";
$pass_sql=mysqli_query($conn,$pass_query);

$row=mysqli_fetch_array($pass_sql);
    $p=$row['pwd'];
  if($opp!=$p)
    {
   echo "<script type='text/javascript'> alert('You have Entered wrong password'); </script>";
    }
    
  elseif($np!=$cp)
    {
    echo "<script type='text/javascript'> alert('New password and confirm password must be same'); </script>";
    }
  else
  {
    mysqli_query($conn,"update s_reg set pwd='".md5($cp)."' where email='$session'");
    echo "<script type='text/javascript'> alert('Password have been Changed successfully'); </script>";
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
</body></html>

