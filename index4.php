<?php

$db = new PDO("mysql:host=localhost;dbname=pdo","root","");

$sql = "UPDATE users SET password=:password WHERE id=:id";
$stmt = $db->prepare($sql);

$password = "00000000";
$id = 3;

$stmt->bindValue("password",$password);
$stmt->bindValue("id",$id);
$stmt->execute();

