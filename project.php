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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $errors = [];

    $rules = [
      'name' => function () use ($projects_names) {
        return validateCat('name', $projects_names);
      }
    ];

    foreach ($_POST as $key => $value) {
      if (isset($rules[$key])) {
        $rule = $rules[$key];
        $errors[$key] = $rule();
      }
    }

    $errors = array_filter($errors);

    $required = ['name'];
    foreach ($required as $field) {
      if (empty($_POST[$field])) {
        $errors[$field] = 'Поле не заполнено';
      }
    }

    if (!empty($errors)) {

      $content = include_template('form-project.php', ['countTasks' => $countTasks, 'projects' => $projects, 'errors' => $errors]);
    } else {
      $sql = "INSERT INTO projects (project_name, user_id) VALUES (?, '$current_user')";

      $stmt = db_get_prepare_stmt($con, $sql, $form);

      $res = mysqli_stmt_execute($stmt);

      if ($res) {
        header("Location: /index.php");
      }
    }
  } else {
    $content = include_template('form-project.php', ['countTasks' => $countTasks, 'projects' => $projects]);
  }
}

print(include_template('layout.php', ['dynamic' => $content, 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name]));
