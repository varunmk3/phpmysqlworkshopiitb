<?php
session_start();

@$php_marksm = $_SESSION ['php_score'];
@$sql_marksm = $_SESSION ['mysql_score'];
@$html_marksm = $_SESSION ['html_score'];
@$summ = $_SESSION ['total_scored'];
@$percm = $_SESSION ['percentage'];
@$full_namem = $_SESSION['full_name'];

if (@$_SESSION['full_name'])
{
?>

<html>

<form action='sendmail.php' method='POST'>
	<h1>Email Result </h1><br>
    Enter email ID: <input type='text' name='email' ><br><br>
    <table>
		<tr>
			<td>PHP marks: </td>
			<td><?php echo "$php_marksm";?>/100</td>
		</tr>
		<tr>
			<td>MySQL marks: </td>
			<td><?php echo "$sql_marksm";?>/100</td>
		</tr>
		<tr>
			<td>HTML marks: </td>
			<td><?php echo "$html_marksm";?>/100</td>
		</tr>
		<tr>
			<td>Total marks: </td>
			<td><?php echo "$summ";?>/300</td>
		</tr>
		<tr>
			<td>Percentage: </td>
			<td><?php echo "$percm";?>%</td>
		</tr>
	</table>
	<br>
	<input type="submit" value="Submit">
</form>

</html>

<?php
} else {
    die("You need to <a href = 'index.php'>login</a> to access this page.");
}
@$to = $_POST['email'];
$subject = "Test Results of $full_namem";
$message = "<html>
<table>
<tr>
    <td>PHP marks: </td>
    <td>$php_marksm/100</td>
</tr>       
<tr>
    <td>MySQL marks: </td>
    <td>$sql_marksm/100</td>
</tr>
<tr>
    <td>HTML marks: </td>
    <td>$html_marksm/100</td>
</tr>
<tr>
    <td>Total marks: </td>
    <td>$summ/300</td>
</tr>
<tr>
    <td>Percentage: </td>
    <td>$percm%</td>
</tr>
</table>
</html>";
$headers = "From: SOMEONE@GMAIL.COM";//add sender email here

if (!$to)
{
    echo "Please enter a valid email id!<br>";
} 
elseif (mail($to, $subject, $message, $headers))
{
    echo "Mail sent successfully<br>";
}
else 
{
    echo "Cannot send mail";
}

?>
<html>
<br>Go back to <a href = "dashboard.php ">dashboard</a> or <a href = "logout.php">logout </a>

</html>
