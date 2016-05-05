<?php

$db = new PDO("mysql:host=localhost;dbname=pdo","root","");

$sql = "DELETE FROM users WHERE username=:username";

$stmt = $db->prepare($sql);

$username = "Azov";

$stmt->bindValue("username",$username);
$stmt->execute();