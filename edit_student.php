<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['fullName']) )
		{
			echo "Please fillout all required fields"; 
		}else{		
			$fullName  = $_POST['fullName'];
			$sql = "UPDATE student SET fullName='{$fullName}' 
						WHERE studentId=" . $_POST['studentId'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated student details</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating student details</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM student WHERE studentId={$id}";
	$result = $con->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['studentId']; ?>" name="studentId">
				<label for="fullName">Nama Pelajar</label>
				<input type="text" id="fullName"  name="fullName" value="<?php echo $row['fullName']; ?>" class="form-control"><br>
				<!--<label for="lastname">Lastname</label>
				<input type="text"  name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>" class="form-control"><br>
				<label for="address">Address</label>
				<textarea rows="4" name="address" class="form-control"><?php echo $row['address']; ?></textarea><br>
				<label for="contact">Contact</label> 
				<input type="text"  name="contact" id="contact"  value="<?php echo $row['contact']; ?>" class="form-control"><br>
				<br>-->
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';