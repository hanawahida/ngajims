<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

/*if( isset($_POST['delete'])){
	$sql = "DELETE FROM attendance WHERE Student_studentId=" . $_POST['Student_studentId'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete student</div>";
	}
}
*/

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0; //id ni sangat2lah berguna
$sql = "SELECT p.*, s.* FROM parent p, student s WHERE p.parentID=s.Parent_parentId AND p.parentID={$id}";
$result = $con->query($sql); 

//echo "<td><a href='insert_student.php?id=".$row['Parent_parentId']."' class='btn btn-success'>Daftar Nama Anak</a></td>";

echo "<h2>Senarai Anak Didaftarkan</h2>";

if( $result->num_rows > 0)
{ 
	?>
		
	<table class="table table-bordered table-striped">
		<tr>

			<th>Nama Pelajar</th>
			<th>Nama Waris</th>
			<th></th>
			<!--<th width="70px">Delete</th>
			<th width="70px">EDIT</th>-->
		</tr>
	<?php
	

	while( $row = $result->fetch_assoc()){ 

		echo "<form action='' method='POST'>";
		echo "<tr>";
		echo "<td>".$row['fullName'] . "</td>";
		echo "<td>".$row['fullNameP'] . "</td>";
		echo "<td><a href='insert_student.php?id=".$row['parentID']."' class='btn btn-info'>Tambah Nama Anak</a></td>";
		//echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		//echo "<td><a href='edit_attendance.php?id=".$row['s.studentId']."' class='btn btn-info'>Edit</a></td>";//not functioning yet
		echo "</tr>";
		echo "</form>"; 
	}
	?>
	</table>
	
<?php 
}
else
{
	$row = $result->fetch_assoc();
	echo "<br><br>No Record Found";
	//echo "<td><a href='edit.php?id=".$row['lessonId']."' class='btn btn-success'>Add Attendance</a></td>";
}
?> 
</div>

<?php 

 require_once 'footer.php';