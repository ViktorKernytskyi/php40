<?php

session_start();

require('cart.php');

$cart = new Cart();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'changeQty' :
            $cart->changeQty($_POST['id'], $_POST['count']);
            break;
        case 'calculate' :
            $cart->calculate($_POST['cart']);
            break;
        case 'delete' :
            $cart->deleteItem($_POST['cart']);
            break;
    }

    header("Location:cart_items.php");
}
