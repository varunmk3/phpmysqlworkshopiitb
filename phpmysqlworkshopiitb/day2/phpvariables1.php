<html>
	<form action="phpvariables1.php" method="GET">
		<label for="side1">Length of side1:</label><br>
		<input type="number" name="side1"><br>

		<label for="side2">Length of side2:</label><br>
		<input type="number" name="side2"><br>

		<label for="side3">Length of side3:</label><br>
		<input type="number" name="side3"><br>

		<label for="angle">Is any angle 90degree:</label><br>
		<input type="number" name="angle"><br>

		<input type="submit" value="Submit">
	</form>
		
</html>

<?php
	
	$s1 = $_GET["side1"];
	$s2 = $_GET["side2"];
	$s3 = $_GET["side3"];
	$a = $_GET["angle"];
	
	if ($a==90){
			
			echo "It is right-angled triangle";
		}
	elseif($s1==$s2 && $s2==$s3) 
    {	 
       echo "Equilateral triangle.";
    }
    elseif($s1==$s2 || $s1==$s3 || $s2==$s3) 
    {	 
       echo "Isosceles triangle";
    }
    else 
    {	
        echo "Scalene triangle";    }

   


	
	
?>