<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table border="1" cellspacing="0">
    <tr>
        <?php

        for($i = 1; $i < 10; $i++){
            echo "<th>$i</th>";

        }

        ?>
    </tr>

    <tr>
        <?php

        for($i = 1; $i < 10; $i++){
            echo "<td>$i</td>";

        }

        ?>
    </tr>
    <tr>
        <?php
        for( $j = 1; $j < 10;  $j++){
            echo "<td>$j</td>";

        }

        ?>
    </tr>
    <tr>
</table>
</body>
</html>

//$sum = 0; // присвоил начальное значение
//for ($i = 100; $i <= 500; $i++){
//$sum +=  $i; // идет калькуляция

//}
//echo $sum; // выводим результат

//echo "<hr>" ;
