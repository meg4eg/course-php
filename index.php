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
//     'mainTitle' => 'Делаaa в порядке'
// ];
include_once('./helpers.php');
function taskCount($arr, $projectName) {
    $count = 0;
    foreach ($arr as $key => $value) {
        foreach ($value as $v) {
        if ($v == $projectName) {
            $count++;
         } 
        }
    }
    echo $count; 
}

$current_user = 3;
$con = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
mysqli_set_charset($con, "utf8");

if ($con == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    // print("Соединение установлено успешно"); 
    $sql = "SELECT task_name, done, file, done_time, project_id FROM tasks WHERE user_id = $current_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
    $sql = "SELECT project_name, project_id FROM projects WHERE user_id = $current_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
    $sql = "SELECT name FROM users WHERE id = $current_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $user_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
}

include_template('main.php', ['tasks' => $tasks, 'projects' => $projects]);
print(include_template('layout.php', ['main'=>include_template('main.php', ['tasks' => $tasks, 'projects' => $projects]), 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name] ));

?>