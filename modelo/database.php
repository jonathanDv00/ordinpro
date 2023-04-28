<?php 

$server='localhost';
$username='root';
$password='';
$database='ordinpro1';
$puerto='3307';

try {
	$conn= new PDO("mysql:host=$server;port=$puerto;dbname=$database;",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("SET CHARACTER SET UTF8");
} catch (PDOException $e) {
	die('Conneted failed:'.$e->getMessage());
}

?>