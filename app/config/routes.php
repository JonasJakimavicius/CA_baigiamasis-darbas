<?php


use Core\Router;

Router::addRoute('/index', 'App\Controller\HomeController');
Router::addRoute('/Index', 'App\Controller\HomeController');
Router::addRoute('/', 'App\Controller\HomeController');

Router::addRoute('/feedback', 'App\controller\FeedbackController');
Router::addRoute('/logout', 'App\controller\LogoutController');
Router::addRoute('/register', 'App\controller\RegisterController');


if (\App\App::$session->isLoggedIn()) {
    Router::addRoute('/login', 'App\controller\HomeController');
} else {
    Router::addRoute('/login', 'App\controller\LoginController');

}

