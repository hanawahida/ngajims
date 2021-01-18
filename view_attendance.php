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
$sql = "SELECT a.*, l.* FROM attendance a, lesson l WHERE a.Lesson_lessonId=l.lessonId AND l.lessonId={$id}";
$result = $con->query($sql); 
//$row = $result->fetch_row();

if( $result->num_rows > 0)
{ 
	?>
	<h2>Kehadiran</h2> 
	
	<!--<?php echo "<td><a href='insert.php?' class='btn btn-success'>Kehadiran Baru</a></td>";?>-->
	<!--<?php echo "<a href='insert_attendance.php?id=".$row['Student_studentId']."' class='btn btn-info'>Tambah budak mai</a>"; ?>-->
		
	<table class="table table-bordered table-striped">
		<tr>

			<th>Nama Pelajar</th>
			<th>Kehadiran</th>
			<!--<th width="70px">Delete</th>-->
			<th width="70px">EDIT</th>
		</tr>
	<?php
	

	while( $row = $result->fetch_assoc()){ 

		echo "<form action='' method='POST'>";	//added
		//echo "<input type='hidden' value='". $row['Student_studentId']."' name='Student_studentId' />"; //added
		echo "<tr>";
		//echo "<td>".$row['attendanceId'] . "</td>";
		//echo "<td>".$row['Lesson_lessonID'] . "</td>";
		echo "<td>".$row['Student_studentId'] . "</td>";
		echo "<td>".$row['present'] . "</td>";
		//echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit_attendance.php?id=".$row['attendanceId']."' class='btn btn-info'>Edit</a></td>";
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