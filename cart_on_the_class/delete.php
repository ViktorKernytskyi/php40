<?php
header("Location:list.php");

session_start();
require "cart.php";

$cart = new Cart();

$cart->deleteItem($_POST['product']);

?>