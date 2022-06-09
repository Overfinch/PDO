<?php

class Categories {

    private $db;
    private $treeStr = '';
    private $data;

    public function __construct(){
        $this->connect();
    }

    public function connect(){ // инициализируем соединение с БД
        $this->db = new PDO("mysql:host=mysql;dbname=php-test;charset=utf8","root","root");
    }

    public function fetch(){ // выбираем всё из таблицы и складывает в массив
        $this->data = $this->db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function makeTree($p_id = 0){ // рекурсивная функция, которвя строит список в виде дерева, принимает p_id
        foreach ($this->data as $item){ // переберает весь массив каждый раз
            if ($item['p_id'] == $p_id){ // если p_id эллемента массива соответствует запрошенному p_id в аргументе, то сторит часть списка и рекурсивно открывает функцию makeTree() и передаёт ей id нынешнего элемента массива, который будет принят функцией как p_id
                $this->treeStr .= '<ul>';
                $this->treeStr .= '<li>';
                $this->treeStr .= $item['name'];
                $this->treeStr .= '</li>';
                $this->makeTree($item['id']);
                $this->treeStr .= '</ul>';
            }
        }
    }

    public function showTree(){
        echo $this->treeStr; // выводит строку с созданым списком дерева категорий
    }

}

$categories = new Categories();

$categories->fetch();
$categories->makeTree();
$categories->showTree();


