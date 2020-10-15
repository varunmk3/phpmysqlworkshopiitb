<?php
@$uname = $_POST['username'];
?>
<html>
<form action='index.php' method='POST'>
	<h1>Welcome to Student Portal</h1>
	<h2>Login here</h2>
	<table>
		<tr>
			<td>Enter username</td>
			<td><input type="text" name="username" value='<?php echo $uname; ?>'></td>
		</tr>
		<tr>
			<td>Enter password</td>
			<td><input type="password" name="password"></td>
		</tr>
	</table>
	<br>
	<input type="submit" value="Login"><br>
</form>

</html>

<?php

session_start();
require("connect.php");

//$check = $_POST['submit'];
//@$uname = $_POST['username'];
@$pass = md5($_POST['password']);

if ($uname && $pass)
{
	if (strlen($uname)<4||strlen($uname)>20) 
	{
		echo "<br>Username should be between 4-20 characters long!";
	} 
	elseif ((strlen($_POST['password'])<6)||(strlen($_POST['password'])>20)) 
	{
		echo "<br>Password should be between 6-20 characters long!";
	} 
	else 
	{
		

		$checkdb = "SELECT * FROM student_portal WHERE username = '$uname'";
		$result = mysqli_query($conn,$checkdb);

		if ($result)
		{
			$numrow = mysqli_num_rows($result);
			if (@$numrow!=0)
			{
				while ($rows = mysqli_fetch_assoc($result)) 
				{
					$dbuname = $rows['username'];
					$dbpass = $rows['password'];
					$_SESSION ['full_name'] = $rows['full_name']; 
					$_SESSION ['php_score'] = $rows['php_score'];
					$_SESSION ['mysql_score'] = $rows['mysql_score'];
					$_SESSION ['html_score'] = $rows['html_score'];
					$_SESSION ['total_scored'] = $rows['total_scored'];
					$_SESSION ['percentage'] = $rows['percentage'];
				}
				if ($dbpass==$pass && $dbuname==$uname) 
				{
					echo "Logged in as $uname <br>";

					if ($uname=='admin'&&$pass=='0192023a7bbd73250516f069df18b500')
					{
						echo"<html><br>You can now access the <a href = 'adminpage.php'>admin dashboard</a><br><br><a href = 'logout.php'>Logout</a></html>";
					}
					elseif ($_SESSION['percentage'])
					{
						echo"<br>You can access the dashboard <a href='dashboard.php'>here</a> <br><br><a href = 'logout.php'>Logout</a>";

					} else 
					{
						echo"	<br>Your marks are yet to be updated. <br><br><a href = 'logout.php'>Logout</a>";
					}
				} 
				else
				{
					echo"<br>Incorrect password";
				}

			} 
			else 
			{
				echo"<br>User does not exist.<br><br> New user? <a href = register.php>Register</a> here<br>";
			}
		}
		else 
		{
			
			echo "<br>User does not exist.<br><br> New user? <a href = register.php>Register</a> here<br>";
		}


		
	}
} else {
	echo "Empty fields! <br><br> New user? <a href = register.php>Register</a> here<br>";
}

?>