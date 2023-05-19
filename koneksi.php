<?php
 $hostName = "localhost";
 $userName = "root";
 $password = "";
 $dbName = "kampus_merdeka";
 $conn = mysqli_connect($hostName,$userName,$password,$dbName);
 
If ($conn) {
    echo "connected";
 } else {
    echo "not connected";
 }
?>
