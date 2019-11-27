<?php

namespace App;

use Core\User\Session;
use Core\Database\Connection;
use Core\Database\Schema;
use Core\Router;
use Core\User\Repository;


class App
{

    /** @var \Core\Session * */
    public static $session;
    public static $connection;
    public static $schema;
    public static $router;
    public static $user_repository;
    public static $comment_repository;

    public function __construct()
    {

        self::$connection = new \Core\Database\Conection(DNS);
        self::$schema = new Schema(MYDB);
        self::$user_repository = new Repository();
        self::$session = new Session(self::$user_repository);
        self::$router = new Router();
        self::$comment_repository = new \App\Comment\Repository();

    }

    public static function run()
    {
        print $controller = self::$router->getRouteController($_SERVER['REQUEST_URI']);

    }


    public function __destruct()
    {

    }

}
