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


<br>
<link href="css/style.css" type="text/css" rel="stylesheet">
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
		<div class="row"></h3>
			<div class="col-md-2">
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
										echo '<video src="videos/'.$rows['content'].'" controls="yes" autoplay="no"></video>';
									}elseif($type=='document'){
										echo '<a download href="videos/'.$rows['content'].'" >'.$rows['content'].'</a>';
									}
									?>
								</td>
							</tr>
							<?php
					}
					?>
						</table>
					</figure>
					
				</fieldset>

			</div>
		</div>
	</div>
</body>









