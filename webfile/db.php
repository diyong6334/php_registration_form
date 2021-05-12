<?php 
$hostname = 'localhost';
$username = "root";
$password = '';
$dbName = 'horizon';

//connection to the database
$conn = mysqli_connect($hostname, $username, $password, $dbName) or die("Unable to connect to the database")
?>