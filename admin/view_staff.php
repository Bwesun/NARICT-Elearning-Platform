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
				
				<fieldset>
					<legend>Manage Staff</legend>
					<?php
						$sql2="SELECT * FROM staff ORDER BY id DESC";
						$result2=mysql_query($sql2);

						
						?>
					<figure>
						<table class="table table-condensed table-striped table-responsive">
							<tr>
								<th>S/N</th>
								<th>Name</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
							<?php
							$i=1;
							while($rows=mysql_fetch_assoc($result2)){
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $rows['name']; ?></td>
								<td><?php echo $rows['username']; ?></td>
								
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
									$staff_id=$_POST['id'];

									$sql3="DELETE FROM staff WHERE id='$staff_id' ";
									$result3=mysql_query($sql3);

									if($result3){
										echo "<script>alert('Delete Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('view_staff.php', '_self')</script>";
									}else
										echo "<script>alert('Delete not Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('view_staff.php', '_self')</script>";
								}
								?>
					
				</fieldset>

			</div>
		</div>
	</div>
</body>









