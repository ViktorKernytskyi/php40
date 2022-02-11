<?php
session_start();

$products = [
    2 => ['name' => 'товар 1', 'price' => 10],
    7 => ['name' => 'товар 2', 'price' => 333],
    43 => ['name' => 'товар 3', 'price' => 332],
];
class Cart
{
    private $items; // идентификатор товара
    private $count; // кол-во товара для добавления в корзину
    private $sum; // сумма за товар с учетом его кол-ва

    private $discount = 0; // скидка
    private $sale_10 = 10;
    private $sale_7 = 7;

    public function __construct()
    {
        $this->items = $_SESSION['product'];

        $this->discount = $_SESSION['discount'];

        $this->count = $_SESSION['qty'];
        $this->sum = $_SESSION['cart']['sum'];
    }

    public function __destruct()
    {
        $_SESSION['product'] = $this->items;
        $_SESSION['sum'] = $this->sum;
        $_SESSION['qty'] = $this->count;
        $_SESSION['discount'] = $this->discount;
    }

    /**
     * 1. добавление товара в корзину (т.е. добавление в массив в ключ items)
     */
    public function addItem($product)
    {
        if (isset($this->$_SESSION['cart']['items'][$product['id']])) {

            $_SESSION['cart']['items'][$product['id']]['quantity']->Sqty += $product['quantity']->Sqty;

        } else {
            $this->$_SESSION['cart']['items'][$product['id']] = $product;
        }
        $this->calculate();
    }

    /**
     * 2. удаление товара из корзины
     */
    public function deleteItem(int $id)
    {
        if (isset($_SESSION['cart']['items'][$id])) {
            unset($_SESSION['cart']['items'][$id]);
        }
        $this->calculate();
    }

    /**
     * 3. изменение количества товара лежащего в корзине.
     * пересчет корзины с учетом скидки(берем любую одну из предыдущей задачи на выбор)
     */
    public function changeQty($id, $count)
    {
        $_SESSION['cart']['items'][$id]['quantity'] = $count;

        $this->calculate();
    }

    public function calculate()
    {
        $sum = 0;
        $count = 0;
        // считает сумму и количество
        foreach ($_SESSION['cart']['items'] as $item) {
           // var_dump('<pre>',$_SESSION['cart']['items']);
            $sum += $item['quantity'] * $item['price'];

            $count += $item['quantity'];
        }
        $this->sum = $sum;
        $this->count = $count;

        if ($this->count < 10 && $this->sum > 2000) {
            $this->discount = $this->sale_10;
        } else if ($this->sum > 2000) {
            $this->discount = $this->sale_7;
        }
        $this->sum = $this->sum - $this->sum * $this->discount / 100;

        $_SESSION['cart']['discount'] = $this->discount;
        $_SESSION['cart']['count'] = $this->count;
        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - $_SESSION['cart']['sum'] * $this->discount / 100;
    }
}
