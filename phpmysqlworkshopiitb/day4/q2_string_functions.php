<html>
<body>

<form action="q2_string_functions.php" method="POST">
        Enter a string:<br> <input type="text" name="userString"> <br> <br>
        <input type="submit" name="submit" value="For string operations">
</form>

<?php
$userString = $_POST["userString"];

$charCount = strlen($userString);
$strToArr =  explode(" ",$userString);
$rev = strrev($userString);
$lower = strtolower($userString);
$upper = strtoupper($userString);
$replace = str_replace("Alex", "Billy", $userString);
echo "Number of characters in the string: $charCount <br>" ;
echo "string to array: ";

foreach($strToArr as $character) {

 echo "$character <br>" ;
};
echo "Reverse: $rev <br>";
echo "lowercase: $lower <br> ";
echo "uppercase: $upper <br> ";
echo "$replace <br>"


?>

</body>
</html>