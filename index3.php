<?php

// вставка в БД

$db = new PDO("mysql:host=localhost;dbname=pdo","root","");

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmp = $db->prepare($sql);

$username = "Azov";
$password = "11111111";

$stmp->bindValue("username",$username);
$stmp->bindValue("password",$password);
$stmp->execute();

echo "было затронуто строк: ". $stmp->rowCount()."<br>";
echo "ID вставленной записи: ".$db->lastInsertId();

