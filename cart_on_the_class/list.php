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
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Корзина</h1>
<hr>
<a href="/cart_on_the_class/add_to_cart.php"> Добавить товар </a>
<div>

    <p>Общее кол-во: <?php     echo $cart -> count ?></p>


    <p>Сумма к оплате: <?php   echo $cart -> sum . '&nbsp'.'грн'?> </p>
    <p>Ваша скидка: <?php   echo $cart->discount . '&nbsp'.'%'?> </p>
    <p>Ваша скидка состаляет: <?php   echo $cart->sum *  $cart->discount / 100 . '&nbsp'.'грн'?> </p>
</div>

<table border="1" cellspacing="0">
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Цена 1-го товара</th>
        <th>Кол-во</th>

        <th>Действие</th>
    </tr>

    <?php

    foreach ($cart->items as $key => $item) {
        ?>

        <tr>
            <td><?php  echo $item['id'] ?></td>
            <td style="width: 550px">
                <?php echo $item['name'] ?>
            </td>
            <td style="width: 150px">
                <?php echo $item['price']. '&nbsp'.'грн' ?>
            </td>
            <td>
                <form method="post" action="/cart_on_the_class/list.php">
                    <input type="number" name="count" min="0" value="<?php echo $item['quantity'] ?>">

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
        <?php $n++;
    } ?>

</table>


</body>
</html>