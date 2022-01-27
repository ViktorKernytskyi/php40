<?php
session_start();
//require 'products.php';

include('cart_1.php');
?>
<a href="/list.php">Список </a>
<form method="post" action="/delete.php">
    <select name="product">
        <?php
        foreach ($products as $id => $product){
            echo '<option value="' . $id .'">' . $product['name'] . '</option>';
        }
        ?>

    </select>
    <input type="number" name="count" value="">
    <input hidden name="action" value="list">

    <button type="submit" >Удалить</button>
</form>
<table border="1" cellspacing="0">

</table>