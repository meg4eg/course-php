<?php
include_once('./helpers.php');
$current_user = 3;
$con = mysqli_connect("localhost", "root", "root", "my_deal");
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
  $sql = "SELECT task_name, done, file, done_time, project_id FROM tasks WHERE user_id = $current_user";
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
  $projects_ids = [];
  if ($result) {
      $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $projects_ids = array_column($projects, 'project_id');
      foreach ($projects as $ke => $va) {
      $projects[$ke]['url'] = $url;
          }
      }
  else {
      print("Ошибка " . mysqli_error($con));
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $required = ['name', 'project'];
    $errors = [];

    $rules = [
      'project' => function() use ($projects_ids) {
        return validateCategory('project', $projects_ids);
      },
      'name' => function() {
        return validateFilled('name');
      }
      // 'date' => function() {
      //   return vaidateDate('date');// не знаю как сделать номр функцию
      // }
    ];
    
    foreach ($_POST as $key => $value) {
      if (isset($rules[$key])) {
        $rule = $rules[$key];
        $errors[$key] = $rule();
      }
    }

    $errors = array_filter($errors);

    foreach ($required as $field) {
      if (empty($_POST[$field])) {
        $errors[$field] = 'Поле не заполнено';
      }
    }

    if (isset($_FILES['file']['name'])) {
      $filename = uniqid() . $_FILES['file']['type'];
      $form['file'] = $filename;
      move_uploaded_file($_FILES['file']['tmp_name'], '/' . $filename);
      $tasks['file'] = $filename;
    }

    if (count($errors)) {
      print(include_template('layout.php', ['dynamic'=>include_template('form-task.php', ['tasks' => $tasks, 'projects' => $projects, 'errors' => $errors]), 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name] ));
    }
    else {
      $sql = "INSERT INTO tasks (task_name, file, done_time, user_id, project_id) VALUES (?, ?, ?, 3, ?)";
      $stmt = db_get_prepare_stmt($con, $sql, $form);
      $res = mysqli_stmt_execute($stmt);

      if ($res) {
      
        header('Location: index.php');
      }
    }

    
  }
}


print(include_template('layout.php', ['dynamic'=>include_template('form-task.php', ['tasks' => $tasks, 'projects' => $projects]), 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name] ));

?>