<?php
// массив данных

// $task = [ 
//   'project' => [
//       'Работа', 'Учеба', 'Входящие', 'Домашние дела', 'Авто'
//     ],
//   'tasks' => [
//         [
//             'name' => 'Собеседование в IT компании',
//             'date' => '30.01.2021',
//             'category' => 'Работа',
//             'complete' => false
//         ],
//         [
//             'name' => 'Выполнить тестовое задание',
//             'date' => '25.12.2021',
//             'category' => 'Работа',
//             'complete' => false
//         ],
//         [
//             'name' => 'Сделать задание первого раздела',
//             'date' => '21.12.2019',
//             'category' => 'Учеба',
//             'complete' => true
//         ],
//         [
//             'name' => 'Встреча с другом',
//             'date' => '22.12.2019',
//             'category' => 'Входящие',
//             'complete' => false
//         ],
//         [
//             'name' => 'Купить корм для кота',
//             'date' => '',
//             'category' => 'Домашние дела',
//             'complete' => false
//         ],
//         [
//             'name' => 'Заказать пиццу',
//             'date' => '',
//             'category' => 'Домашние дела',
//             'complete' => false
//         ]
//     ],
    
// ];

$link = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

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


include_once('./helpers.php');

include_template('main.php', $task);
print(include_template('layout.php', $arr=['main'=>include_template('main.php', $task), 'mainTitle' => 'Дела в порядке', 'userName' => 'Имя'] ));

?>