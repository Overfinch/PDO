<?php


$db = new PDO("mysql:host=localhost;dbname=pdo","root"."");

$sql = "SET NAMES utf8";
$result = $db->query($sql);
$result->execute();

$sql = "SELECT u.id, u.username, d.name AS d_name
FROM users u
LEFT JOIN departments d ON u.d_id = d.id";


$result = $db->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";
