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
                        <span class="main-navigation__list-item-count"><?php echo(taskCount($tasks, $pr_id)) ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button" href="project.php">Добавить проект</a>
      </section>

      <main class="content__main">
        <h2 class="content__main-heading">Добавление проекта</h2>

        <form class="form" action="project.php" method="post" autocomplete="off">
          <div class="form__row">
            <label class="form__label" for="project_name">Название <sup>*</sup></label>
            <?php $classname = isset($errors['name']) ? 'form__input--error' : ''; ?>
            <input class="form__input <?= $classname ?>" type="text" name="name" id="project_name" value="" placeholder="Введите название проекта">
            <?php if (isset($errors['name'])) : ?>
              <p class="form__message"><?= $errors['name']; ?></p>
            <?php endif; ?>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
          </div>
        </form>
      </main>
    </div>
    </div>
    </div>