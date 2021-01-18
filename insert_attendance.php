<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
<?php $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;?>
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['Student_studentId'])|| empty($_POST['present']) ){
			echo "Please fillout all required fields"; 
		}else{		
            $Lesson_lessonId  = $_POST['Lesson_lessonId'];
            $Student_studentId  = $_POST['Student_studentId'];
            $present  = $_POST['present'];
			$sql = "INSERT INTO attendance (Lesson_lessonId, Student_studentId, present) 
                    VALUES('$id','$Student_studentId','$present')";//values ID tu id yg ambik kt page sebelum ni

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new attendance</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new attendance</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Attendance</h3> 
			<form action="" method="POST">

                <!--<label for="Lesson_lessonId">Lesson ID</label>-->
				<input type="hidden" id="Lesson_lessonId"  name="Lesson_lessonId" value="Lesson_lessonId" class="form-control"><br> 
				<!--solve undefined array key-->

                <label for="Student_studentId">Student ID</label>
				<input type="number" id="Student_studentId" name="Student_studentId" class="form-control"><br>

                <label for="present">Attendance: 1(H) 2(TH)</label>
				<input type="number" id="present" name="present" class="form-control"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';