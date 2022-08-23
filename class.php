<?php
session_start();

include('head.php');

include('connect.php');

$class_id=$_GET['id'];

?>
<style type="text/css">
	#a{
		padding: 10px;
		background-color: blue;
	}
</style>
<link href="css/style.css" type="text/css" rel="stylesheet">
<div class="row">
	<div class="col-md-2">
		
	</div>
 	 <div class="col-md-6">
 		<fieldset>
 			<legend><?php echo $class_id." Subjects";  ?></legend>
 			<?php
 			$i=1;
 				$sql="SELECT * FROM subjects WHERE level='$class_id'";
 				$result=mysql_query($sql);

 				while($rows=mysql_fetch_assoc($result)){

 			?>
 			<tr>
 			<td><a href="view_subject.php?id=<?php echo $rows['id']; ?>"><div><b><?php echo $i++.". "; echo $rows['subject_title']; ?></b></div></a></td>
 		</tr>
 				<?php
 			}
 			?>
 		</fieldset>

 	</div>

 	
</div>
<div class="navbar-fixed-bottom">
<?php
include('footer.php');
?>
</div>