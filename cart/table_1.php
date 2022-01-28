
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
        function renderTable($n){
            for ($i = 0; $i < $n; $i++) {
                $first = $i+1;
                $second = $n - $i;
                for ($j = 1; $j <= $n; $j++) {
                    if(($j==$first || $j==$second) ){
                        $arr[$i][$j] = 1 ;
                    }else {
                        $arr[$i][$j] = 0;
                    }
                    echo    ' '.$arr[$i][$j]. ' ';

                               }
                echo '<br>';
                echo "<tr><td>  $arr[$i][$j]</td></tr>";
            }


            echo "<hr>";
        }

        renderTable(7);
        //renderTable(11);
       // for($i = 1; $i < 10; $i++){
         //   echo "<th>$i</th>";

      //  }

        ?>
    </tr>

    <tr>
      //  <?php

       // for($i = 1; $i < 10; $i++){
        //    echo "<td>$i</td>";

      //  }

      //  ?>
    </tr>
    <tr>
        //<?php
      //  for( $j = 1; $j < 10;  $j++){
          //  echo "<td>$j</td>";

       // }

       // ?>
    </tr>
    <tr>
</table>
</body>
</html>

