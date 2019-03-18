<div class="container table-responsive mt-3">
	<table id="data" class="table table-bordered table-sm" >
		<thead class="thead-light">
			<th>Id</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Email</th>
			<th>Mobile NO</th>
			<th>Update</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php
			require('../db.php');
			$que=mysqli_query($conn,"select * from faculty_reg");
			while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['designation']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td><a href='index.php?id=$row[id]&info=update_faculty'><i class='fas fa-pencil-alt'></i></a></td>";
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
        window.location.href='delete_faculty.php?id='+id;
     }
}
</script>

