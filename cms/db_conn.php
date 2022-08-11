<?php

$sname= "localhost";
$unmae= "root";
$password = "root123";

$db_name = "companymanagementsys";

$conn = mysqli_connect($sname, $unmae, $password, $db_name,"3306");

if (!$conn) {
	echo "Connection failed!";
}
