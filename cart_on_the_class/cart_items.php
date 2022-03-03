<?php

session_start();
require_once('cart.php');

$cart = new Cart();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
</head>
<body>

<h1>Корзина</h1>
<hr>
<a href="/cart_on_the_class/add_to_cart.php"> Добавить товар </a>
<div>
    <p>Общее кол-во: <?php     echo $cart -> count ?></p>

    <p>Сумма к оплате: <?php   echo $cart -> sum . '&nbsp грн'?> </p>
    <p>Ваша скидка: <?php   echo $cart->discount . '&nbsp %'?> </p>
    <p>Ваша скидка состаляет: <?php   echo $cart->sum *  $cart->discount / 100 . '&nbsp грн'?> </p>
</div>
<table border="1" cellspacing="0">
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Цена 1-го товара</th>
        <th>Кол-во</th>

        <th>Действие</th>
    </tr>

    <?php foreach ($cart->items as $key => $item) { ?>

    <tr>
        <td><?php  echo $item['id'] ?></td>
        <td style="width: 550px">
            <?php echo $item['name'] ?>
        </td>
        <td style="width: 150px">
            <?php echo $item['price']. '&nbsp грн' ?>
        </td>
        <td>
            <form method="post" action="/cart_on_the_class/action.php">

                <input type="number" name="count" min="1" value="<?php echo $item['quantity'] ?>">
                <input hidden name="id" value="<?php echo $key ?>">
                <button type="submit" name="action" value="changeQty">Изменить</button>
            </form>
        </td>
        <td>
            <form method="post" action="/cart_on_the_class/delete.php">
                <input hidden name="product" value="<?php echo $key ?>">
                <button type="submit" name="action" value="delete">
                    Удалить
                </button>
            </form>
        </td>
    </tr>
    <?php $n++;} ?>
</table>
</body>
</html>