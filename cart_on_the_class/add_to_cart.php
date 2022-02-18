<?php

session_start();

require('cart.php');
require_once('Product.php');

?>
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
<?php
$products = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $products->existProduct($_POST['product'])) {
    $cart = new Cart();
    $cart->addItem($_POST['product'], $_POST['count']);
}
?>
<a href="/cart_on_the_class/list.php">
    Список
</a>

<form method="post" action="/cart_on_the_class/add_to_cart.php">
    <select name="product">
        <?php
            foreach ($products->getProducts() as $id => $product) {
                echo '<option value="' . $id . '">' . $product['name'] . '</option>';
            }
        ?>
    </select>
    <input type="number" name="count" min="1" value="1">
    <input hidden name="action" value="add_to_cart">

    <button type="submit">Отправить</button>

</form>
</body>
</html>