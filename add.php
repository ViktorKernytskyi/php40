<?php
session_start();

include('cart_1.php');
?>

<a href="/cart/list.php">Список </a>

<form method="post" action="/add.php">
    <select name="product">
        <?php

                foreach ($products as $id => $product){
            echo '<option value="' . $id .'">' . $product['name'] . '</option>';
        }
        ?>

    </select>
    
    <input type="number" name="count" value="">
    <input hidden name="action" value="add">

    <button type="submit" >Отправить</button>
</form>
