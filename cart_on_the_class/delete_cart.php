<?php

session_start();

require('cart.php');
//if(isset($_POST['action']) && $_POST['action'] === 'delete'){
//    deleteItem($_POST['product']);
//}
?>
    <a href="/cart_on_the_class/list.php">Список </a>
    <form method="post" action="/cart_on_the_class/delete_cart.php">
        <select name="product">

            <?php
            foreach ($products as $id => $product){
                echo '<option value="' . $id .'">' . $product['name'] . '</option>';
            }
          //  $cart = new Cart();

            //$cart->deleteItem(int $id);
            ?>

        </select>
        <input type="number" name="count" min="0" value="0">
        <input hidden name="action" value="delete">
        <button type="submit" >Удалить</button>
    </form>
    <table border="1" cellspacing="0">

    </table>
<?php
