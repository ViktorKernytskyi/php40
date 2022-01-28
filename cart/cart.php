<?php
/** Делаем массив для корзины магазина вида:
*sum=>700
*items=>{
*['id'=>34,'quantity'=>2,'price'=>200],
*['id'=>2,'quantity'=>5,'price'=>100]
*}
*id - айди товара
*quantity - колво товара этого вида в корзине
*price - цена на еденицу товара
*Заполняем случайными товарами.
*Для этого массива делаем несколкьо задач для пересчета суммы, с учетом скидочной системы:
*1. Если общее  кол-во товаров больше 10 то даем скидку 10%
*2. Если сумма больше 2000 даем скидку 7%
 */
/**  */
/** По функциям:

*Пишем функции для корзины:

*1. добавление товара в корзину (т.е. добавление в массив в ключ items)

*2. удаление товара из корзины

*3. изменение количества товара лежащего в корзине.

*4. пересчет корзины с учетом скидки(берем любую одну из предыдущей задачи на выбор)

*На выходе у вас должен получиться файл cart.php из 4 функций
 *
 */
$cart = [
    'sum' => 0,
    'discount' => 0,
    'count' => 0,
    'items' => [
        ['id'=>34,'quantity'=>2,'price'=>200],
        ['id'=>2,'quantity'=>5,'price'=>100],
    ],
];

foreach ($cart['items'] as $key => $product){
    $cart['sum'] += $product['quantity'] * $product['price'];
    $cart['count'] += $product['quantity'];
}


if($cart['sum'] > 2000 && $cart['count'] > 10){
    $cart['discount'] = 7;
}

if($cart['count'] > 10){
    $cart['discount'] = 10;
}

if($cart['discount'] > 0){
    $cart['sum'] =  $cart['sum'] * $cart['discount'] / 100;
}

/** Пишем функции для корзины: */
/** 1. добавление товара в корзину (т.е. добавление в массив в ключ items)
 */
function addItem ($product){
    $cart = [
        'sum' => 0,
        'discount' => 0,
        'count' => 0,
        'items' => [
            ['id'=>34,'quantity'=>2,'price'=>200],
            ['id'=>2,'quantity'=>5,'price'=>100],
        ],
    ];;
    foreach ($cart['items'] as $key => $product){
        $cart['sum'] += $product['quantity'] * $product['price'];
        $cart['count'] += $product['quantity'];
    }
}
/** 2. удаление товара из корзины
 */
function deleteItem ($id){

}
/** 3. изменение количества товара лежащего в корзине.
 */
function changeQuantity ($cart, $id, $quantity){

}
/** 4. пересчет корзины с учетом скидки(берем любую одну из предыдущей задачи на выбор)
 */
function calculate ($cart){

}