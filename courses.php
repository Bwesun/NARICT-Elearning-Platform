<?php
session_start();




?>
<html>
<head>
	<title> NARICT ONLINE COURSES </title>
	
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<style type="text/css">
		p a{
    padding:8px; background-color: #eeeeee;
}
p a:hover{
    color: white;
    background-color: #66CC99;
    font-weight: bold;
}
	</style>
</head>
<?php
include('head.php');
?>
	
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-6">
	<h2>SELECT COURSE</h2>
	<?php
	include('connect.php');

	$sql="SELECT * FROM courses ORDER BY id DESC";
	$result=mysql_query($sql);

	while($rows=mysql_fetch_assoc($result)){

	?>
		<a class="btn btn-default"><img src="images/<?php echo $rows['pic']; ?>" width="80" class="img-circle img"><br><br><?php echo $rows['course_title']; ?><br>
			<form method="post">
				
				<input type="hidden" name="course_id" value="<?php echo $rows['id'];   ?>">
				<input type="hidden" name="course_title" value="<?php echo $rows['course_title'];   ?>">
				<input style="color: white;" type="submit" name="start_course" value="Start Course" class="btn btn-lg btn-bg btn-info">
			</form>
		</a> 
		<?php
	}

	if(isset($_POST['start_course'])){
		$user_id=$_SESSION['user_id'];
		//echo $user_id."User ID: ".$_SESSION['user_id'];
		$course_id=$_POST['course_id'];
		$course_title=$_POST['course_title'];

		if(isset($_SESSION['user_id'])){
			$sql4="SELECT * FROM enrolled_courses WHERE course_id='$course_id' ";
					$result4=mysql_query($sql4);
					$count=mysql_num_rows($result4);

					if($count==1){
						echo "<script>alert('You have Already Enrolled in This Course!')</script>";
						//echo $sql;
						echo "<script>window.open('my_profile.php', '_self')</script>";
					}else{
						

						$sql2="INSERT INTO enrolled_courses(course_id, course_title, user_id)VALUES('$course_id', '$course_title', '$user_id') ";
						$result2=mysql_query($sql2);

						if($result2){
							echo "<script>alert('Course Enrolement Successful!')</script>";
							echo "<script>window.open('View_course.php?id=".$course_id."', '_self')</script>";
						}else{
							echo "<script>alert('Course Not Enrolled!')</script>";
							echo "<script>window.open('courses.php', '_self')</script>";
						}

					}
		}else{
						echo "<script>alert('You Must Login First!')</script>";
						echo "<script>window.open('login.php', '_self')</script>";
					}

	}
	?>
 
	</div>

	<div class="col-md-4">
		<fieldset>
			<legend><h2>
				<?php
					if(isset($_SESSION['user_id'])){
						echo "My Subjects";
					}else{
						echo "";
					}
				?>
			</h2></legend>

			<p>
				<?php
				$class=$_SESSION['class'];

						$sql2="SELECT * FROM subjects WHERE level='$class' ORDER BY id DESC";
						$result2=mysql_query($sql2);

						while($rows=mysql_fetch_assoc($result2)){
						?>
				<a href="view_subject.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['subject_title']; 
				?></a><br><br>
			
			<?php  
				}
			?>
			</p>

		</fieldset>
		
	</div>
</div>
	

	
	
<div class="navbar-fixed-bottom">
<?php
include('footer.php');
?>
</div>