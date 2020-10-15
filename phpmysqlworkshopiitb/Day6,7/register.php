<?php
//@$fnamer = $_POST['fullname'];
//@$unamer = $_POST['user_name'];
?>
<html>
<form action='register.php' method='POST'>
	<h1>New User Registration</h1>
	<h2>Enter details</h2>
	<table>
		<tr>
			<td>Enter full name: </td>
			<td><input type="text" name="fullname"></td>
		</tr>
        <tr>
			<td>Enter username: <br>(no caps/spaces)</td>
			<td><input type="text" name="user_name"></td>
		</tr>
		<tr>
			<td>Enter password: </td>
			<td><input type="password" name="password"></td>
		</tr>
        <tr>
			<td>Renter password: </td>
			<td><input type="password" name="repassword"></td>
		</tr>
	</table>
	<br>
	<input type="submit" value="Register"><br>
</form>

</html>

<?php

/*
@$uname = $_POST['user_name'];
if (count(explode(' ', $uname)) > 1) 
{
	echo"Spaces are there";
}
if (isset($uname))
{
	if(ctype_space($uname))
	{
		echo"Spaces are there";
	}
	else
	{
		echo"Spaces are NOT there";
	}
}
*/

require("connect.php");

@$fnamer = $_POST['fullname'];
@$unamer = strtolower($_POST['user_name']);
@$passr = md5($_POST['password']);
@$repassr = md5($_POST['repassword']);

//$check = strtolower($unamer);

/*
if ($check=="admin") 
{
	echo"Username cannot be admin";
}
elseif(!ctype_space($unamer))
{
	echo"Username cannot have spaces in between<br>";
}
else
{
	$ifexist = "SELECT * FROM student_portal WHERE username = $unamer";
	$result = mysqli_query($conn,$ifexist);
	if($result)
	{
		$numrow = mysqli_num_rows($result);
		if($numrow!=0)
		{
			die("User already exists, try different Username");
		}
	}
}
$write = "INSERT INTO student_portal (id, full_name, username, password) 
             VALUES ('', '$fnamer', '$unamer', '$passr')";
*/

if (isset($fnamer,$unamer,$passr,$repassr)) 
{
	if ($unamer=="admin")
	{
		die("Username cannot be admin");
	}
	if (count(explode(' ', $unamer)) > 1) 
	{
		die("Username cannot have spaces in between<br>");
	}
	if($passr!=$repassr)
	{
		die("Passwords do not match");
	} 
	if (strlen($unamer)<4||strlen($unamer)>20)
	{
		die("Username should be between 4-20 characters long!");
	}
	if ((strlen($_POST['password'])<6)||(strlen($_POST['password'])>20)) 
	{
		die("Password should be between 6-20 characters long!");
	}
	$ifexist = "SELECT * FROM student_portal WHERE username = '$unamer'";
	$result = mysqli_query($conn,$ifexist);
	if($result)
	{
		$numrow = mysqli_num_rows($result);
		if($numrow>0)
		{
			echo"Username already exists, try different Username";
		}
		else
		{
			$write = "INSERT INTO student_portal ( full_name, username, password) VALUES ('$fnamer', '$unamer', '$passr')";
			$exe = mysqli_query($conn,$write);
			if ($exe) 
			{
				echo "New user registered successfully <br><br> You can now <a href='index.php'>Login</a>";
			} 
			else 
			{
				echo "<br>Error: " . $write . "<br>" . $conn->error;
			}
		}
	}
	else
	{
		echo "<br>Error: " . $write . "<br>" . $conn->error;
	}
} 
else
{
	echo("Empty Fields<br><br>");
}

$conn->close();

?>

<?php
/*
$php_marks = 98;
$sql_marks = 49;
$html_marks = 67;
$sum = ($php_marks+$sql_marks+$html_marks);
$perc = ($sum/300)*100;
?>
<html>
	<h1> Student Dashboard</h1>
	<h2>Welcome</h2>
	<table>
		<tr>
			<td>maths marks: </td>
			<td><?php echo "$maths_marks";?></td>
		</tr>
		<tr>
			<td>english marks: </td>
			<td><?php echo "$english_marks";?></td>
		</tr>
		<tr>
			<td>science marks: </td>
			<td><?php echo "$science_marks";?></td>
		</tr>
		<tr>
			<td>Percentage: </td>
			<td><?php echo "$perc";?></td>
		</tr>
	</table>
	<br>
	<?php 
	
	if ($perc>60) {
		echo"Congratulations on your score!";
	} else {
		echo"You can do better!";
	}    
	
	?>
</html>
<?php
$uname = $_POST['username'];
$pass = $_POST['password'];
echo "$uname / $pass";
$to = "phil.lis.ti.n.eba.n.etmp@gmail.com";
$subject = "test email from PHP";
$message = "This is the message from the test function";
$headers = "From: riddhi.panchale99@gmail.com";
if (mail($to, $subject, $message, $headers)) {
	echo "Mail sent successfully";
} else {
	echo "Cannot send mail";
}
*/
?>