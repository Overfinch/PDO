<?php

$db = new PDO("mysql:host=mysql;dbname=php-test;charset=utf8","root","root");
$categories = $db->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);

function CreateTree($array, $p_id=0)
{
    $result = [];
    foreach ($array as $item){
        if($item['p_id'] == $p_id){
            $tempArr = CreateTree($array,$item['id']);
            if (!empty($tempArr)){
                $result[$item['name']] = CreateTree($array,$item['id']);
            }else{
                $result[] = $item['name'];
            }
        }
    }

    return $result;
}

$tree = CreateTree($categories);

echo "<pre>";
print_r($tree);
echo "</pre>";


