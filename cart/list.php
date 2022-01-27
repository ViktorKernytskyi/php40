<?php
session_start();
include('cart_1.php');

?>

<h1>Корзина</h1>
<hr>
<a href="/add.php"> Добавить товар </a>
<br>
<a href="/delete.php"> Удалить товар </a>
<br>

<div>
    <p>Общее кол-во: <?php echo $_SESSION['cart']['count'] ?></p>
    <p>Сумма: <?php echo $_SESSION['cart']['sum'] ?> </p>
</div>
<table border="1" cellspacing="0">
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Кол-во</th>
        <th>Действие</th>
    </tr>

    <?php foreach ($_SESSION['cart']['items'] as $key => $item) {
        ?>

        <tr>
            <td><?php echo  $item['id'] ?></td>
            <td style="width: 550px">
                <?php echo  $item['name'] ?>
            </td>

            <td>
                <form  method="post" action="/list.php">

                    <input type="number" name="count" value="<?php echo $item['quantity'] ?>">

                    <input hidden name="id" value="<?php echo $key ?>">
                    <button type="submit" name="action" value="change_qty">Изменить</button>


                </form>
            </td>

            <td>
                <form  method="post" action="/list.php">
                    <input hidden name="id" value="<?php echo $key ?>">
                    <button type="submit" name="action" value="delete">Удалить</button>
                </form>
            </td>

        </tr>
  // <?php $n++; } ?>

</table>