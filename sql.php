<?php
$params = $_GET;
$params['project_id'] = '';
$scriptname = pathinfo(__FILE__, PATHINFO_BASENAME);
$query = http_build_query($params);
$url = "/" . $scriptname . "?" . $query;

$show_task = 'user_id = ' . $current_user;

// список проектов для юзера 
$sql = "SELECT project_name, project_id FROM projects WHERE user_id = $current_user";
$result = mysqli_query($con, $sql);
if ($result) {
  $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);


  foreach ($projects as $key => $value) {
    $projects[$key]['url'] = $url;
  }
} else {
  print("Ошибка3 " . mysqli_error($con));
}
// Имя активного юзера
$sql = "SELECT name FROM users WHERE id = $current_user";
$result = mysqli_query($con, $sql);
if ($result) {
    $user_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    print("Ошибка1 " . mysqli_error($con));
}
// задачи
$sql = "SELECT task_name, done, file, done_time, project_id, task_id FROM tasks WHERE user_id = $current_user";
$result = mysqli_query($con, $sql);
if ($result) {
    $countTasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    print("Ошибка2 " . mysqli_error($con));
}