<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:28
 */

class Route
{
    public static function start(PDO $pdo)
    {
        $route = 1;
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = preg_split('/[\/?]+/', $_SERVER['REQUEST_URI']);


        // получаем имя контроллера
        if (!empty($routes[$route])) {
            $controller_name = $routes[$route];
        }

        // получаем имя экшена
        if (!empty($routes[$route + 1])) {
            $action_name = $routes[$route + 1];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if (file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/".$controller_file;

        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name($pdo);
        $action = $action_name;

        if (get_class($controller) == 'Controller_Article') {
            $id = preg_replace('/[^0-9]/', '', $action);
            $controller->getArticle($id);
        } elseif (get_class($controller) == 'Controller_Main') {
            $page = preg_replace('/[^0-9]/', '', $action);
            if (!$page) {
                $page = 1;
            }
            $controller->page($page);
        } elseif (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } //страница статьи
        //редирект на php файл который обработает ajax запрос
        //поставили лайк
        elseif ($_POST['article_id'] && $_POST['like']) {
            require_once('like-ajax.php');
        } //комментарий
        elseif ($_POST['article_id'] && $_POST['comment']) {
            require_once('comment-ajax.php');
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/404');
//        $model         = new Model($pdo);
//        $data['flash'] = $model->checkFlash();
    }
}
