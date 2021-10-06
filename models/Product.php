<?php

class Product 
{

    const SHOW_BY_DEFOULT = 6;

    public static function getLastProducts($count = self::SHOW_BY_DEFOULT) 
    {

        $count = intval($count);

        // $db = new mysqli("localhost", "root", "", "super_mag");
        $db = Db::getConnection();
        $productsList = [];

        $result = $db->query("SELECT * FROM product WHERE status = 1 ORDER BY id ASC LIMIT $count"); 

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProducts() 
    {
        $db = Db::getConnection();
        $productsList = [];

        $result = $db->query("SELECT * FROM product ORDER BY id ASC"); 

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['category_id'] = $row['category_id'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['brand'] = $row['brand'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['is_recommended'] = $row['is_recommended'];
            $productsList[$i]['status'] = $row['status'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsLastByCategory($categoryId = false, $page = 1) 
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFOULT;

            $db = Db::getConnection();
            $products = [];
            $result = $db->query("SELECT * FROM product WHERE status = 1 AND category_id = $categoryId 
                        ORDER BY id ASC LIMIT ". self::SHOW_BY_DEFOULT ." OFFSET $offset");

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $products;
        }
    }

    public static function getProductById($id) 
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM product WHERE id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getTotalProductsListByCategory($categoryId) 
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = 1 AND category_id= $categoryId");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductsByIds($idsArray) 
    {
        $products = [];

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status = 1 AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getRecommendedProducts() 
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query("SELECT * FROM product WHERE status = 1 AND is_recommended = 1 ORDER BY id DESC");
        $i = 0;
        $productsList = [];
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function deleteProductsById($id) 
    {
        $db = Db::getConnection();

        $sql = "DELETE FROM product WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options) 
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO product (name, category_id, code, price, brand, 
                    image, description, is_new, is_recommended, status)
                    VALUES (:name, :category_id, :code, :price, :brand, 
                    :image, :description, :is_new, :is_recommended, :status)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }

        return 0;
    }

    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
                WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

}