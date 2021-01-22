<?php

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']); //определили константу которая выбирает корень сайта, первую папку
define('PATH_SRC', ROOT_PATH . '/src/'); // константа которая ведет в папку src которая находится в корне сайта
define('PATH_TPL', ROOT_PATH . '/templates/'); // константа которая ведет в папку templates которая находится в корне сайта

$baseFiles = []; // массив файлов ядра которые нужно подключать в программе

$baseFiles[] = PATH_SRC . 'database.php'; //в этом файле мы будем хранить контентные данные для страниц сайта
$baseFiles[] = PATH_SRC . 'model.php'; //этот файл будет иметь функции для поиска нужной информации в database
$baseFiles[] = PATH_SRC . 'controller.php'; //этот файл будет реализовывать логику, связывать данные и шаблоны

//подключаем все файлы. 
foreach ($baseFiles as $key => $value) {
  
  include_once($value); // подключили все файлы 
}
