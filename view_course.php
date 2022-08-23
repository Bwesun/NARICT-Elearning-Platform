<?php
session_start();
include('connect.php');

if(!isset($_SESSION['user_id'])){
	echo "<script>alert('Please Login First!')</script>";
	echo "<script>window.open('login.php', '_self')</script>";
	
}

include('head.php');

$collected_id=$_GET['id'];
?>
<link href="css/style.css" type="text/css" rel="stylesheet">
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
p a{
    padding:8px; background-color: #eeeeee;
}
p a:hover{
    color: white;
    background-color: #66CC99;
    font-weight: bold;
}
</style>

<body>
		<div class="row">
			<div class="col-md-2" style="background-color: #ccc; padding-bottom: 4px;">
				<br>
				<br>
				<br>
				<br>
				<br>
				<fieldset>
					<legend>Ask Questions</legend>
					<?php
					$user_id=$_SESSION['user_id'];
					$username=$_SESSION['username'];

					if(isset($_POST['question_sub'])){
						$sql6="SELECT * FROM COURSES WHERE id='$collected_id' ";
						$result6=mysql_query($sql6);
						$rows=mysql_fetch_assoc($result6);

						$title=$rows['course_title'];

						$question=$_POST['question'];
						$question="<b>Question: ".$question."</b>";

						$sql7="INSERT INTO course_questions(question, course_id, user_id, course_title, status)VALUES('$question', '$collected_id', '$user_id', '$title', '0') ";
						$result7=mysql_query($sql7);

						if($result7){
							echo '<font color="green"><i>Your Question Has been Submitted!</i></font>';
						}else{
							echo '<font color="red"><i>Your Question was not Submitted! Please Try again!</i></font>';
						}


						
					}

					?>
					<form class="form-group" method="post">
						<textarea class="form-control" placeholder="Enter Question Here!" name="question"></textarea><br>
						<div align="center">
							<input type="submit" name="question_sub" class="btn btn-info" value="Submit">
						</div>
					</form>
					
					<div style="background-color: white; border:1px solid #66CC99; padding: 8px; border-radius: 4px;">
						<fieldset><legend>Conversations</legend>
						<?php
						$sql8="SELECT * FROM course_questions WHERE course_id=$collected_id AND user_id='$user_id' ORDER BY id ASC";
						$result8=mysql_query($sql8);

						while($rows=mysql_fetch_assoc($result8)){
						?>
						<p><?php echo $rows['question'];   ?></p>
					<?php } ?>
					</fieldset>
					</div>
				</fieldset>
			</div>

			<div class="col-md-7">
				<?php
				

				$sql5="SELECT * FROM COURSES WHERE id='$collected_id' ";
				$result5=mysql_query($sql5);
				$rows=mysql_fetch_assoc($result5);
				?>

				<h2><b><?php echo $rows['course_title'] ?> Course</b></h2>
				<p style="width: 700px;"><?php echo $rows['course_description']  ?></p>
				

				<fieldset>
					<legend>Course Contents</legend>
					<?php
						$sql2="SELECT * FROM course_contents WHERE course_id='$collected_id' ORDER BY id DESC";
						$result2=mysql_query($sql2);

						
						?>
					<figure>
						<table class="table table-condensed table-striped table-responsive">
							<tr>
								<th>S/N</th>
								<th>Content Title</th>
								<th>Content</th>
							</tr>
							<?php
							$i=1;
							while($rows=mysql_fetch_assoc($result2)){
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td id="<?php echo $rows['id']; ?>"><?php echo $rows['content_title']; ?></td>
								<td>
									<video width="500" src="videos/<?php echo $rows['content']; ?>" controls="yes" autoplay="no"></video>
								</td>
								<td><form class="" method="post">
									<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
								</form></td>
							</tr>
							<?php
					}
					?>
						</table>
					</figure>
					
					
				</fieldset>

			</div>
			<div class="col-md-3" style="background-color: #ccc;">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<fieldset>
					<legend>Course Outline</legend>
					

    <p style="padding-left: 0px;">
    	<?php
    	$sql2="SELECT * FROM course_contents WHERE course_id='$collected_id' ORDER BY id DESC";
						$result2=mysql_query($sql2);
    	while($rows=mysql_fetch_assoc($result2)){
    	?>

    <a href="#<?php echo $rows['id']; ?>" class=""><span class="glyphicon glyphicon-caret"></span> <?php echo $rows['content_title']; ?></a><br><br>
<?php } ?>
</p>
				</fieldset>
			</div>
		</div>
	</div>
</body>









