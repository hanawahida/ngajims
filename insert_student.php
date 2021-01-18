<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
<?php $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;?>
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['fullName']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$studentId  = $_POST['studentId'];
			$fullName  = $_POST['fullName'];
			$Parent_parentId  = $_POST['Parent_parentId'];
			$sql = "INSERT INTO student (studentId,fullName, Parent_parentId) VALUES('$studentId'.'$fullName','$id')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new student</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new student</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Daftar Pelajar Baru</h3> 
			<h4>Maklumat Pelajar</h4> <br>
			<form action="" method="POST">
				<input type="hidden" id="studentId"  name="studentId" value="studentId" class="form-control">

				<label for="fullNameP">Nama Penuh Pelajar</label>
				<input type="text" id="fullName"  name="fullName" class="form-control"><br>

				<!--<label for="Parent_parentId">ID Waris</label>-->
				<!--<input type="text" id="Parent_parentId"  name="Parent_parentId" class="form-control"><br>-->
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';