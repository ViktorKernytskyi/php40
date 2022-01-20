<?php
echo '11.216' . '<br>';
//В области 20 районов. Площади, засеянные пшеницей (в гектарах), и урожай,
// собранный в каждом районе (в центнерах), хранятся в двух массивах.
//Определить среднюю урожайность пшеницы по каждому району и по области в целом.
//Задачу решить двумя способами:
//1) без использования дополнительного (третьего) массива;
//2) с использованием дополнительного массива.
//$districts = [
         //   'square' => [],
    //    'harvest' => [],
    //   ];
$arr_square = [];
$arr_harvest = [];
$sum_square = 0;
//площадь
for ($i = 1; $i <= 20; $i++){
    $arr['square'][$i] = rand(1, 10);
   // echo ' ' . $arr['square'][$i]. ' '. '<br>';
    $sum_square += $arr['square'][$i];
    echo 'площадь = ' . $sum_square. ' ';
    echo '<br>';
}
//урожай
$count = 0;
$sum_harvest = 0;
for ($i = 1; $i <= 20; $i++) {
    $arr['harvest'][$i] = rand(10, 100);
   // echo ' урожай =' . $arr['harvest'][$i] . ' '. '<br>';
    $sum_harvest +=  $arr['harvest'][$i];
    echo 'урожай =' . $sum_harvest. ' '. '<br>';
    $count++;
    //echo 'количество     ' .$count++. ' '. '<br>';
}
$totalSq = 0; //площадь
$totalH = 0;//урожай
$totalSq += $sum_square;
$totalH += $sum_harvest;
echo '<br>' . 'общий урожай по району  '  . ' = ' . $totalH . '<br>';

echo '<br>' . 'общая площадь по району  '  . ' = ' . $totalSq . '<br>';


echo '<br>' . 'Средний урожай по району  '  . ' = ' . $sum_harvest / $sum_square . '<br>';

