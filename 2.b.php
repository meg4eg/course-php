<!--
2. Задачи на написание линейных алгоритмов (переменные, арифметические операции, вывод на экран).

посчитать и вывести на экран значение S. Дано S = (a + b)^2, a = 7x, b=21x

				Данные для самопроверки

		Входные данные 		| 			Выходные данные
			x=1/2			|				p=196
			x=2				|				p=3136
			x=4				|				p=12544
 -->

 <?php
 $x = 2;
 $a = 7*$x;
 $b = 21*$x;
 $S = ($a + $b)**2;
 print('S = '.$S);