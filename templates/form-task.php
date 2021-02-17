<div class="content">
            <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                    <?php foreach ($projects as $key => $value) : $category = $value['project_name']; $pr_id = $value['project_id']; $url = $value['url'] ?>
                        <li class="main-navigation__list-item <?php echo ($pr_id == $_GET['project_id'] ? 'main-navigation__list-item--active' : '') ?>">
                            <a class="main-navigation__list-item-link" href="<?php echo($url.$pr_id) ?>"><?php echo(htmlspecialchars($category))  ?></a>
                            <span class="main-navigation__list-item-count"><?php taskCount($tasks, $pr_id) ?></span>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </nav>
                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
        <h2 class="content__main-heading">Добавление задачи</h2>

        <form class="form"  action="add.php" method="post" autocomplete="off">
          <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>
            <?php $classname = isset($errors['name']) ? 'form__input--error' : ''; ?>
            <input class="form__input <?= $classname; ?>" type="text" name="name" id="name" value="<?= getPostVal('name'); ?>" placeholder="Введите название">
            <?php if (isset($errors['name'])): ?>
              <p class="form__message"><?= $errors['name']; ?></p>
            <?php endif; ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>
            <?php $classname = isset($errors['project']) ? 'form__input--error' : ''; ?>
            <select class="form__input form__input--select <?= $classname; ?>" name="project" id="project">
              <?php foreach ($projects as $value) : $project_name = $value['project_name'] ?>
              <option value="<?= $value['project_id'] ?>"><?php echo(htmlspecialchars($project_name)); ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>
            <?php $classname = isset($errors['date']) ? 'form__input--error' : ''; ?>
            <input class="form__input form__input--date <?= $classname; ?>" type="text" name="date" id="date" value="<?= isset($errors['date']) ? getPostVal('date') : ''; ?>" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <?php if (isset($errors['date'])): ?>
              <p class="form__message"><?= $errors['date']; ?></p>
            <?php endif; ?>
          </div>

          <div class="form__row">
            <label class="form__label" for="file">Файл</label>

            <div class="form__input-file">
              <input class="visually-hidden" type="file" name="file" id="file" value="<?= getPostVal('file'); ?>">

              <label class="button button--transparent" for="file">
                <span>Выберите файл</span>
              </label>
            </div>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
          </div>
        </form>
      </main>
        </div>
        
    </div>
</div>