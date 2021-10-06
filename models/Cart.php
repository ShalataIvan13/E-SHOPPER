<?php 

class Cart 
{

    public static function addProduct($id) 
    {
        $id = intval($id);

        $productInCart = [];

        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id] ++;
        } else {
            $productInCart[$id] = 1;
        }

        $_SESSION['products'] = $productInCart;

        return self::countItem();
    }

    public static function countItem() 
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProduct() 
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
    }

    public static function getTotalPrice($products) 
    {
        $productsInCart = self::getProduct();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear() 
    {
        if ($_SESSION['products']) {
            unset($_SESSION['products']);
        }
    }

    public static function deleteProduct($id) 
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProduct();

        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

}