<?php 

$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=".$db, $user, $pass);
} catch (PDOException $err) {
    echo "Ocorreu erro no db";
}