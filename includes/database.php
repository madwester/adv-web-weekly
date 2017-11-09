<?php
//initializing the variables created in the environment
$host = getenv("host");
$user = getenv("username");
$password = getenv("password");
$database = getenv("database");
//connecting database, if it is successful, it will return true
//$connection = mysqli_connect("localhost", "website", "adgjmp82", "data");
$connection = mysqli_connect($host, $user, $password, $database);
?>