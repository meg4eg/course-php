<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: /index.php');
  exit();
}
include_once('./helpers.php');

$con = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
mysqli_set_charset($con, "utf8");

$tpl_data = [];
$errors = [];

if ($con == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    foreach ($form as $key => $value) {
      if ($key == 'email') {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $errors[$key] = 'email должен быть корректным';
        }
      }
    }

    $req_fields = ['email', 'password', "name"];

    foreach ($req_fields as $field) {
      if (empty($form[$field])) {
        $errors[$field] = 'Заполните поле ' . $field;
      }
    }


    if (empty($errors)) {
      $email = mysqli_real_escape_string($con, $form['email']);
      $sql = "SELECT id FROM users WHERE email = '$email'";
      $res = mysqli_query($con, $sql);

      if (mysqli_num_rows($res) > 0) {
        $errors['email'] = 'Пользователь с этим email уже зарегистрирован';
      } else {
        $password = password_hash($form['password'], PASSWORD_DEFAULT);

        $sql = 'INSERT INTO users (email, password, name) VALUES ( ?, ?, ?)';

        $stmt = db_get_prepare_stmt($con, $sql, [$form['email'], $password, $form['name']]);
        $res = mysqli_stmt_execute($stmt);
      }
      if ($res && empty($errors)) {
        header("location: /index.php");
        exit();
      }
      $tpl_data['errors'] = $errors;
      $tpl_data['values'] = $form;

      $content = include_template('register.php', $tpl_data);
    } else {
      $tpl_data['errors'] = $errors;
      $tpl_data['values'] = $form;

      $content = include_template('register.php', $tpl_data);
    }
  } else {
    $content = include_template('register.php', $errors);
  }
}




print(include_template('layout.php', ['dynamic' => $content, 'mainTitle' => 'Дела в порядке']));
