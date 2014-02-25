<?php
//echo "hello";
//print_r(PDO::getAvailableDrivers());
$host = "localhost";
$dbname = "gyft-companies";
$user = "root";
$pass = "qburst";
try {
	# MySQL with PDO_MYSQL
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
# the data we want to insert
$data = array('Cathy', '9 Dark and Twisty Road', 'Cardiff');

$sql = "INSERT INTO users (username,city1,state) VALUES (?,?,?)";
try {
  $STH = $DBH->prepare($sql);
  $query_insert = $STH->execute($data);
  echo $DBH->lastInsertId();
}
catch(Exception $e) {
	echo 'Exception -> ';
	var_dump($e->getMessage());
}
/*if(!$query_insert) {
  print_r($DBH->errorInfo());
}
else {
  echo $DBH->lastInsertId();
}*/