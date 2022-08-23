<?php
session_start();
include('connect.php');

if(!isset($_SESSION['admin_user'])){
	echo "<script>alert('Please Login as An Admin')</script>";
	echo "<script>window.open('login.php', '_self')</script>";
	
}

include('head.php');
?>

<table class="table navbar navbar-default navbar-fixed-top">
	<tr>
		<th><a href="index.php" >Home</a></th>
		<th><a href="logout.php" >Logout</a></th>
	</tr>
</table>
<br>
<style type="text/css">
	body{
		margin: 1%;
	}
	.col-md-2 a{
	    padding:8px; 
	    background-color: #eeeeee;
	}
	.col-md-2 a:hover{
	    color: white;
	    background-color: #66CC99;
	    font-weight: bolder;
	}
</style>

<body>
		<div class="row"><h3><b>Staff Panel</b></h3>
			<div class="col-md-2">
				<br>
				<br>
				<br>
				<a href="logout.php" class="form-control">Logout</a><br>
				
			</div>


			<div class="col-md-9">

				<fieldset>
					<legend>Answer Questions</legend>
					
						
						<?php
					$user_id=$_SESSION['user_id'];
					$username=$_SESSION['username'];

					if(isset($_POST['question_sub'])){
						$question=$_POST['question'];
						$id=$_POST['id'];
						$user_id=$_POST['user_id'];
						$course_id=$_POST['course_id'];
						$course_title=$_POST['course_title'];

						$question="Answer: ".$question;


						$sql7="INSERT INTO course_questions(question, course_id, user_id, course_title, status)VALUES('$question', '$course_id', '$user_id', '$title', '1') ";
						$result7=mysql_query($sql7);

						if($result7){
							$sql="UPDATE course_questions SET status='1' WHERE id='$id' ";
							$result=mysql_query($sql);

							echo '<font color="green"><i>Answer has been Sent!</i></font>';
						}else{
							echo '<font color="red"><i>Your Answer was not Submitted! Please Try again!</i></font>'.mysql_error();;
						}
					}

						$sql6="SELECT * FROM course_questions WHERE status='0' ORDER BY id DESC";
						$result6=mysql_query($sql6);

						$count=mysql_num_rows($result6);

						if($count>0){
						

						while($rows=mysql_fetch_assoc($result6)){

					?>
					<form class="form-group" method="post" enctype="multipart/form-data">
						<b>Course: <?PHP echo $rows['course_title'];  ?></b><br>
						Question: <?php echo $rows['question'];  ?><br>
						<textarea class="form" name="question" placeholder="Enter Answer"></textarea>
						<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
						<input type="hidden" name="course_title" value="<?php echo $rows['course_title']; ?>">
						<input type="hidden" name="course_id" value="<?php echo $rows['course_id']; ?>">
						<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">

						<input type="Submit" name="question_sub" class="btn btn-primary" value="Submit">
						
					</form><hr>
				<?php }
					}else{
						echo '<font size="14" color="grey"><i>There are no available Questions!</i></font>';
					}

				?>
				</fieldset>

				
				

			</div>
		</div>
	</div>
</body>