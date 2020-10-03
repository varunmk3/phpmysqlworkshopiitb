<html>
  <body>
    <form action="mysql1.php" method="POST">
      Name of Student <input type="text" name="name" /><br /><br />
      Marks in each subject: <br /><br />
      Subject 1: <input type="number" name="s1" /><br /><br />
      Subject 2: <input type="number" name="s2" /><br /><br />
      Subject 3: <input type="number" name="s3" /><br /><br />
      Subject 4: <input type="number" name="s4" /><br /><br />
      Subject 5: <input type="number" name="s5" /><br /><br />

      <input type="submit" name="submit" value="submit" /><br /><br />
    </form>
    <?php
        require("./connect.php");
      if (isset($_POST['submit'])) {
        
      
        $s1 = (int)$_POST['s1'];
        $s2 = (int)$_POST['s2'];
        $s3 = (int)$_POST['s3'];
        $s4 = (int)$_POST['s4'];
        $s5 = (int)$_POST['s5'];
        $name = $_POST['name'];
      }

        if(empty($s1) || empty($s2) || empty($s3) || empty($s4) || empty($s5) || empty($name)){
                echo "Please fill in all fields.<br>";
        }
        else {



                $total = $s1+$s2+$s3+$s4+$s5;
                $maxMarks = 500;
                $per = floatval (($total/$maxMarks)*100);

                $sql = "INSERT INTO class1 VALUES('', '$name', '$s1', '$s2', '$s3', '$s4', '$s5', '$total', '$maxMarks', '$per')";
                if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully<br>";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }



        }
        




        echo "<h3>ALL RECORDS<h3>";
        $rec = "SELECT * FROM class1";
        $res = $conn->query($rec);


        if($res->num_rows>0){
                while($row = $res->fetch_assoc()){
                        $id = $row['id'];
                        $stName = $row['name'];
                        $stPercent  = $row['percentage'];
                        echo "$id : $stName, Percentage: $stPercent % <br>";

                }

        }
        else{
                echo "No data";
        }

$conn->close();
?>
  </body>
</html>


