<?php

class CatalogController 
{

    public function actionIndex() 
    {
        $categories = Category::getCategorieList();

        $lastProduct = Product::getLastProducts(6);

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1) 
    {

        $categories = Category::getCategorieList();

        $categoryProducts = Product::getProductsLastByCategory($categoryId, $page); 

        $total = Product::getTotalProductsListByCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFOULT, 'page-');

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }



}
