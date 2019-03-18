<!DOCTYPE html>
<html>
<head>
	<title>feedback</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-secondary navbar-dark col-lg-12 col-md-12">
    <div class="container"> 
        <a class="navbar-brand" href="index.php">ONLINE FEEDBACK FORM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item mr-3">
        <a class="nav-link" href="index.php?info=faculty_login"><b>Faculty</b></a>
</li>
<li class="nav-item mr-3">
        <a class="nav-link" href="index.php?info=admin_login"><b>Admin</b></a>
</li>
<li class="nav-item mr-3">
        <a class="nav-link" href="index.php?info=student_login"><b>Student</b></a>
    </li>
    </ul>
  </div>  
</nav> 
<?php
@$info=$_GET['info'];
          if($info!="")
          {
            if($info=="student_login")
             {
             include('student_login.php');
             }
              else if($info=="faculty_login")
             {
             include('faculty_login.php');
             }
             elseif ($info=="admin_login") {
               include('admin_login.php');
          }
          }
?>
</body>
</html>