<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [
        'sum' => 0,
        'discount' => 0,
        'count' => 0,
        'items' => []
    ];
}

$products = [
    2=>['name'=>'товар 1', 'price'=>233],
    7=>['name'=>'товар 2', 'price'=>333],
    43=>['name'=>'товар 3', 'price'=>332],
];

/**1. добавление товара в корзину (т.е. добавление в массив в ключ items)
 */

function addItem( $product)
{
    $_SESSION['cart']['items'][$product['id']] = $product;

    $_SESSION['cart']['sum'] = sumItems();

    $_SESSION['cart']['count'] = getCount();
}
if(isset($_POST['action']) && $_POST['action'] === 'add'){
    $product = $products[$_POST['product']];
    $product['id'] = $_POST['product'];
    $product['quantity'] = $_POST['count'];
    addItem($product);
}
if(isset($_POST['action']) && $_POST['action'] === 'delete'){
    deleteItem($_POST['id']);
}
function sumItems()
{
    $sum = 0;
    foreach ($_SESSION['cart']['items'] as $item) {
        $sum += $item['quantity'] * $item['price'];
    }
    return $sum;
}
function getCount()
{
    $count = 0;
    foreach ($_SESSION['cart']['items'] as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

/**2. удаление товара из корзины
 */

function deleteItem( int $id)
{
   //$id =$_GET['id'];
   $product = $products['id'];
   $price = $product['price'];
   $count = $_SESSION['cart']['items'][$id];
    if(isset($_SESSION['cart']['items'][$id])){
        unset($_SESSION['cart']['items'][$id]);
    }
$count = $_SESSION['cart']['items'][$id]['count'];
    $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - (int)$count*(int)($price);
    $_SESSION['cart']['count'] = getCount();
}

/** 3. изменение количества товара лежащего в корзине.
 */

function changeQty($cart, $id, $qty)
{
    foreach ($cart['items'] as $key=>$item){

        if ($item['id'] === $id){
            $cart['items'][$key]['quantity'] = $qty;
        }
    }

    $cart['sum'] =  sumItems ();

    $cart['count'] =  getCount ($cart);

    return $cart;
}
/**  4. пересчет корзины с учетом скидки(береме любую одну из предыдущей задачи на выбор)
*/

function calculate($cart)
{
    $sum = sumItems($cart);
    $count = getCount($cart);

    if($sum > 2000 && $count > 10){
        $cart['discount'] = 7;
    }

    if($count > 10){
        $cart['discount'] = 10;
    }

    if($cart['discount'] > 0){
        $cart['sum'] =  $sum * $cart['discount'] / 100;
    }

    return $cart['sum'];}