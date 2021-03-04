<?php
require_once('init.php');
if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
  exit();
}
include_once('./helpers.php');
$current_user = $_SESSION['user']['id'];

if ($con == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
  require_once('sql.php');
  $projects_ids = [];
  $projects_ids = array_column($projects, 'project_id');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $errors = [];

    $rules = [
      'project' => function () use ($projects_ids) {
        return validateCategory('project', $projects_ids);
      },
      'name' => function () {
        return validateFilled('name');
      },
      'date' => function () {
        return validateDate('date');
        return is_date_valid('date');
      }
    ];

    foreach ($_POST as $key => $value) {
      if (isset($rules[$key])) {
        $rule = $rules[$key];
        $errors[$key] = $rule();
      }
    }

    $errors = array_filter($errors);

    $required = ['name', 'project'];
    foreach ($required as $field) {
      if (empty($_POST[$field])) {
        $errors[$field] = 'Поле не заполнено';
      }
    }

    if (!empty($_FILES['file']['name'])) {
      
      $file_name = $_FILES['file']['name'] ;
      $uniqid = uniqid();
      $file_path =  mkdir(__DIR__ . '/uploads/'.$uniqid.'/');
      $file_url = '/uploads/' . $uniqid. '/' . $file_name;
      
      $form['file'] = $file_url;

      move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . $file_url);

    } 
    else {
      $form['file'] = null;
    }

    if (!empty($errors)) {

      $content = include_template('form-task.php', ['countTasks' => $countTasks, 'projects' => $projects, 'errors' => $errors, 'form' => $form]);
    } else {
      $sql = "INSERT INTO tasks (task_name, project_id, done_time, file, user_id) VALUES (?, ?, ?, ?, '$current_user')";

      $stmt = db_get_prepare_stmt($con, $sql, $form);

      $res = mysqli_stmt_execute($stmt);

      if ($res) {
        header("Location: /index.php");
      }
    }
  } else {
    $content = include_template('form-task.php', ['countTasks' => $countTasks, 'projects' => $projects]);
  }
}


print(include_template('layout.php', ['dynamic' => $content, 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name]));
