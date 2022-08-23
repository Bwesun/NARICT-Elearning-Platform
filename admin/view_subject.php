<?php
session_start();
include('connect.php');

if(!isset($_SESSION['admin_user'])){
	echo "<script>alert('Please Login as An Admin')</script>";
	echo "<script>window.open('login.php', '_self')</script>";
	
}

include('head.php');

$collected_id=$_GET['id'];
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
		<div class="row"><h3><b>Admin Control Panel</b></h3>
			<div class="col-md-2">
				<br>
				<br>
				<br>
				<a href="view_staff.php" class="form-control">View Staff</a><br>
				<a href="" class="form-control" data-toggle="modal" data-target="#basicExampleModal">Add Staff</a>
			</div>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	<form method="post">
		<input type="text" placeholder="Enter Staff Full name" name="name" class="form-control"><br>
		<input type="text" placeholder="Enter Staff Username" name="username" class="form-control"><br>
		<input type="text" name="password" placeholder="Enter Password" class="form-control"><br>

      </div>
      <div class="modal-footer">
      	<input type="submit" name="sub_staff" class="btn btn-primary" value="Add Staff">
      </form>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
      <?php
      if(isset($_POST['sub_staff'])){
      	$name=$_POST['name'];
      	$username=$_POST['username'];
      	$password=$_POST['password'];

      	$sql5="INSERT INTO staff(name, username, password)VALUES('$name', '$username', '$password') ";
      	$result5=mysql_query($sql5);

      	if($result5){
      		echo "<script>alert('Staff added successfully!'); </script>";
      		echo "<script>window.open('view_staff.php','_self'); </script>";
      	}else{
      		echo "<script>alert('Staff was not  added! Please try again!'); </script>";
      	}
      }
      ?>
    </div>
  </div>
</div>


			<div class="col-md-9">
				<?php
				

				$sql5="SELECT * FROM subjects WHERE id='$collected_id' ";
				$result5=mysql_query($sql5);
				$rows=mysql_fetch_assoc($result5);
				?>

				<h2><?php echo $rows['subject_title'] ?> </h2>
				<p><?php echo $rows['subject_description']  ?></p>
				
				<fieldset>
					<legend>Add Subject Content</legend>
					<form class="form-group" method="post" enctype="multipart/form-data">
						<input type="text" name="content_title" placeholder="Content Title" required class="form-control"><br>
						Select file Type:<br>
						<input type="radio" name="file_type" class="" value="video">  Video   <input type="radio" name="file_type" class="" value="document">   Document<br>
						Select File
						<input type="file" name="pic" class="form-control" required><br>
						<div align="center">
							<input type="hidden" name="course_id" value="<?php echo $rows['id'];  ?>">
							<input type="submit" name="item_sub" class="btn btn-info" value="Add Content">   <input type="reset" class="btn btn-warning" name="" value="Clear All">
						</div>
					</form>
				</fieldset>

				<?php
				if(isset($_POST['item_sub'])){

					$content_title=$_POST['content_title'];
					$pic=$_POST['pic'];
					$course_id=$_POST['course_id'];
					$file_type=$_POST['file_type'];

					$sql4="SELECT * FROM course_contents WHERE content_title='$content_title' ";
					$result4=mysql_query($sql4);
					$count=mysql_num_rows($result4);

					if($count==1){
						echo "<script>alert('Content Title Already Exist!')</script>";
					}else{
					$filename=$_FILES['pic']['name'];
					$action=move_uploaded_file($_FILES['pic']['tmp_name'], "../videos/".$_FILES['pic']['name']);

					$sql="INSERT INTO subject_contents(subject_id, subject_title, content, file_type)VALUES('$course_id','$content_title', '$filename', '$file_type') ";
					$result=mysql_query($sql);

					if($result){
						echo "<script>alert('Content Added Successfully!')</script>";
						//echo $sql;
						echo "<script>window.open('View_subject.php?id=".$collected_id."', '_self')</script>";
					}else{
						echo "<script>alert('Content Not Added!')</script>";
						//echo mysql_error();
					}
					}

					

					
				}

				?>
				<fieldset>
					<legend>Subject Contents</legend>
					<?php
						$sql2="SELECT * FROM subject_contents WHERE subject_id='$collected_id' ORDER BY id DESC";
						$result2=mysql_query($sql2);

						
						?>
					<figure>
						<table class="table table-condensed table-striped table-responsive">
							<tr>
								<th>S/N</th>
								<th>Content Title</th>
								<th>Content</th>
								<th>Action</th>
							</tr>
							<?php
							$i=1;
							while($rows=mysql_fetch_assoc($result2)){
								$type=$rows['file_type'];
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $rows['subject_title']; ?></td>
								<td>
									<?php
									if($type=='video'){
										echo '<video src="../videos/'.$rows['content'].'" controls="yes" autoplay="no"></video>';
									}elseif($type=='document'){
										echo '<a download href="../videos/'.$rows['content'].'" >'.$rows['content'].'</a>';
									}
									?>
								</td>
								<td><form class="" method="post">
									<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
									<input type="submit" class="btn btn-danger" name="sub_delete_item" value="Remove">
								</form></td>
							</tr>
							<?php
					}
					?>
						</table>
					</figure>
					<?php
								if(isset($_POST['sub_delete_item'])){
									$item_id=$_POST['id'];

									$sql3="DELETE FROM subject_contents WHERE id='$item_id' ";
									$result3=mysql_query($sql3);

									if($result3){
										echo "<script>alert('Delete Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('View_subject.php?id=".$collected_id."', '_self')</script>";
									}else
										echo "<script>alert('Delete not Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('View_subject.php?id=".$collected_id."', '_self')</script>";
								}
								?>
					
				</fieldset>

			</div>
		</div>
	</div>
</body>









