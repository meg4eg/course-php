INSERT INTO projects (project_name)
VALUES ('Работа'), ('Учеба'), ('Входящие'), ('Домашние дела'), ('Авто');
INSERT INTO users (reg_date, email, name, password)
VALUES(CURRENT_TIMESTAMP(), 'example@mail.ru', 'Экзампл', 'Экзампл123');
INSERT INTO users (reg_date, email, name, password)
VALUES(CURRENT_TIMESTAMP(), 'test@mail.ru', 'Тест', 'Тест123');
INSERT INTO tasks (data, task_name, done_time, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 'Собеседование в IT компании', '2021-02-03', 1, 1);
INSERT INTO tasks (data, task_name, done_time, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 'Выполнить тестовое задание', '2021-12-25', 2, 1);
INSERT INTO tasks (data, done, task_name, done_time, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 1, 'Сделать задание первого раздела', '2019-12-21', 1, 2);
INSERT INTO tasks (data, task_name, done_time, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 'Встреча с другом', '2019-12-22', 1, 3);
INSERT INTO tasks (data, task_name, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 'Купить корм для кота', 2, 4);
INSERT INTO tasks (data, task_name, user_id, project_id)
VALUES(CURRENT_TIMESTAMP(), 'Заказать пиццу', 1, 4);
CREATE INDEX t_name ON tasks (task_name);
SELECT project_name FROM projects;
SELECT * FROM tasks
WHERE project_id = 1;
UPDATE tasks SET done = 1
WHERE task_name = 'Заказать пиццу';
UPDATE tasks SET task_name = 'Обновленное название'
WHERE task_id = 5;
