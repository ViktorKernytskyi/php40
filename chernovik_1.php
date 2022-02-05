<?php

//Известно, что в массиве имеются элементы, большие 65 530. Определить:
//а) номер первого из них;
//б) номер последнего из них.
//В обеих задачах условный оператор не использовать.


//Известно, что в массиве имеются нулевые элементы. Напечатать:
//а) все элементы, кроме первого из них;
//б) все элементы, кроме последнего из них.
//Примечание
//В обеих задачах условный оператор не использовать.



echo "<hr>";
echo "<hr>";
echo "<hr>";



// функция без параметров
function present()
{
    echo 'Hello world';
}
//present();

$arr = [1, 2, 3, 4];
$arr_two = ['a', 'b', 'c'];

// функция с параметром
function getLastItemArray($data)
{
    $lastKey = count($data) - 1;
    $lastItem = $data[$lastKey];

    echo $lastItem;
}
//getLastItemArray($arr_two);

function getSum($a, $b)
{
    $sum = $a + $b;
    return $sum;
}
$var_a = 2;
$var_b = 5;
$sumFunc = getSum($var_a, $var_b);

// функция с параметрами по умолчанию
function page($pageName, $role = null)
{
    if (!$role)
        exit('PHP continues.');

    echo "Page: $pageName, Role: $role";
}
//page('home', 3);


// Параметр по ссылке
function lincFunc(&$a)
{
    $a++;
}
$test = 6;
lincFunc($test);
echo $test;
lincFunc($test);
echo $test;


// функция без параметров
//function present()
//{
   // echo 'Hello world';
//}

//present();

$arr = [1, 2, 3, 4];
$arr_two = ['a', 'b', 'c'];

// функция с параметром
//function getLastItemArray($data)
//{
  //  $lastKey = count($data) - 1;
  //  $lastItem = $data[$lastKey];

  //  echo $lastItem;
//}

//getLastItemArray($arr_two);

function getSum($a, $b)
{
    $sum = $a + $b;
    return $sum;
}

$var_a = 2;
$var_b = 5;
$sumFunc = getSum($var_a, $var_b);

// функция с параметрами по умолчанию
function page($pageName, $role = null)
{
    if (!$role)
        exit('PHP continues.');

    echo "Page: $pageName, Role: $role";
}

//page('home', 3);


// Параметр по ссылке
function lincFunc(&$a)
{
    $a++;
}

$test = 6;
lincFunc($test);
echo $test;
lincFunc($test);
echo $test;


//сделайте функцию, которая возвпращает квадрат числа. число передается парпаметром
function square($val)
{
    return $val * $val;
}

$num = 4;
$result = square($num);
echo $result;

//Сделайте функцию, которая возвращает сумму двух чисел. Числа передаются параметрами функции.
function sum($val1, $val2)
{
    return $val1 + $val2;
}

$val1 = 10;
$val2 = 5;
$result = sum($val1, $val2);
echo $result;


// Сделайте функцию, которая отнимает от первого числа второе и делит на третье.
function difference($val1, $val2, $val3)
{
    return ($val1 - $val2) / $val3;

}

$val1 = 5;
$val2 = 3;
$val3 = 5;
echo $result = difference($val1, $val2, $val3);

// Сделайте функцию, которая принимает параметром число от 1 до 7,
// а возвращает день недели на русском языке.
function dayNumberToText($day)
{
    $days = [1 => 'пн', 2 => 'вт', 3 => 'ср', 4 => 'чт', 5 => 'пт', 6 => 'сб', 7 => 'вс'];
    return $days[$day];

}

$day = rand(1, 7);


echo dayNumberToText($day);
















