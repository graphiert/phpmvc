<?php

use Illuminate\Database\Capsule\Manager as Capsule;

use Twig\Loader\FilesystemLoader as TwigLoader;
use Twig\Environment as TwigEnvironment;

use Symfony\Component\HttpFoundation\Request;

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
      $path = '../app/models/'. $class .'.php';
      if(file_exists($path)) {
        require $path;
      }
    });
  }

  public static function view(
    string $view, array|null $args = []
  ) {
    $views = new TwigEnvironment(new TwigLoader('../app/views'));
    echo $views->display($view, $args);
  }

  public static function start($url, $method) {
    $to = array_find(
      self::$routes,
      function (array $value) use ($url, $method) {
        return $value["url"] == $url && $value["method"] == $method;
      }
    );
    $superglobals = Request::createFromGlobals();

    try {
      if($to) {
        require '../app/controllers/'.$to["controller"].'.php';
      } else {
        require '../app/controllers/notfound.php';
      }
    } catch(\Illuminate\Database\QueryException $ex) {
      require '../app/controllers/dbfail.php';
    }
    die();
  }
}

