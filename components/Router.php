<?php

class Router  
{ 
    private $routes;

    public function __construct() 
    {
        $routesPath = 'config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        // Returns request string
        if (!empty($_SERVER['REQUEST_URI'])) {
            return substr($_SERVER['REQUEST_URI'], 1);
            // return $_SERVER['REQUEST_URI'];
        }
    }
    
    public function run()
    {
        // Получить строку запроса 
        $uri = $this->getURI();
        // echo $uri;
        // $uriSegments = explode("/", $uri);
 
        // Проверить наличее такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            
            // Сравнение $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу
                $internalRout = preg_replace("~$uriPattern~", $path, $uri);

                // Определить controller, action, параметры
                $segments = explode("/", $internalRout);
                
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFiles = 'controllers/'.$controllerName.'.php';
                if (file_exists($controllerFiles)) {
                    include ($controllerFiles);
                }

                // Создать обект, вызвать метод ( т.е. action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array( [$controllerObject, $actionName], $parameters );

                if ($result != null) {
                    break;
                }

            }
            
        }
        
        
    }  
    
}
