<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['fullNameP']) || empty($_POST['phoneNumber'])  )
		{
			echo "Please fillout all required fields"; 
		}else{		
			$fullNameP  = $_POST['fullNameP'];
			$phoneNumber  = $_POST['phoneNumber'];
			$sql = "UPDATE parent SET fullNameP='{$fullNameP}' ,phoneNumber='{$phoneNumber}' 
						WHERE parentID=" . $_POST['parentID'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated parent details</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating parent details</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM parent WHERE parentID={$id}";
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
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY Parent Details</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['parentID']; ?>" name="parentID">
				<label for="fullNameP">Nama Waris</label>
				<input type="text" id="fullNameP"  name="fullNameP" value="<?php echo $row['fullNameP']; ?>" class="form-control"><br>
				<label for="phoneNumber">No Telefon WhatsApp</label>
				<input type="text"  name="phoneNumber" id="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" class="form-control"><br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';