<!--
2. Задания с функциями:

b. Написать функцию которая выводит на экран простые числа (в математике числа называются простыми которые целочисленно делятся только на себя и на единицу) в заданном диапазоне. Диапазон передается в функцию в качестве массива(пример такого диапазона: $range = [1,50]). Так же вывести на экран отдельным блоком все составные числа (не простые). 

-->

<?php
$range = range(1,10);

function prost($range) {
  if(7 % 2 == 0) {
    print('ne prostoe')
  }
}

// foreach ($range as $val) {
// for ($n=2;$n<=$val;$n++) {
//   if ($val % $n == 0) {
//     print($val.'ne prostoe '.' ');
//     break;  
//   }
//   else {
//     print($val.'prostoe '.' ');
//     break;
//   }
// }
// }