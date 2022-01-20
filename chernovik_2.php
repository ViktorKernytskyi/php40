<?php


$arr = [
    'length' => [],
    'width' => [],
    'height' => []
];

for ($i = 1; $i <= 12; $i++) {
    $arr['length'][$i] = rand(1, 10);
    $arr['width'][$i] = rand(1, 13);
    $arr['height'][$i] = rand(1, 13);
}
$volume = 0;
foreach ($arr['length']  as $i => $item) {


       // var_dump('<pre>', $arr['length'] );

        // var_dump('<pre>',  $key);
        $volume = $arr['length'][$i] * $arr['width'][$i] * $arr['height'][$i];

        echo ' объем  фигуры = ' . $volume . ' ' . 'м^3' . '<br>';

}


echo "<hr>";
echo "<hr>";
echo "<hr>";
//Фирме принадлежат два магазина. Известна стоимость товаров, проданных
//в каждом магазине за каждый день в июле и августе, которая хранится
//в двух массивах. Получить общую стоимость проданных фирмой товаров за
//два месяца.

$arr = [
'august' => [],
  'jule' => []
];

for ($i = 1; $i <= 31; $i++) {
    $arr['august'][$i] = rand(100, 10000);

  $arr_august = 0;
  $arr_august  = $arr_august  + $arr['august'][$i];
  //echo $arr_august . '<br>';
  $arr['jule'][$i] = rand(100, 10000);
    $arr_jule = 0;
    $arr_jule  =  $arr_jule  + $arr['jule'][$i];
    //echo $arr_jule . '<br>';

// var_dump('<pre>', $arr);
}
//var_dump('<pre>', $arr);

echo 'За июль - ' . $arr_jule . '<br>';
echo 'За Август - ' . $arr_august . '<br>';

echo 'общая стоимость проданных фирмой товаров за два месяца = ' ;
   echo $arr_jule + $arr_august;