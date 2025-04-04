<?php

class File
{
  public static function createFile(string $filename) {
    $fp = fopen($filename, "wb");
    fwrite($fp,'');
    fclose($fp);
  }

  public static function createFolder(string $foldername) {
    mkdir($foldername);
  }

  public static function removeFile(string $filename) {
    unlink($filename);
  }

  public static function removeFolder(string $foldername) {
    rmdir($foldername);
  }

  public static function isExists(string $filename) {
    return file_exists($filename);
  }

  public static function isEmpty(string $filename) {
    return file_get_contents($filename) == "";
  }

  public static function recreate(string $filename) {
    if (static::isExists($filename)) {
      static::removeFile($filename);
    }
    static::createFile($filename);
  }

  public static function createIfNotExists(string $filename) {
    if (! static::isExists($filename)) {
      static::createFile($filename);
    }
  }
}
