<?php
        $file = file_get_contents("./visitorcount.txt");

        $visitors = $file;

        

        $newvisitors = $visitors +1;
        echo "You've had $newvisitors visitors.";
        $filenew = fopen("./visitorcount.txt","w");
        fwrite($filenew,$newvisitors);

?>