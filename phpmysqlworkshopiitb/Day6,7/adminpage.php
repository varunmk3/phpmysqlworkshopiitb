<?php

session_start();
if(@$_SESSION['full_name']=='admin')
{

?>

<html>
<form action='update.php' method='POST'>
    <h1>Admin Dashboard</h1>
	<h2>Access details via student's username</h2>
	<table>
		<tr>
			<td>Enter username: </td>
			<td><input type="text" name="username"></td>
		</tr>
		
	</table>
	<br>
	<input type="submit" value="View details"><br>
</form>

</html>


<?php
}
else
{
    die("You need to be an admin to access this page.<br><a href = 'index.php'>Login</a>");
}


require("connect.php");
$checkuser = "SELECT username, full_name, percentage FROM student_portal WHERE NOT username = 'admin'";
$result = mysqli_query($conn,$checkuser);
//$user_name = $_POST['username'];

if ($result)
{
    $numrow = mysqli_num_rows($result);
	if (@$numrow!=0)
	{
        echo"The following is the list students:";
        while ($rows = mysqli_fetch_assoc($result))
        {
            $dbuname = $rows['username'];
            $dbfname = $rows['full_name'];
            $dbperc = $rows['percentage'];
            echo"<br><br>Name: $dbfname<br>Username: $dbuname";
            if($dbperc==0)
            {
                echo"*";
            }
        }
        echo"<br><br>*<i>New users, scores need to be added</i>";
    } 
    
}
else {
    echo"<br>Error";
}
?>

<html>
<form action='delete.php' method='POST'>
	<h2>Delete a record</h2>
	<table>
		<tr>
			<td>Enter username: </td>
			<td><input type="text" name="delname"></td>
		</tr>
		
	</table>
	<br>
	<input type="submit" value="Delete"><br>
</form>

</html>


<?php
        
echo"<br><a href='logout.php'>Logout</a>";


?>
