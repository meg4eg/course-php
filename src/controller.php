<?php

if ($_SERVER['SCRIPT_NAME'] == '/index.php') {
  printPage('/index.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/bytovka.php'){
  printPage('/bytovka.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/catalog.php'){
  printPage('/catalog.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/contacts.php'){
  printPage('/contacts.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/delivery.php'){
  printPage('/delivery.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/photogallery.php'){
  printPage('/photogallery.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/price.php'){
  printPage('/price.php', $database);
}
elseif ($_SERVER['SCRIPT_NAME'] == '/rent.php'){
  printPage('/rent.php', $database);
}

function printPage($url_key, &$database) { // определяем функцию printPage в которой задаем $url_key и заранее созданную $database, которая будет выводить нужную страницу
  $data = searchData($database, $url_key); // создаем переменную data которая является аналогом поисковой функции из model.php
  if (!empty($data) && file_exists(PATH_TPL . $data['tpl'])) { //если найденное значение не пустое и этот файл находится по адресу корень сайта/templates/значени ключа 'tpl' из database, то
    include_once(PATH_TPL . $data['tpl']); // подключить этот путь 'корень сайта/templates/'tpl'(main.php)
  }
  else {
    die('в базе данных нет данных для вызываемой страницы'); // если нет, вывести сообщение
  }
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

?>