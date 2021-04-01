<?php 

$comment = '';
if(isset($_POST['comment']))
{
	$comment = htmlentities(mysqli_escape_string($conn,$_POST['commentbox']));

	$query = "INSERT INTO comment(Comment) VALUES('$comment')";
	$command = mysqli_query($conn, $query);
	if($command)
	{
		$query2 = "SELECT Comment FROM comment ORDER BY Id DESC";
		$command2 = mysqli_query($conn, $query2);
		$row = mysqli_fetch_all($command2, MYSQLI_ASSOC);?>

		<table style="width:100%;text-align:center">
			<?php  foreach($row as $elemek) {  ?>

			<tr>
				<td style="background:black;"><?php echo $elemek['Comment']; ?></td>
			</tr>

			<?php	}  ?>
		</table> 
	<?php
	}
}  
?>