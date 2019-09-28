<?php


$localhost = "localhost";
$dbname = "convertor";
$user = "root";
$pass = "";



try {
    $db = new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8", $user, $pass);
} catch (Exception $e) {
    echo $e->getMessage();
}

//$sql = "INSERT INTO convertor (usd , try , azn) VALUES ($usd , $try , $manat)";


?>


