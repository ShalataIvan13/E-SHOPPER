<?php 

class CabinetController 
{

    public function actionIndex() 
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $userName = explode(' ', $user['name']);

        require_once(ROOT.'/views/cabinet/cabinet.php');

        return true;
    }

    public function actionEdit() 
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 3-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 6-ти символов';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }

        }

        require_once(ROOT.'/views/cabinet/edit.php');

        return true;
    }

    public function actionHistory() {

        $id = User::checkLogged();

        

        require_once(ROOT . '/views/cabinet/history.php');

        return true;
    }
    
}