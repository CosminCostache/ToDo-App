<?php
//database_connection.php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

$connect = new PDO("mysql: host=$hostname; dbname=$dbname", $username, $password);

global $pdo;
try {
    $pdo = new PDO('mysql:host=' . $hostname . ';dbname=' . $dbname . '', $username, $password);
} catch (PDOExcetion $e) {
    $output = 'Error';
    echo $output;
    exit();
}
