<?php
require_once('init.php');

if (isset($_SESSION['user'])) {
  header('Location: /index.php');
  exit();
}

include_once('./helpers.php');

$errors = [];

if ($con == false){
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $email = mysqli_real_escape_string($con, $form['email']);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $sql);
    if ($res) {
      $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    }
    else {
      $user = null;
    }
    
    if (empty($errors) and $user) {
      if (password_verify($form['password'], $user['password'])) {
        $_SESSION['user'] = $user;
      }
      else {
        $errors['password'] = 'wrong password';
      }
    }
    else {
      $errors['email'] = 'Такой пользователь не найден';
    }
    $req_fields = ['email', 'password'];
    foreach ($req_fields as $field) {
      if (empty($form[$field])) {
        $errors[$field] = 'Это надо заполнить';
      }
    }
    if (!empty($errors)) {
      $content = include_template('authoriz.php', ['form' => $form, 'errors' => $errors]);
    }
    else {
      header('Location: /index.php');
      exit();
    }
  }
  else {
    $content = include_template('authoriz.php', []);
    if (isset($_SESSION['user'])) {
      header('Location: /index.php');
      exit();
    }
  }
  
  print(include_template('layout.php', ['dynamic'=> $content , 'mainTitle' => 'Дела в порядке']));
}