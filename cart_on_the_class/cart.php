<?php
session_start();
require_once('Product.php');

class Cart
{
    const SALE_OT_SUM_AND_COUNT = 10;
    const SALE_OT_COUNT = 7;

    public $items = []; // идентификатор товара
    public $count = 0; // кол-во товара  в корзине
    public $sum = 0; // кол-во товара  в корзине
    public $discount = 0; // скидка

    public function __construct()
    {
        $this->items = $_SESSION['cart']['items'] ?? [];

        $this->sum = $_SESSION['cart']['sum'];
        $this->count = $_SESSION['cart']['count'];
        $this->discount = $_SESSION['cart']['discount'];
    }
    public function __destruct()
    {
        $_SESSION['cart']['items'] = $this->items;
        $_SESSION['cart']['sum'] = $this->sum;
        $_SESSION['cart']['count'] = $this->count;
        $_SESSION['cart']['discount'] = $this->discount;
    }
    /**
     * 1. добавление товара в корзину (т.е. добавление в массив в ключ items)
     */
    public function addItem($id, $quantity)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $products = new Product();
            $products = $products->getProducts();
            $this->items[$id] = $products[$id];
            $this->items[$id]['quantity'] = $quantity;
        }
        $this->calculate();
    }
    /**
     * 2. удаление товара из корзины
     */
    public function deleteItem(int $id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        $this->calculate();
    }
    /**
     * 3. изменение количества товара лежащего в корзине.
     * пересчет корзины с учетом скидки(берем любую одну из предыдущей задачи на выбор)
     */
    public function changeQty($id, $count)
    {
        if (isset($this->items[$id]) && $_POST['count'] >= 1) {
            $this->items[$id]['quantity'] = $count;

            $this->calculate();
        }
    }
    public function calculate()
    {
        $sum = 0;
        $count = 0;
        $this->discount = 0;
        // считаем сумму и количество
        foreach ($this->items as $item) {
            $sum += $item['quantity'] * $item['price'];
            $count += $item['quantity'];
        }
        $this->sum = $sum;
        $this->count = $count;
        if ($this->count > 10) {
            $this->discount = self::SALE_OT_SUM_AND_COUNT;
        } elseif ( $this->sum > 2000) {
            $this->discount = self::SALE_OT_COUNT;
        }
                $this->sum = $this->sum - $this->sum * $this->discount / 100;
    }
}
