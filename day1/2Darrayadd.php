<?php  
  
$a = array(  
            array(1, 0),  
            array(4, 5),  
    
          );  
   
 
$b = array(  
              array(1, 1),  
             array(2, 3),  
               
           );  
   
     
for($i = 0; $i <2; $i++){  
    for($j = 0; $j <2; $j++){  
        $sum[$i][$j] = $a[$i][$j] + $b[$i][$j];  
    }  
}  
   
echo "Addition of two matrices: <br>";  
for($i = 0; $i <2; $i++){  
    for($j = 0; $j <2; $j++){  
       echo $sum[$i][$j] . " ";  
    }  
    echo"<br>";  
}    
?>  