<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['fullNameP']) || empty($_POST['phoneNumber']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$parentId  = $_POST['parentId'];
			$fullNameP  = $_POST['fullNameP'];
			$phoneNumber  = $_POST['phoneNumber'];
			$sql = "INSERT INTO parent (parentId,fullNameP,phoneNumber) VALUES('$parentId','$fullNameP','$phoneNumber')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Data waris berjaya disimpan</div>";
				//echo "<meta http-equiv = 'refresh' content = '3; url = page2.php' />";
				echo "<td><a href='page2.php?' class='btn btn-success'>Seterusnya</a></td>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new parent</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Daftar Pelajar Baru</h3> 
			<h4>Maklumat Waris</h4> <br>
			<form action="" method="POST">
				<input type="hidden" id="parentId"  name="parentId" value="parentId" class="form-control">
				
				<label for="fullNameP">Nama Penuh Ibu atau Bapa</label>
				<input type="text" id="fullNameP"  name="fullNameP" class="form-control"><br>

				<label for="phoneNumber">Nombor Telefon WhatsApp</label>
				<input type="text" id="phoneNumber"  name="phoneNumber" class="form-control"><br>
				<br>
				<a href="page2.php">
				<input type="submit" name="addnew" class="btn btn-success" value="Save">
				</a>
				
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';