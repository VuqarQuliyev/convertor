<?php
/**
 * Created by PhpStorm.
 * User: Vuqar
 * Date: 02.05.2019
 * Time: 21:42
 */




$localhost = "localhost";
$dbname =  "task";
$user = "root";
$pass = "";

try{
    $pdo = new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8",$user,$pass);

}
catch(Exception $e)
{
    echo $e->getMessage();
}


?>