<?php 

class CartController 
{
    public function actionIndex() 
    {

        $categories = [];
        $categories = Category::getCategorieList();

        $productsInCart = false;

        $productsInCart = Cart::getProduct();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT.'/views/cart/cart.php');

        return true;
    }

    public function actionAdd($id) 
    {

        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("location: $referer");

        // require_once(ROOT.'/views/cart/cart.php');

        return true;
    }

    public function actionAddAjax($id) 
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionCheckout() 
    {
        // Если форма заполнина правильно тогда

        $categories = [];
        $categories = Category::getCategorieList();

        $result = false;

        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный номер';
            }

            if ($errors == false) {
                $productsInCart = Cart::getProduct();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    $adminEmail = 'admin@mail.com';
                    $message = 'http://localhost/admin/orders';
                    $subject = 'Новый заказ';
                    // mail($adminEmail, $message, $subject);

                    Cart::clear();
                }
            } else {
             // Если форма заполнина неправильно тогда делаем следующее
                $productsInCart = Cart::getProduct();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItem();

            }

        } else {

            $productsInCart = Cart::getProduct();
            
            if ($productsInCart == false) {
                header("localhost: /");
            } else {

                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItem();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (User::isGuest()) {

                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    $userName = $user['name'];
                }

            }

        }

        require_once(ROOT.'/views/cart/checkout.php');

        return true;
    }

    public function actionDelete($id) 
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

}