<!--
4. Задачи на написание алгоритмов с циклами (for, while)

d. Для предыдущей задачи написать алгоритм шифрования пароля $pass2. Необходимо сделать/нарисовать сначала блок-схему, затем воспроизвести блок-схему в коде на php

                                Данные для самопроверки

        Входные Данные					|			Выходные данные
    pass1=486, pass2=879 				|               pass2Se=978 
    pass1=355, pass2=492				|				pass2Se=942
    pass1=873, pass2=051				| 				pass2Se=150

-->

<?php
$pass1 = '355';
$pass2 = '492';

if ($pass1[1] <= 5) {
  $pass2Se = $pass2[1] . $pass2[0] . $pass2[2];
  echo('Пароль $pass2Se = ' . $pass2Se . ' так как вторая цифра $pass1 меньше либо равна 5, то $pass2se это цифры первого, второго и третьего разряда из $pass2 = ' . $pass2);
}
else {
  $pass2Se = $pass2[2] . $pass2[1] . $pass2[0];
  echo('Пароль $pass2Se = ' . $pass2Se . ' так как вторая цифра $pass1 больше 5, то $pass2se это цифры второго, третьего и первого разряда из $pass2 = ' . $pass2);
}