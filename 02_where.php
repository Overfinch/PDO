<?php

$db = new PDO("mysql:host=localhost;dbname=pdo;charset=utf8","root",""); // инициализация

$sql = "SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1"; // запрос
$stmt = $db->prepare($sql); // подготовка

$username = "Gizmo";
$password = "22041989";

$stmt->bindValue("username", $username); // назначает значения
$stmt->bindValue("password", $password);

$stmt->execute(); // выполняем
$user = $stmt->fetch(PDO::FETCH_ASSOC); // записываем результат

echo "<pre>";
print_r($user);
echo "</pre>";