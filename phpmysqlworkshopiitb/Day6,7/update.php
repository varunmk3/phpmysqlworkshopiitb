<?php
session_start();

if(@$_SESSION['full_name']!='admin')
{
	die("You need to be an admin to access this page.<br><a href = 'index.php'>Login</a>");
}
require("connect.php");

//if ($user_name != $_POST['uname'];)
//{
@$user_name = $_POST['username'];
//}
//$_SESSION['stuser_name'] = $user_name;
$namecheck = "SELECT * FROM student_portal WHERE username = '$user_name'";
$result = mysqli_query($conn,$namecheck);

if ($result) 
{
    $numrow = mysqli_num_rows($result);
    if ($numrow==0) 
    {
        die("Can't find user. Please enter valid username<br>");
    }
    elseif ($numrow==1)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $fname = $row['full_name'];
            $marks_php = $row['php_score'];
		    $marks_sql = $row['mysql_score'];
		    $marks_html = $row['html_score'];
		    $sum = $row['total_scored'];
            $perc = $row['percentage'];
            //echo "<br>PHP score: $marks_php<br>MySQL score: $marks_sql<br>HTML score: $marks_html<br>Total marks: $sum<br>Percentage: $perc %";
        }
    }
}
else 
{
    die("Username not set");
}

//@$username = $_POST['username'];
@$php_n = $_POST['php'];
@$sql_n = $_POST['sql'];
@$html_n = $_POST['html'];
@$sum_n = ($php_n+$sql_n+$html_n);
$perc_n = (($sum_n/300)*100);
@$update = "UPDATE student_portal SET php_score = $php_n, mysql_score = $sql_n, html_score = $html_n, total_scored = $sum_n, percentage = $perc_n WHERE username= '$user_name'";

if (isset($php_n,$sql_n,$html_n))
{

$exe2 = mysqli_query($conn,$update);
}
?>

<html>
<form action='update.php' method='POST'>
<h2><?php echo"$fname"; ?>'s Results</h2>
    <table>
		<tr>
			<td>PHP marks: </td>
			<td><?php echo "$marks_php";?>/100</td>
		</tr>
		<tr>
			<td>MySQL marks: </td>
			<td><?php echo "$marks_sql";?>/100</td>
		</tr>
		<tr>
			<td>HTML marks: </td>
			<td><?php echo "$marks_html";?>/100</td>
		</tr>
		<tr>
			<td>Total marks: </td>
			<td><?php echo "$sum_n";?>/300</td>
		</tr>
		<tr>
			<td>Percentage: </td>
			<td><?php echo "$perc_n";?>%</td>
		</tr>
	</table>
    <h2>Edit scores here</h2>
	<table>
        <tr>
            <td>User name: </td>
            <td><input type="text" name="username" value= "<?php echo$user_name;?>"></td>
        </tr>
		<tr>
			<td>PHP marks: </td>
			<td><input type="text" name="php" value= "<?php echo$php_n;?>">/100</td>
		</tr>
		<tr>
			<td>MySQL marks: </td>
			<td><input type="text" name="sql" value= "<?php echo$sql_n;?>">/100</td>
		</tr>
		<tr>
			<td>HTML marks: </td>
			<td><input type="text" name="html" value= "<?php echo$html_n;?>">/100</td>
		</tr>
	</table>
    <br>
	<input type="submit" value="Update Marks"><br>
    
</form>

</html>

<?php

if ($exe2) 
{
    echo"Record saved. Click again to view saved marks";
}
else
{
    echo"Cannot save";
}

echo"<br><br>Go back to <a href='adminpage.php'>admin dashboard</a> or <a href='logout.php'>logout</a>";
?>