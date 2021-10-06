<?php

class Category 
{

    public static function getCategorieList() 
    {

        $db = Db::getConnection(); 
        $categoryList = [];

        $query = "SELECT id, name FROM category ORDER BY sort_order ASC";
        $result = $db->query($query);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;

    }

    public static function getCategoriesListAdmin() 
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM category ORDER BY sort_order ASC");
        $categoryList = [];

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoryList;
    }

    public static function getStatusText($status) 
    {

        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }

    }

    public static function deleteCategoriesById($id) 
    {

        $db = Db::getConnection();

        $sql = "DELETE FROM category WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    public static function createCategory($options) 
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateCategoryById($id, $name, $sortOrder, $status) 
    {

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql); 
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        return $result->execute();

    }

    public static function getCategoryById($id) 
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();  
    }

}