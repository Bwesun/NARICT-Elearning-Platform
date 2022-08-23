<?php
session_start();

if(!isset($_SESSION['user_id'])){
	echo "<script>alert('You are not logged In!')</script>";
										//echo $sql;
	echo "<script>window.open('index.php', '_self')</script>";
}
?>
<html>
<head>
	<title> NARICT ONLINE COURSES </title>
	
	<link href="css/style.css" type="text/css" rel="stylesheet">
	
</head>
<?php
include('head.php');
?>

<div class="row">
	<div class="col-md-2">
		<br>
				<br>
				<br>
				<a href="my_profile.php" class=" btn-info form-control">Enrolled Course(s)</a><br>
				<a href="logout.php" class="btn-info form-control"><span class="glyphicon glyphicon-log-out"></span> Logout</a><br>
				
	</div>

	<div class="col-md-6">

		<fieldset>
			<legend>Enrolled Courses</legend>
			<table class="table">
				<tr>
					<th>S/N</th>
					<th>Course Title</th>
					<th>Action</th>
				</tr>
				<?php
				include('connect.php');
				

				$sql2="SELECT * FROM enrolled_courses WHERE user_id='".$_SESSION['user_id']."' ";
				$result2=mysql_query($sql2);
				$i=1;
				while($rows=mysql_fetch_assoc($result2)){
				?>
				<tr>
					<td><?php echo $i++;  ?></td>
					<td><a href="view_course.php?id=<?php echo $rows['course_id'] ;?>"><?php echo $rows['course_title']   ?></a> </td>
					<td>
						<form class="" method="post">
							<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
							<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
							<input type="submit" class="btn btn-danger" name="sub_remove_course" value="Remove">
						</form>
					</td>
				</tr>
			<?php } ?>
			</table>
<?php
								if(isset($_POST['sub_remove_course'])){
									$course_id=$_POST['id'];
									$user_id=$_POST['user_id'];

									$sql3="DELETE FROM enrolled_courses WHERE id='$course_id' AND user_id='$user_id' ";
									$result3=mysql_query($sql3);

									if($result3){
										echo "<script>alert('Course Removed Successfully!')</script>";
										//echo $sql;
										echo "<script>window.open('my_profile.php', '_self')</script>";
									}else
										echo "<script>alert('Course Not Removed!')</script>";
										//echo $sql;
										echo "<script>window.open('my_profile.php', '_self')</script>";
								}
								?>
		</fieldset>

	</div>

	<div class="col-md-4">
		<fieldset>
			<legend><h2>My Subjects</h2></legend>

			<p>
				<?php
				$i=1;
				$class=$_SESSION['class'];

						$sql2="SELECT * FROM subjects WHERE level='$class' ORDER BY id DESC";
						$result2=mysql_query($sql2);

						while($rows=mysql_fetch_assoc($result2)){
						?>
				<a href="view_subject.php?id=<?php echo $rows['id']; ?>"><b><?php echo $i++.". "; echo $rows['subject_title']; 
				?></a></b><br>
			</p>
			<?php  
				}
			?>

		</fieldset>
		
	</div>
</div>


	
<?php
include('footer.php');
?>