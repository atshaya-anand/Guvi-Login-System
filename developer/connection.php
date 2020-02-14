<?php

    $link = mysqli_connect("localhost", "root", "", "testdb");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>