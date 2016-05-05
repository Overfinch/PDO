<?php

// Простая выборка

$db = new PDO("mysql:host=localhost;dbname=pdo","root","");  // инициализация PDO

$sql = "SELECT * FROM users"; // запрос
$result = $db->query($sql); // выполнение запроса
$users = $result->fetchAll(PDO::FETCH_ASSOC); // запись результата в ассоциативный массив

foreach($users as $user){ // перебераем массив
    echo $user['username']."<br>";
    echo $user['password']."<hr>";
}

