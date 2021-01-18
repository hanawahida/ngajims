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
$sql = "SELECT * from lesson";
//$sql = "SELECT a.*, l.* FROM attendance a, lesson l WHERE a.Lesson_lessonId=l.lessonId AND l.lessonId={$id}";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>Sesi Kelas</h2> 
	<?php echo "<td><a href='insert_lesson.php?' class='btn btn-success'>Add New Lesson</a></td>";?>
	<br>
	<h6>Klik tarikh untuk lihat senarai kehadiran</h6>
	<br>
	
	<table class="table table-bordered table-striped">
		<tr>
			<th>Tarikh</th>
			<th width="70px"></th>
			<!--<th width="70px"></th>-->
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		//echo "<input type='hidden' value='". $row['Student_studentId']."' name='Student_studentId' />"; //added
		echo "<tr>";
		//echo "<td>". $row['date']. "</td>";
		//echo "<td>".$row['Lesson_lessonID'] . "</td>";
		//echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='view_attendance.php?id=".$row['lessonId']."'>". $row['date']."</a></td>";
		echo "<td><a href='insert_attendance.php?id=".$row['lessonId']."' class='btn btn-info'>Tambah Kehadiran</a></td>";
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