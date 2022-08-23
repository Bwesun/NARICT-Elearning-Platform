
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<style type="text/css">
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
	</style>
<body>
	
	<div class="top">
		<div>
		 Contact Us +234 8144529253 / NARICT@gmail.com   <a href="admin/login.php" class="btn btn-default">Admin Login</a>  <a href="staff/login.php" class="btn btn-default">Staff Login</a>
		</div>
	</div>
	
	<div class="logo">
		<div>
			<table>
				<tr>
					<td width="400px" style="font-size:40px;font-family:sans-serif;"> <font color="#428bca"> NARICT  </font><font color="#428bca"> E-Learning</font><font color="#428bca"> Platform</font> </td>
					
					<td> <br> <br> <br>
						<font size="4px"> 
							<a href="index.php"><span class="glyphicon-home glyphicon"></span> HOME</a> 						
							<a href="courses.php"><span class="glyphicon-book glyphicon"></span> COURSES/SUBJECTS</a>
								
							<?php
							if(isset($_SESSION['user_id'])){
									echo '<a href="my_profile.php"><span class="glyphicon glyphicon-user"></span>   MY PROFILE</a> 
										<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-"></span>
CLASS <span class="caret"></span>
</a>
<ul class="dropdown-menu">
	<li><a href="class.php?id=js1">JS1</a></li>
	<li><a href="class.php?id=js2">JS2</a></li>
	<li><a href="class.php?id=js3">JS3</a></li>
	<li class="divider"></li>
	<li><a href="class.php?id=ss1">SS1</a></li>
	<li><a href="class.php?id=ss2">SS2</a></li>
	<li><a href="class.php?id=ss3">SS3</a></li>
</ul>
</li>
									 <a href="logout.php"><span class="glyphicon-log-out glyphicon"></span> LOGOUT</a>';
								}else{
									echo '<a href="login.php"><span class="glyphicon glyphicon-log-in"></span>   LOGIN</a>';
								}
							
							?>
							<a href="about.php">ABOUT US</a>
							
						</font>
					</td>
					
				</tr>
			</table>
		</div>
	</div>