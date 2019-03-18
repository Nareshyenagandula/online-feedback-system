<?php
session_start();
require('db.php');

$username="";
$errors = array(); 


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  if (empty($username)) {
    array_push($errors, "<div class='alert alert-warning'><b>Username is required</b></div>");
  }
  if (empty($pwd)) {
    array_push($errors, "<div class='alert alert-warning'><b>Password is required</b></div>");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM admin WHERE username='$username' AND pwd='".md5($pwd)."'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header("location:admin/index.php");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");

    }
  }
}

?>
<div class="row">
	<div class="col-md-4 col-sm-12" ></div>
	<div class="col-md-4 col-sm-12" >
		<div class="container">
		<h3 class="lead mt-4 text-success"><b>ADMIN</b></h3>
		<form class="form-group mt-2 text-center" method="post" action="">
			<?php include('errors.php'); ?>
			<input type="text" name="username" class="form-control mt-2" placeholder="USERNAME">
			<input type="password" name="pwd" class="form-control mt-2" placeholder="PASSWORD">
			<button class="btn btn-success mt-2" type="submit" id="toggle" name="login_user">Login</button>
		</form>
	</div>
	</div>
    <div class="col-md-4 col-sm-12" ></div>
</div>

