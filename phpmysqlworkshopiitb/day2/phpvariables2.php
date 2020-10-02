


<html>
	<form action="phpvariables2.php" method="POST">
		
		SUBJECT 1:<input type="number" name="subject1"><br>

		SUBJECT 2:<input type="number" name="subject2"><br>
		
		SUBJECT 3:<input type="number" name="subject3"><br>

		SUBJECT 4:<input type="number" name="subject4"><br>

		SUBJECT 5:<input type="number" name="subject5"><br>

		<input type="submit" value="Submit">
	</form>
		 
</html>

<?php
	
	$s1 = $_POST["subject1"];
	$s2 = $_POST["subject2"];
	$s3 = $_POST["subject3"];
	$s4 = $_POST["subject4"];
	$s5 = $_POST["subject5"];
	$total=$s1+$s2+$s3+$s4+$s5;
	$percentage= $total/5;
	
	echo "SUBJECT 1:$s1	<br>" ;
	echo "SUBJECT 2:$s2	<br>" ;
	echo "SUBJECT 3:$s3 <br>	" ;
	echo "SUBJECT 4:$s4	<br>" ;
	echo "SUBJECT 5:$s5	<br>" ;
	echo "TOTAL MARKS OBTAINED:$total<br>" ;
	echo "TOTAL MARKS:$total /500	<br>" ;
	echo "PERCENTAGE : $percentage<br>";
?>

