<?php
namespace Application\Core;

use co0lc0der\QueryBuilder\Connection;
use co0lc0der\QueryBuilder\QueryBuilder;

class DataBase extends QueryBuilder{

    private static $instanse = null;

    public static function getInstance(): ?DataBase {
        if (!self::$instanse) {
            self::$instanse = new self(Connection::make(DBCONFIG));
        }
        return self::$instanse;
    }



}
