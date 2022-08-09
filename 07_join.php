<?php

// join
$db = new PDO("mysql:host=localhost;dbname=pdo;charset=utf8","root"."");

$sql = "SELECT users.id, users.username, departments.name AS d_name FROM users LEFT JOIN departments ON users.d_id = departments.id";
// Связываем таблицы users и departments
// связываем по users.d_id и departments.id
// и departments name называем d_name

// альтернативный запрос $sql = "SELECT u.id, u.username, d.name AS d_name FROM users u LEFT JOIN departments d ON u.d_id = d.id";
// Пример JOIN many to many через pivot table users_comments "SELECT * FROM comments  JOIN users_comments ON comments.id = users_comments.comment_id LEFT JOIN users ON users_comments.user_id = users.id"

$result = $db->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";

