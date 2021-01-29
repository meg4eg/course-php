<?php
// массив данных

$task = [ 'test' => [
  'project' => [
      'Работа', 'Учеба', 'Входящие', 'Домашние дела', 'Авто'
    ],
  'tasks' => [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '31.01.2021',
        'category' => 'Работа',
        'complete' => false
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '25.12.2021',
        'category' => 'Работа',
        'complete' => false
    ],
    [
        'name' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => 'Учеба',
        'complete' => true
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '22.12.2019',
        'category' => 'Входящие',
        'complete' => false
    ],
    [
        'name' => 'Купить корм для кота',
        'date' => '',
        'category' => 'Домашние дела',
        'complete' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => '',
        'category' => 'Домашние дела',
        'complete' => false
    ]
    ]
    ],
    'mainTitle' => 'Дела в порядке'
];

function taskCount($arr, $projectName) {
    $count = 0;
    foreach ($arr as $key => $value) {
       foreach ($value as $k => $v) {
          if ($v === $projectName) {
            $count++;
        } 
       }
    }
    echo $count; 
}

function include_template($name, array $data = []) { // определяем функцию, передаем ей 2 аргумента, первый название, второй массив данных
    $name = 'templates/' . $name; // переданное название будет состоять из 'templates/'+название
    $result = ''; // переменная в которую будем возвращать результат работы

    if (!is_readable($name)) { // если не правильное имя 
        return $result; //вернуть пусть результат
    }

    ob_start(); // включение буферизации вывода
    extract($data); // импорт переменных из массива 
    require $name; // включает и выполняет указанную переменную

    $result = ob_get_clean(); // очищаем буфер

    return $result; // возвращаем результат
}
// include_once('./templates/layout.php');
print(include_template('layout.php', $task));



?>