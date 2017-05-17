<?php

class cx {
  static private $defs = [];

  static private function merge (...$styles) {
    $def = [];

    foreach ($styles as $styledef) {
      foreach ($styledef as $prop => $value) {
        $def[$prop] = $value;
      }
    }

    return $def;
  }

  static public function create (...$styles) {
    $styles = self::merge(...$styles);

    $def = '';

    foreach ($styles as $prop => $value) {
      $key = $prop . $value;
      $key = $prop . '_' . hash('crc32', $key);

      $prop = strtolower(
        preg_replace('/([A-Z])/', '-$1', $prop)
      );

      self::$defs[$key] = ".{$key} { {$prop}: {$value} }";

      $def .= $key . ' ';
    }

    return $def;
  }

  static public function getCss () {
    $css = '';

    foreach (self::$defs as $key => $def) {
      $css .= $def . ' ';
    }

    return $css;
  }
}
