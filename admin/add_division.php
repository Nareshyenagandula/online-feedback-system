<?php
require('../db.php');
$errors = array(); 
if (isset($_REQUEST['name'])) {

  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
   $depname = mysqli_real_escape_string($conn, $_REQUEST['depname']);
 
  $user_check_query = "SELECT * FROM division WHERE name='$name' AND depname='$depname'  LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['name'] === $name){
      if ($user['depname']===$depname) {
   
      array_push($errors, "<div class='alert alert-warning'><b>Division already exists</b></div>");
    }}
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO division (name,depname) 
          VALUES('$name','$depname')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Division added successfully</b></div>";
    }else{
      $msg="<div color><b>Division not added</b></div>";
      echo mysqli_error($conn);
    }
  }
}






?>

<div class="container">
	<h3>ADD DIVISION</h3><hr>
	<form class="form-group" method="post" action=""> 

		<?php include('../errors.php'); 
    echo @$msg;

    ?>
    <div class="container">
      <label class="mt-3">Division Name:</label>
    <input type="text" name="name" class="form-control" required>
       <label class="mt-3">Department:</label>
    <select class="form-control" name="depname">
      <option>*Select department*</option>
      <option value="Humanity">Humanity</option>
      <option value="Computer">Computer</option>
      <option value="IT">IT</option>
      <option value="Civil">Civil</option>
      <option value="ETRX">ETRX</option>
      <option value="EXTC">EXTC</option>
    </select>
		<button class="btn btn-success mt-3" type="submit">ADD DIVISION</button>
	</div>
	</form>

</div>