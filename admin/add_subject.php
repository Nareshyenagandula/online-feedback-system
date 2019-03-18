<?php
require('../db.php');
$errors = array(); 
if (isset($_REQUEST['subject_name'])) {

  $faculty_name = mysqli_real_escape_string($conn, $_REQUEST['faculty_name']);
  $depname = mysqli_real_escape_string($conn, $_REQUEST['depname']);
  $semester = mysqli_real_escape_string($conn, $_REQUEST['sem']);
  $subject = mysqli_real_escape_string($conn, $_REQUEST['subject_name']);
   $division = mysqli_real_escape_string($conn, $_REQUEST['division']);


   if (empty($subject)) { array_push($errors, " <div class='alert alert-warning'><b>subject is required</b></div>"); }
 
 
  $user_check_query = "SELECT * FROM subject WHERE faculty_id='$faculty_name' AND depname='$depname' AND sem='$semester' AND subject_name='$subject' and division='$division' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['faculty_id'] === $faculty_name){
    	if($user['depname'] === $depname){
    		if($user['sem'] === $semester) {
          if ($user['subject_name']===$subject) {
            if ($user['division']===$division) {
              
      array_push($errors, "<div class='alert alert-warning'><b>Subject already exists</b></div>");
    }}}}}
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO subject (faculty_id,depname,sem,subject_name,division) 
          VALUES('$faculty_name','$depname','$semester','$subject','$division')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>subject added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>subject not added</b></div>";
      echo mysqli_error($conn);
    }
  }
}

?>
<div class="container">
	<h3 class="mt-3">ADD SUBJECT</h3><hr>

	<form class="form-group" method="post" action="">
		 <?php include('../errors.php'); 
    echo @$msg;

    ?>
    <div class="container">
      <label class="mt-3">Subject Name:</label>
    <input type="text" name="subject_name" class="form-control" required>

		<label class="mt-3">Faculty:</label>
		<select class="form-control" name="faculty_name">
      <?php
      $student_query="select * from faculty_reg";
      $student_sql=mysqli_query($conn,$student_query);
      while ($row=mysqli_fetch_array($student_sql)) {
        
      echo "<option value='".$row['id']."'>".$row['fname']."</option>";    }
      ?>
    </select>
	<label class="mt-3">Department:</label>
    <select class="form-control" name="depname" onchange="change_depname()" id="depname_id">
      <option>*select department*</option>
      <option value="Humanity">Humanity</option>
    	<option value="Computer">Computer</option>
    	<option value="IT">IT</option>
    	<option value="Civil">Civil</option>
    	<option value="ETRX">ETRX</option>
    	<option value="EXTC">EXTC</option>
    </select>
		 <label class="mt-3">Semester:</label>
    <select class="form-control" name="sem">
      <option>*select semester*</option>
      <option value="I">I</option>
      <option value="II">II</option>
      <option value="III">III</option>
      <option value="IV">IV</option>
      <option value="V">V</option>
      <option value="VI">VI</option>
      <option value="VII">VII</option>
      <option value="VIII">VIII</option>
    </select>
    <label class="mt-3">Div:</label>
    <select class="form-control" name="division" id="div">
    </select>
		<button class="btn btn-success mt-3" type="submit">ADD SUBJECT</button>
	</div>
	</form>
</div>
<script type="text/javascript">
  function change_depname() {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","getajax.php?depname="+document.getElementById("depname_id").value,false);
    xmlhttp.send(null);
    document.getElementById("div").innerHTML=xmlhttp.responseText;
  }
</script>