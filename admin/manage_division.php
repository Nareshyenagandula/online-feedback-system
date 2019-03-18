<?php
require('../db.php');


$name="";



if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Id</th>";
	echo "<th>Division</th>";
	echo "<th>Department</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"select * from division where CONCAT(`name`,'year',`depname`) LIKE '%".$name."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['depname']."</td>";
		echo "<td><a href='index.php?id=$row[id]&info=update_division'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='#'  onclick='deletes($row[id])'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<script type='text/javascript'>
	alert('Division is not found');
</script>";
}
	
}




	
?>


<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<input type="text" name="name" class="form-control" placeholder="ENTER DIVISION">
	</form>
</div>
<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_division.php?id='+id;
     }
}
</script>	