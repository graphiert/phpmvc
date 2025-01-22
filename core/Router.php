<?php

class Route
{
  public static function get($url, $controller) {
    App::registerRoute($url, $controller, "GET");
  }

  public static function post($url, $controller) {
    App::registerRoute($url, $controller, "POST");
  }

  public static function patch($url, $controller) {
    App::registerRoute($url, $controller, "PATCH");
  }

  public static function put($url, $controller) {
    App::registerRoute($url, $controller, "PUT");
  }

  public static function delete($url, $controller) {
    App::registerRoute($url, $controller, "DELETE");
  }
}
