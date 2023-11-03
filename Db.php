<?php

namespace kronion;

use \RedBeanPHP\R as R;

class Db extends \RedBeanPHP\SimpleModel
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['pass']);
        if( !R::testConnection() ){
            throw new \Exception("Нет соединения с БД", 500);
        }
        R::freeze(true);                   // запрещаем RedBean автоматически изменять структуру таблиц БД
        if(DEBUG){
            R::debug(true, 1);
        }

        R::ext('xdispense', function($type){
            return R::getRedBean()->dispense( $type );
        });

    }


}