<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['fullname']) || empty($_POST['birthdate']) || empty($_POST['parentname']) || empty($_POST['contact']) || empty($_POST['address']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$fullname  = $_POST['fullname'];
			$birthdate 	= $_POST['birthdate'];
			$parentname 	= $_POST['parentname'];
			$contact  	= $_POST['contact'];
			$address = $_POST['address'];
			$sql = "INSERT INTO users(fullname,birthdate,parentname,contact,address) 
		    VALUES('$fullname','$birthdate','$parentname','$contact','$address')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new user</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;DAFTAR Pelajar</h3> 
			<form action="" method="POST">
				<label for="fullname">Nama Pelajar</label>
				<input type="text" id="fullname"  name="fullname" class="form-control"><br>
				<label for="lastname">Tarikh Lahir</label>
				<input type="date"  name="birthdate" id="birthdate" class="form-control"><br>
				<label for="parentname">Nama Waris</label>
				<input type="text" id="parentname"  name="parentname" class="form-control"><br>
				<label for="contact">No Telefon WhatsApp</label> 
				<input type="text"  name="contact" id="contact" class="form-control"><br>
				<label for="address">Alamat</label>
				<textarea rows="4" name="address" class="form-control"></textarea><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';