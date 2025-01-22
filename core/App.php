<?php

use Illuminate\Database\Capsule\Manager as Capsule;

use Twig\Loader\FilesystemLoader as TwigLoader;
use Twig\Environment as TwigEnvironment;

class App
{
  protected static $routes = [];

  public static function registerRoute($url, $controller, $method) {
    $method = strtoupper($method);
    self::$routes[] = compact("url", "controller", "method");
  }

  public static function initDatabase(string $sqlite_dbname) {
    $capsule = new Capsule;
    $capsule->addConnection([
      'driver' => 'sqlite',
      'database' => $sqlite_dbname,
      'collation' => 'utf8_unicode_ci',
      'prefix' => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    spl_autoload_register(function ($class) {
      $path = '../models/'. $class .'.php';
      if(file_exists($path)) {
        require $path;
      }
    });
  }

  public static function view(
    string $view, array|null $args = []
  ) {
    $views = new TwigEnvironment(new TwigLoader('../views'));
    echo $views->display($view, $args);
  }

  public static function start($url, $method) {
    foreach(self::$routes as $route) {
      if($route["url"] === $url && $route["method"] === $method) {
        require '../controllers/'.$route["controller"].'.php';
      } else {
        http_response_code(404);
        echo 'Not Found.';
      }
      die();
    }
  }
}

