<?php
require_once('init.php');
include_once('./helpers.php');

if ($con == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user']['id'];
        require_once('sql.php');
        // фильтр по дням
        if (isset($_GET['sort']) && $_GET['sort'] == 'day') {
            $show_task = 'done_time = CURDATE()';
        } elseif (isset($_GET['sort']) && $_GET['sort'] == 'tomorrow') {
            $show_task = 'done_time = ADDDATE(CURDATE(), INTERVAL 1 DAY)';
        } elseif (isset($_GET['sort']) && $_GET['sort'] == 'late') {
            $show_task = 'done_time < CURDATE()';
        }
        //фильтр по проектам
        if (isset($_GET['project_id'])) {
            $show_task = 'project_id=' . $_GET['project_id'];
            $sql = "SELECT project_id FROM projects WHERE user_id = $current_user AND project_id = $_GET[project_id]";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $error = mysqli_fetch_all($result, MYSQLI_ASSOC);
                if (empty($error)) {
                    http_response_code(404);
                }
            } else if ($_GET['project_id'] == '') {
                http_response_code(404);
                $show_task = 'project_id=' . 0;
            }
        }
        //задачи для поиска
        $sql = "SELECT task_name, done, file, done_time, project_id, task_id FROM tasks WHERE user_id = $current_user AND $show_task";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            print("Ошибка2 " . mysqli_error($con));
        }
        // выполнение задачи
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = $_POST;

            if ($form['check']) {
                $check = $form['check'];
                $test = "SELECT done FROM tasks WHERE task_id = '$check'";
                $result = mysqli_query($con, $test);
                $done = mysqli_fetch_assoc($result);
                if ($done['done'] == 'Y') {
                    $sql = "UPDATE tasks SET done = 'N' WHERE task_id = '$check'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        header("Location: /index.php");
                    }
                } elseif ($done['done'] == 'N') {
                    $sql = "UPDATE tasks SET done = 'Y' WHERE task_id = '$check'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        header("Location: /index.php");
                    }
                }
            }
        }
        // поиск по задачам
        $search = $_GET['search'] ?? '';
        if ($search) {
            $sql = "SELECT task_name, done, file, done_time, project_id, task_id FROM tasks WHERE MATCH(task_name) AGAINST(?) AND user_id = $current_user";
            $stmt = db_get_prepare_stmt($con, $sql, [$search]);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
}

if (isset($_SESSION['user'])) {
    print(include_template('layout.php', ['dynamic' => include_template('main.php', ['countTasks' => $countTasks, 'tasks' => $tasks, 'projects' => $projects]), 'mainTitle' => 'Дела в порядке', 'user_name' => $user_name]));
} else {
    print(include_template('layout.php', ['dynamic' => include_template('guest.php', []), 'mainTitle' => 'Дела в порядке']));
}
