<?php
$current_user = 3;
$con = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
mysqli_set_charset($con, "utf8");

if ($con == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    $params = $_GET;
    $params['project_id'] = '';
    $scriptname = pathinfo(__FILE__, PATHINFO_BASENAME);
    $query = http_build_query($params);
    $url = "/" . $scriptname . "?" . $query;
    
    if (isset($_GET['project_id'])) {
        $show_task = 'project_id='.$_GET['project_id'];
    }
    else {
        $show_task = 'user_id ='.$current_user;   
    }

    if (isset($_GET['project_id'])) {
        $sql = "SELECT project_id FROM projects WHERE user_id = $current_user AND project_id = $_GET[project_id]";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $error = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($error)) {
                http_response_code(404);
            }
        }
        else if ($_GET['project_id'] == '') {
            http_response_code(404);
        }
    }      
// Имя активного юзера
    $sql = "SELECT name FROM users WHERE id = $current_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $user_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
// задачи
    $sql = "SELECT task_name, done, file, done_time, project_id FROM tasks WHERE $show_task";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
// список проектов для юзера 
    $sql = "SELECT project_name, project_id FROM projects WHERE user_id = $current_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($projects as $ke => $va) {
        $projects[$ke]['url'] = $url; 
            }  
        }
    else {
        print("Ошибка " . mysqli_error($con));
    }
    

      
}


include_once('./helpers.php');
include_template('main.php', ['tasks' => $tasks, 'projects' => $projects]);
print(include_template('layout.php', ['dynamic'=>include_template('main.php', ['tasks' => $tasks, 'projects' => $projects]), 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name] ));

?>