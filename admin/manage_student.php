<div class="container table-responsive mt-3">
	<table id="data" class="table table-bordered table-sm" >
		<thead class="thead-light">
			<th>Id</th>
			<th>Name</th>
			<th>Department</th>
			<th>Year</th>
			<th>Semester</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Division</th>
			<th>Roll No</th>
			<th>Update</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php
			require('../db.php');
			$que=mysqli_query($conn,"select * from s_reg");
			while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['depname']."</td>";
		echo "<td>".$row['year']."</td>";
		echo "<td>".$row['semester']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['division']."</td>";
		echo "<td>".$row['rollno']."</td>";
		echo "<td><a href='index.php?id=$row[id]&info=update_student'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='#'  onclick='deletes($row[id])'><i class='fas fa-trash-alt'></i></a></td>";
		echo "</tr>";

	}
	?>
			
		</tbody>
	</table>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#data').DataTable();
} );
</script>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_student.php?id='+id;
     }
}
</script>	

