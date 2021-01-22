<?php

function searchData(&$database, $url_key) { //определяем функцию, которая будет искать в database $url_key котоырй мы задаем при обращении к функции
  foreach ($database['pages'] as $key => $value) { //цикл который ищет в database по 1 уровню [ключа]
    if ($value['url_key'] == $url_key) { //если значение в ключе url_key в database совпадает с $url_key вводимым при обращении к функции,
      return $value; // то возвращает значение url_key, то есть адресс страницы в формате /xxx.php
    }
  }
  return false;
}

?>