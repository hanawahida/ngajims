<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['date']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$date  = $_POST['date'];
			$sql = "INSERT INTO lesson (date) VALUES('$date')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new lesson</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new lesson</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New lesson</h3> 
			<form action="" method="POST">
				<label for="date">Lesson Date</label>
				<input type="date" id="date"  name="date" class="form-control" min="2020-12-26"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';