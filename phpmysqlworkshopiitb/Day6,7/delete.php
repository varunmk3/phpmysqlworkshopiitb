<?php
require("connect.php");
session_start();
$name = $_POST['delname'];

if(@$_SESSION['full_name']!='admin')
{
	die("You need to be an admin to access this page.<br><a href = 'index.php'>Login</a>");
}
if ($name=="admin") 
{
    die("Cannot delete admin<br><br>Go back to <a href='adminpage.php'>admin dashboard</a>");
}
if ($name=="") 
{
    die("You need to select a valid username");
}
$dblchk1 = "SELECT * FROM student_portal WHERE username='$name'";
$exe1 = mysqli_query($conn,$dblchk1);
$numrow1 = mysqli_num_rows($exe1);

if ($numrow1==0) 
{
    die("User does not exist<br><br>Go back to <a href='adminpage.php'>admin dashboard</a>");
}

$deluser = "DELETE FROM student_portal WHERE username='$name'";
$exe2 = mysqli_query($conn,$deluser);

$dblchk2 = "SELECT * FROM student_portal WHERE username='$name'";
$exe3 = mysqli_query($conn,$dblchk2);
$numrow2 = mysqli_num_rows($exe3);

if ($numrow2==0) 
{
    echo"$name has been deleted permanently!<br><br>Go back to <a href='adminpage.php'>admin dashboard</a>";
}
else
{
    echo"Failed to delete record<br><br>Go back to <a href='adminpage.php'>admin dashboard</a>";
}



?>