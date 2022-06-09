<?php

$db = new PDO("mysql:host=mysql;dbname=php-test;charset=utf8","root","root");
$categories = $db->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);

function makeTree($array, $p_id=0){
    $result = [];
    foreach ($array as $item){ // перебираем каждый эллемент массива
        if($item['p_id'] == $p_id){ // если p_id эллемента равет p_id заданному $p_id то...
            $tempArr = makeTree($array,$item['id']); // ... то вызываем рекурсивно функцию makeTree и передаём $item['id'] как $p_id для последующих циклов
            if (!empty($tempArr)){
                $result[$item['name']] = $tempArr; // если массив $tempArr не пустой, то добавляем его в результат
            }else{
                $result[] = $item['name']; // если массив пустой, то просто добавляем имя эллемента
            }
        }
    }

    return $result;
}

$tree = makeTree($categories);

echo "<pre>";
print_r($tree);
echo "</pre>";

