<?php
    $con = new mysqli('localhost', 'root', '', 'user');
    
    if(!$con){
        echo "connection established failed...";
    }
?>