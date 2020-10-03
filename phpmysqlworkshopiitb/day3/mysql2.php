<?php
        require("./connect.php");





        $rec = "SELECT * FROM class1 WHERE name='Rohan'";
        $res = $conn->query($rec);

        if ($res->num_rows > 0) {

        while($row = $res->fetch_assoc()) {
        $marks = $row['total obtained'];
        $olds5 = $row['sub5'];
        $s5 = 99;
        $per = $row['percent'];

        $marks = ($marks- $olds5) + $s5;
        $per = (float)(($marks/500)*100);

        $update = "UPDATE class1 SET sub5=$s5,`total obtained`=$marks,percent=$per WHERE name='Rohan'";
        if ($conn->query($update) === TRUE) {
                echo "Rohan's record updated <br><br>";
        } else {
                echo "Error updating record: <br> " . $conn->error ."<br>";
        }

        echo "Rohan, Subject 5: $s5/100<br>Total Marks Obtained:$marks<br>Percentage: $per % <br>";
        }
        } else {
        echo "0 results";
        }



?>

