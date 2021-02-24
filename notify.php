<?php
require_once "vendor/autoload.php";
include_once('./helpers.php');
$con = mysqli_connect("localhost", "id15990969_root", "mFr0e@M&-kGxo^fG", "id15990969_my_deal");
mysqli_set_charset($con, "utf8");
if ($con == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
  $transport = new Swift_SmtpTransport('smtp-relay.gmail.com', 25);
  $transport->setUsername('meg4eg@gmail.com');
  $transport->setPassword('Meg0074eg');

  $mailer = new Swift_Mailer($transport);

  $sql = "SELECT done_time, task_name, email, name FROM tasks JOIN users ON tasks.user_id = users.id  WHERE done = 'N' AND DAY(done_time) = DAY(NOW())";
  $result = mysqli_query($con, $sql);
  if ($result && mysqli_num_rows($result)) {
    $not_dones = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $recipients = [];
    foreach ($not_dones as $user) {
      $recipients[$user['email']] = $user['name'];
      $msg_content[$user['email']] = "Уважаемый, $user[name]. У вас запланирована задача $user[task_name] на $user[done_time] ";
    }

    $message = new Swift_Message();
    $message->setSubject('Уведомление от сервиса «Дела в порядке»');
    $message->setFrom(['meg4eg@gmail.com' => 'Дела в порядке']);
    $message->setBcc($recipients);

    
    $message->setBody($msg_content, 'text/plain');

    $result = $mailer->send($message);
    if ($result) {
      print('Успешно');
    }
    else {
      print('не успешно');
    }
  } else {
    print("Error ". mysqli_error($con));
  }
}
