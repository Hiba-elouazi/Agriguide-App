<?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="agriguide";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error; // Le underscore manquant
}
?>