<?php

// join
$db = new PDO("mysql:host=localhost;dbname=pdo;charset=utf8","root"."");

$sql = "SELECT users.id, users.username, departments.name AS d_name FROM users LEFT JOIN departments ON users.d_id = departments.id";
// Связываем таблицы users и departments
// связываем по users.d_id и departments.id
// и departments name называем d_name

// альтернативный запрос $sql = "SELECT u.id, u.username, d.name AS d_name FROM users u LEFT JOIN departments d ON u.d_id = d.id";

// Пример JOIN many to many через pivot table users_comments 
// "SELECT * FROM comments  JOIN users_comments ON comments.id = users_comments.comment_id LEFT JOIN users ON users_comments.user_id = users.id"

// Пример удаления удаления комментариев пренадлежащих пользователю с id = 57
// Здесь удалятся данные из таблицы comments и из таблицы users_comments (так как в самой базе указан ON DELETE CASCADE)
//DELETE comments FROM comments INNER JOIN users_comments ON users_comments.comment_id = comments.id INNER JOIN users ON users.id = users_comments.user_id WHERE users.id = 57

// А здесь удалятся данные только из таблицы users_comments а в comments останутся 
//DELETE users_comments FROM comments INNER JOIN users_comments ON users_comments.comment_id = comments.id INNER JOIN users ON users.id = users_comments.user_id WHERE users.id = 57



$result = $db->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";

