<?php

class SiteController
{

    public function actionIndex()
    {
        $categories = Category::getCategorieList();

        $lastProduct = Product::getLastProducts(6);

        $sliderProducts = Product::getRecommendedProducts();

        require_once ROOT . "/views/site/index.php";

        return true;

    }

    public function actionContact()  
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправельный email';
            }
            
            if ($errors == false) {
                $adminEmail = '';
                $message = '';
                $subject = '';
                // $result = mail($adminEmail, $message, $subject);
                $result = true;
            }

        }
            
        require_once(ROOT.'/views/contacts/contact.php');

        return true;
        // die;
    }

}
