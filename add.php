<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
  exit();
}
include_once('./helpers.php');
$current_user = $_SESSION['user']['id'];
$con = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
mysqli_set_charset($con, "utf8");

if ($con == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
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
  } else {
    print("Ошибка " . mysqli_error($con));
  }
  // задачи
  $sql = "SELECT task_name, done, file, done_time, project_id FROM tasks WHERE user_id = $current_user";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
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
  } else {
    print("Ошибка " . mysqli_error($con));
  }

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

      $content = include_template('form-task.php', ['tasks' => $tasks, 'projects' => $projects, 'errors' => $errors]);
    } else {
      $sql = "INSERT INTO tasks (task_name, project_id, done_time, file, user_id) VALUES (?, ?, ?, ?, '$current_user')";

      $stmt = db_get_prepare_stmt($con, $sql, $form);

      $res = mysqli_stmt_execute($stmt);

      if ($res) {
        header("Location: /index.php");
      }
      // $content = include_template('form-task.php', ['tasks' => $tasks, 'projects' => $projects, 'errors' => $errors]);
    }
  } else {
    $content = include_template('form-task.php', ['tasks' => $tasks, 'projects' => $projects]);
  }
}


print(include_template('layout.php', ['dynamic' => $content, 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name]));
