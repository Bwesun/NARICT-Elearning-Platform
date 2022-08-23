<fieldset>
					<legend>Add Subject</legend>
					<form class="form-group" method="post" enctype="multipart/form-data">
						<input type="text" name="course_title" placeholder="Subject Title" required class="form-control"><br>
						
						<textarea class="form-control" required name="course_description" placeholder="Subject Description"></textarea><br>
						<select name="level" class="form-control">
							<option value="">---- Select Level ----</option>
							<option value="js1">JS1</option>
							<option value="js2">JS2</option>
							<option value="js3">JS3</option>
							<option value="ss1">SS1</option>
							<option value="ss2">SS2</option>
							<option value="ss3">SS3</option>
						</select><br>
						<div align="center">
							<input type="submit" name="item_subject" class="btn btn-info btn-sm" value="Add Course">   <input type="reset" class="btn btn-warning btn-sm" name="" value="Clear All">
						</div>
					</form>
				</fieldset>

				<?php
				if(isset($_POST['item_subject'])){

					$course_title=$_POST['course_title'];
					$course_description=$_POST['course_description'];
					$level=$_POST['level'];

					$sql4="SELECT * FROM subjects WHERE subject_title='$course_title' AND level='$level' ";
					$result4=mysql_query($sql4);
					$count=mysql_num_rows($result4);

					if($count==1){
						echo "<script>alert('Subject Title Already Exist!')</script>";
						//echo $sql;
						echo "<script>window.open('index.php', '_self')</script>";
					
					}else{

					$sql="INSERT INTO subjects(subject_title, subject_description, level)VALUES('$course_title', '$course_description', '$level') ";
					$result=mysql_query($sql);

					if($result){
						echo "<script>alert('Subject Added Successfully!')</script>";
						//echo $sql;
						echo "<script>window.open('index.php', '_self')</script>";
					}else{
						echo "<script>alert('Subject Not Added!')</script>";
						//echo $sql;
						echo "<script>window.open('index.php', '_self')</script>";
						//echo mysql_error();
					}
					}

					

					
				}

				?>
			
				<fieldset>
					<legend>Added Subjects</legend>
					<?php
						$sql2="SELECT * FROM subjects ORDER BY id DESC";
						$result2=mysql_query($sql2);

						
						?>
					<figure>
						<table class="table table-condensed table-striped table-responsive">
							<tr>
								<th>S/N</th>
								<th>Subject Title</th>
								<th>Class</th>
								<th>Action</th>
							</tr>
							<?php
							$i=1;
							while($rows=mysql_fetch_assoc($result2)){
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><a href="view_subject.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['subject_title']; ?></a></td>
								<td><b><?php echo $rows['level'];  ?></b></td>
								<td><form class="" method="post">
									<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
									<input type="submit" class="btn btn-danger btn-sm" name="subject_delete_item" value="Remove">
									<a href="view_subject.php?id=<?php echo $rows['id']; ?>" class="btn btn-info btn-sm">Add Contents</a>
								</form></td>
							</tr>
							<?php
					}
					?>
						</table>
					</figure>
					<?php
								if(isset($_POST['subject_delete_item'])){
									$item_id=$_POST['id'];

									$sql3="DELETE FROM subjects WHERE id='$item_id' ";
									$result3=mysql_query($sql3);

									if($result3){
										echo "<script>alert('Delete Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('index.php', '_self')</script>";
									}else
										echo "<script>alert('Delete not Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('index.php', '_self')</script>";
								}
								?>
					
				</fieldset>