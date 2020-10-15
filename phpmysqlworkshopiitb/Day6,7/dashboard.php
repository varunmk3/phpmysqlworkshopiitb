<?php
session_start();


@$full_name = $_SESSION['full_name'];
@$php_marks = $_SESSION ['php_score'];
@$sql_marks = $_SESSION ['mysql_score'];
@$html_marks = $_SESSION ['html_score'];
@$sum = $_SESSION ['total_scored'];
@$perc = $_SESSION ['percentage'];
if ($full_name)
{
?>

<html>

	<h1> Student Dashboard</h1>
	<h2>Welcome <?php echo $full_name; ?> </h2>
	<table>
		<tr>
			<td>PHP marks: </td>
			<td><?php echo "$php_marks";?>/100</td>
		</tr>
		<tr>
			<td>MySQL marks: </td>
			<td><?php echo "$sql_marks";?>/100</td>
		</tr>
		<tr>
			<td>HTML marks: </td>
			<td><?php echo "$html_marks";?>/100</td>
		</tr>
		<tr>
			<td>Total marks: </td>
			<td><?php echo "$sum";?>/300</td>
		</tr>
		<tr>
			<td>Percentage: </td>
			<td><?php echo "$perc";?>%</td>
		</tr>
	</table>
	<br>
	<?php 
} 
else 
{
	die("You need to <a href = 'index.php'>login</a> to access this page.");
}
	if ($perc>60) {

		echo"Congratulations on your score! <br><br> Click <a href = sendmail.php>here</a> to get this result via email";
	} else {

		echo"You can do better! <br><br> Click <a href = sendmail.php>here</a> to get this result via email";
	}    
	
	?>
<br><br><a href = "logout.php">Logout</a>
</html>