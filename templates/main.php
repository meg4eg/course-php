<?php $show_complete_tasks = rand(0, 1); ?>
<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php foreach ($projects as $key => $value) : $category = $value['project_name'];
                    $pr_id = $value['project_id'];
                    $url = $value['url'] ?>
                    <li class="main-navigation__list-item <?php echo ($pr_id == $_GET['project_id'] ? 'main-navigation__list-item--active' : '') ?>">
                        <a class="main-navigation__list-item-link" href="<?php echo ($url . $pr_id) ?>"><?php echo (htmlspecialchars($category)) ?></a>
                        <span class="main-navigation__list-item-count"><?php taskCount($tasks, $pr_id) ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <a class="button button--transparent button--plus content__side-button" href="pages/form-project.html" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="get" autocomplete="off">
            <input class="search-form__input" type="text" name="search" value="" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                <a href="/" class="tasks-switch__item">Повестка дня</a>
                <a href="/" class="tasks-switch__item">Завтра</a>
                <a href="/" class="tasks-switch__item">Просроченные</a>
            </nav>

            <label class="checkbox">
                <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php echo ($show_complete_tasks == 1 ? '' : 'checked') ?>>
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>

        <table class="tasks">
        
            <?php foreach ($tasks as $key => $val) : $file = $val['file'];
                $nameTask = $val['task_name'];
                $dateTask = $val['done_time'];
                $completeTask = $val['done']; {
                    if ($completeTask && $show_complete_tasks == 1) {
                        continue;
                    }
                } ?>
                <tr class="tasks__item task <?php echo ($completeTask && $show_complete_tasks == 0 ? 'task--completed ' : '');
                                            echo (strtotime($dateTask) - time() <= 0 && !empty($dateTask) ? 'task--important' : ''); ?>">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden" type="checkbox" <?php echo ($completeTask == true ? 'checked' : '') ?>>
                            <span class="checkbox__text"><?php echo (htmlspecialchars($nameTask)) ?></span>
                        </label>
                    </td>

                    <td class="task__file">
                        <?php if (!empty($file)) : ?>
                            <a class="download-link" href="<?php echo $file ?>">Файл</a>
                        <?php endif ?>
                    </td>

                    <td class="task__date"><?php echo (htmlspecialchars($dateTask))  ?></td>
                    <!-- <td class="task__controls"></td> -->
                </tr>
            <?php endforeach ?>
            <?php if (empty($tasks)): ?>
                <p>Ничего не найдено по вашему запросу</p>
            <?php endif; ?>
            <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице  date($dateTask) --->
        </table>
    </main>
</div>