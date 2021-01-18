<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM student WHERE studentId=" . $_POST['studentId'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete student</div>";
	}
}

$sql= "SELECT p.* , s.* FROM parent p,student s WHERE p.parentId=s.Parent_parentId";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>SENARAI Pelajar</h2> 
	<?php //echo "<td><a href='insert_parent.php?' class='btn btn-success'>Daftar Pelajar Baru</a></td>";?>
	<br>
	<br>
	
	<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Pelajar</th>
			<th>Nama Bapa</th>
			<th>Nombor Telefon</th>
			<th width="70px">Delete</th>
			<th width="70px">EDIT</th>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['studentId']."' name='studentId' />"; //added
		echo "<tr>";
		echo "<td>".$row['fullName'] . "</td>";
		echo "<td>".$row['fullNameP'] . "</td>";
		echo "<td>".$row['phoneNumber'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit_student.php?id=".$row['studentId']."' class='btn btn-info'>Edit</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>No Record Found";
}
?> 
</div>

<?php 

 require_once 'footer.php';