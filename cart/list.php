<?php
session_start();

include('cart_1.php');

if (isset($_POST['action']) && $_POST['action'] === 'changeQty') {
    changeQty($_POST['id'], $_POST['count']);

    if (isset($_POST['action']) && $_POST['action'] === 'calculate') {
        calculate($_POST['cart']);
        var_dump('<pre>', $_POST['cart']);
    }
}
?>
<h1>Корзина</h1>
<hr>
<a href="/cart/add.php"> Добавить товар </a>
<br>
<a href="/cart/delete.php"> Удалить товар </a>
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
                <form  method="post" action="/cart/list.php">
                    <input type="number" name="count" min="0"  value="<?php echo $item['quantity'] ?>">

                    <input hidden name="id" value="<?php echo $key ?>">

                    <button type="submit" name="action" value="changeQty">Изменить</button>

                </form>

            </td>
            <td>
                <form  method="post" action="/cart/delete.php">
                    <input hidden name="id" value="<?php echo $key ?>">
                    <button type="submit" name="action" value="delete"><a href="/cart/delete.php"> Удалить  </a></button>
                </form>
            </td>

        </tr>
   <?php $n++; } ?>
<?php   var_dump('<pre>',  $sale_2 )?>
</table>