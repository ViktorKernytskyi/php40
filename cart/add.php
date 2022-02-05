<?php

session_start();

include('cart_1.php');

if (isset($_POST['action']) && $_POST['action'] === 'add') {

    $product = $products[$_POST['product']];
    $product['id'] = $_POST['product'];
    $product['quantity'] = $_POST['count'];

    addItem($product);
}

?>
<a href="/cart/list.php">Список </a>

<form method="post" action="/cart/add.php">
    <select name="product">
        <?php
            foreach ($products as $id => $product){
                echo '<option value="' . $id .'">' . $product['name'] . '</option>';
            }
        ?>

    </select>
        <input type="number" name="count" min="1" value="1">
    <input hidden name="action" value="add">

    <button type="submit" >Отправить</button>
</form>
