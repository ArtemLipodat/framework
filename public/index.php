<?php

use Application\Core\DatabaseExp;
use Application\Router;

require_once('../vendor/autoload.php');
require_once('../app/Router.php');
require_once ('../app/define.php');

$path = $_SERVER['REQUEST_URI'];

try {
    $handler = Router::getHandler($path);
    $handler->run()->display();
} catch (DatabaseExp $databaseExp) {
    $errors = [];
    $errors['code'] = $databaseExp->getCode();
    $errors['file'] = $databaseExp->getFile();
    $errors['line'] = $databaseExp->getLine();
    $trace = [];
    foreach($databaseExp->getTrace() as $key => $elem) {
        $trac[] = array_slice($databaseExp->getTrace()[$key], 0,2);
        foreach ($trac as $key => $value) {
            $trace[] = $value['file'] . ':' . $value['line'] . PHP_EOL;
        }
    }
    $errors['trace'] = $trace;
    $errors['date'] = \date("Y-m-d");
    $errors['sql'] = $databaseExp->getSql();
    file_put_contents(__DIR__.'/logs.txt', json_encode($errors) . PHP_EOL, FILE_APPEND);

}