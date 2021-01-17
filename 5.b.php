<!--
5. Задачи на выбор типов данных

b. Предположим у нас в программе цены хранятся в виде целых чисел, но фактически - два последних разряда числа обозначают копейки. Например, цена товара хранится в виде 10050, это значит что товар стоит 100 рублей 50 копеек. Написать программу которая выведет на экран цену в двух форматах “N рубл[ей/я] M копе[ек/ки].” и “N.M руб.” увеличив при этом цену товара на 13 процентов. В программе использовать оператор % ($a % $b - целочисленный остаток от деления $a на $b).

                                Данные для самопроверки

        Входные данные                  |           Выходные данные
    price=21232212 						|	239923 рубля 99 копеек и 239923.99 руб.
    price=10500							|	118 рублей 65 копеек и 118.65 руб.
    price=60							| 	0 рублей 67 копеек и 0.67 руб.

    -->

<?php
$price = 12502;
$b = 100;
$price_new = $price / $b;
$procent = $price_new * 13 / 100;
$sum = $price_new + $procent;
$sum_x = $sum%10;
$sum1 = number_format($sum, 2, ' рублей ', '');
$sum2 = number_format($sum, 2, ' рубль ', '');
$sum3 = number_format($sum, 2, ' рубля ', '');
$sum4 = number_format($sum, 2, '.', '');

if (substr($sum, -1, 2) == 0 or substr($sum, -1, 2) == 5 or substr($sum, -1, 2) == 6 or substr($sum, -1, 2) == 7 or substr($sum, -1, 2) == 8 or substr($sum, -1, 2) == 9 or substr($sum, -2, 2) == 11 or substr($sum, -2, 2) == 12 or substr($sum, -2, 2) == 13 or substr($sum, -2, 2) == 14) {
  $kop = 'копеек';
}
else if (substr($sum, -1, 2) == 1){
  $kop = 'копейка';
}
else {
  $kop = 'копейки';
}

if ($sum_x == 0 or $sum_x == 5 or $sum_x == 6 or $sum_x == 7 or $sum_x== 8 or $sum_x == 9 or substr($sum, -5, 2) == 11 or substr($sum, -5, 2) == 12 or substr($sum, -5, 2) == 13 or substr($sum, -5, 2) == 14)  {
    echo($sum1 .' ' . $kop. ' и ' . $sum4 . ' руб.');
}
else if ($sum_x == 1) {
    echo($sum2 .' ' .$kop. ' и ' . $sum4 . ' руб.');
}
else {
    echo($sum3 .' ' . $kop. ' и ' . $sum4 . ' руб.');
}