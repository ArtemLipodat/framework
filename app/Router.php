<?php
namespace Application;


use Application\Controllers\IndexController;
use Application\Controllers\UserAddController;
use Application\Interfaces\Action;

class Router {

    static function getHandler(string $path): Action {
        $data = array_merge($_GET, $_POST);
        switch ($path) {
            case '/':
                return (new IndexController());
                break;
            case '/add/':
                return (new UserAddController($data));
                break;
            default:
                die('Ошибка');
        }
    }
}