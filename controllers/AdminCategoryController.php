<?php 

class AdminCategoryController extends AdminBase 
{

    public function actionIndex() 
    {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        require_once(ROOT . '/views/admin_category/index.php');

        return true;
    }



    public function actionDelete($id) 
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Category::deleteCategoriesById($id);

            header("location: /admin/category");
        }

        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }

    public function actionCreate() 
    {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля!';
            }

            if ($errors == false) {

                $id = Category::createCategory($options);

                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                    }
                };

                header("location: /admin/category");
            }

        }

        require_once(ROOT . '/views/admin_category/create.php');
        return true;

    }

    public function actionUpdate($id) 
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }
}