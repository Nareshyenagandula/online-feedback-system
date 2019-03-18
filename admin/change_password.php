<?php


require('../db.php');
if (isset($_REQUEST['oldpwd'])) {


   $op = mysqli_real_escape_string($conn, $_REQUEST['oldpwd']);
  $np = mysqli_real_escape_string($conn, $_REQUEST['newpwd']);
  $cp=mysqli_real_escape_string($conn,$_REQUEST['cpwd']);
  $opp=md5($op);


  $query="select pwd from admin";
  $sql=mysqli_query($conn,$query);

  $res=mysqli_fetch_assoc($sql);
  $p=$res['pwd'];
  if ($opp!=$p) {
      $err="<div class='alert alert-warning'><b>You Enterd wrong old password</b></div>";
  }
 elseif($np!=$cp)
        {
        $err="<div class='alert alert-warning'>b>New Password and confirm password must be same</b></div>";
        }
    else
    {
        mysqli_query($conn,"update admin set pwd='".md5($cp)."'");
        $err="<div class='alert alert-success'><b>Password have been Changed successfully !!</b></div>";
    }

  

  }




?>




<div class="container">
    <form class="form-group" method="post" action="">
        <?php
        echo  @$err;

        ?><br>
         <label class="mt-2">OLD PASSWORD:</label>
         <input type="password" name="oldpwd" class="form-control" required>
         <label class="mt-2">NEW PASSWORD:</label>
         <input type="password" name="newpwd" class="form-control" required>
         <label class="mt-2">CONFIRM PASSWORD:</label>
         <input type="password" name="cpwd" class="form-control" required>
         <button class="btn btn-success mt-2" type="submit" name="update_password">SUBMIT</button>
       </form>
</div>