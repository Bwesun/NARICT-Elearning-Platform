<?php
session_start();

if(isset($_SESSION['user_id'])){
	header("location:index.php");
}

?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3">
		<div align="center"><img align="center" src="slide2.jpg" width="200" class="img-circle img-responsive"></div>
<fieldset><legend >Login</legend>
<form  method="post" class="form-group">
    		<span class="glyphicon glyphicon-user"></span>   <input type="text" name="email" required class="form-control" placeholder="Email"><br>
    		<span class="glyphicon glyphicon-lock"></span>   <input type="password" name="password" required class="form-control" placeholder="Password"><br>

			<div align="center">
				<input type="submit" class="btn btn-info" name="sub_login" value="Login"> `<br><br>

    		Don't have an Account? <button type="button" class="btn " data-toggle="modal" data-target=".bd-example-modal-xl">Register  <i class="fas fa-user-plus"></i></button>
 Here!</div>

    	</form>
    </fieldset>

<?php
if(isset($_POST['sub_login'])){
	session_start();

	include('connect.php');

	$email=$_POST['email'];
	$password=$_POST['password'];

	//echo $email." <br>";
	/*echo $password." <br>";

	if($db_conn){
		echo "DB COnnect Success! <br>";
	}
	echo "It worked!";
  */

	$email=stripslashes($email);
	$password=stripslashes($password);

	$sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
	$result=mysql_query($sql);

	$count=mysql_num_rows($result);

	if($count==1){
		$_SESSION['email']=$email;

		$rows=mysql_fetch_assoc($result);

		$_SESSION['user_id']=$rows['id'];
		$_SESSION['username']=$rows['username'];
		$_SESSION['class']=$rows['class'];


		echo "<script>window.open('index.php', '_self')</script>";

		//echo "<script>window.open('index.php', '_self')</script>";

		echo "<br>".$_SESSION['user_id'];
		echo "<br>".$_SESSION['username'];

	}else{
		echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
	}

}
?>




<!--Register-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">

    <div class="modal-content">
    	<div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign Up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Nav tabs 
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Register</a>
          </li>
        </ul>-->
    	<form action="" method="post" class="form-group">
    		Fullname
    		<input type="text" name="name" class="form-control" placeholder="Surname first"><br>
    		Username
    		<input type="text" name="username" class="form-control" placeholder="Choose a Username"><br>
    		Phone Number
    		<input type="text" name="phone" class="form-control"><br>
    		Email
    		<input type="email" name="email" class="form-control"><br>
    		Password
    		<input type="text" name="password" class="form-control" placeholder="Choose Password"><br>
    		Address
    		<textarea class="form-control" placeholder="Address" name="address"></textarea>
    		Gender
    		<select name="gender" class="form-control">
    			<option value="">----- Select ----- </option>
    			<option value="Male">Male</option>
    			<option value="Female"> Female</option>
    		</select><br>
    		Class
    		<select name="class" class="form-control">
    			<option value="">----- Select ----- </option>
    			<option value="js1">JS1</option>
    			<option value="js2">JS2</option>
    			<option value="js3">JS3</option>
    			<option value="ss1"> SS1</option>
    			<option value="ss2"> SS2</option>
    			<option value="ss3"> SS3</option>
    		</select>
<div align="center">
			 <input type="submit" class="btn btn-info" name="sub_reg" value="Register"> <input class="btn btn-warning" type="reset" name="" value="Reset">
    		
</div>
    	</form>

    </div>
  </div>
</div>
<?php
if(isset($_POST['sub_reg'])){
	include('connect.php');

	$name=$_POST['name'];
	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$class=$_POST['class'];

	$sql2="INSERT INTO users(fullname, username, phone, email, address, password, gender, class)VALUES('$name', '$username', '$phone', '$email', '$address', '$password', '$gender', '$class') ";
	$result2=mysql_query($sql2);

	if($result2){
		echo "<script>alert('Registration Successful! You can now Login in!')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
	}else{

		echo "<script>alert('Registration Not Successful! Please Check the Details and Try again!')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
	}
	
}


?>
</div>
<div class="col-md-5"></div>
</div>