<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM parent WHERE parentID=" . $_POST['parentID'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete parent</div>";
	}
}

$sql = "SELECT * FROM parent";

$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>SENARAI Waris</h2> 
	<?php echo "<td><a href='insert_parent.php?' class='btn btn-success'>Daftar Waris Baru</a></td>";?>
	<br>
	<h6>Klik nama waris untuk lihat senarai anak didaftarkan</h6>
	<br>
	
	<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Waris</th>
			<th>Nombor Telefon</th>
			<th width="70px">Delete</th>
			<th width="70px">EDIT</th>
			<!--<th width="70px">Daftar Nama Anak</th>
			<th width="70px">Lihat Maklumat Anak</th>-->
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";
		echo "<input type='hidden' value='". $row['parentID']."' name='parentID' />";
		echo "<tr>";
		//echo "<td>".$row['fullNameP'] . "</td>";
		echo "<td><a href='view_parent_student.php?id=".$row['parentID']."'>". $row['fullNameP']."</a></td>";
		echo "<td>".$row['phoneNumber'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit_parent.php?id=".$row['parentID']."' class='btn btn-info'>Edit</a></td>";
		/*echo "<td><a href='insert_student.php?id=".$row['fullNameP']."' class='btn btn-success'>Daftar Nama Anak</a></td>";
		echo "<td><a href='view_parent_student.php?id=".$row['fullNameP']."' class='btn btn-success'>Lihat Maklumat Anak</a></td>";*/
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