<?php
session_start();


if(isset($_SESSION['admin_user'])){
	echo "<script>window.open('index.php', '_self')</script>";
}


?>

<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="../bootstrap.min.js"></script>
<div style="height: 100px;"></div>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2">
		<fieldset><legend>Staff Login</legend>
<form method="post" class="form-group">
	<input type="text" name="username" class="form-control" placeholder="Username"><br>
	<input type="password" name="password" class="form-control" placeholder="Password"><br>
	<div align="center">
	<input type="submit" name="sub_login" value="Login" class="btn btn-info"> <a href="../index.php" class="btn btn-Success"><span class="glyphicon glyphicon-arrow-left"></span> Home</a>
</div>
</form>
</fieldset>

<?php
if(isset($_POST['sub_login'])){
	include('connect.php');

	$username=$_POST['username'];
	$password=$_POST['password'];

	echo $username." <br>";
	echo $password." <br>";

	if($db_conn){
		echo "DB COnnect Success! <br>";
	}
	echo "It worked!";

	$username=stripslashes($username);
	$password=stripslashes($password);

	$sql="SELECT * FROM staff WHERE username='$username' AND password='$password' ";
	$result=mysql_query($sql);

	$count=mysql_num_rows($result);

	if($count==1){
		$_SESSION['admin_user']=$username;

		$rows=mysql_fetch_assoc($result);



		echo "<script>window.open('index.php', '_self')</script>";

		//echo "<script>window.open('index.php', '_self')</script>";
		echo "<br>".$_SESSION['username'];

	}else{
		echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
	}

}
	



?>

</div>
</div>