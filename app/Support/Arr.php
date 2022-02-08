<?php

namespace App\Support;

use ArrayAccess;

class Arr
{

  public static function accessible($value)
  {
    // can we iterarte the given array?
    return is_array($value) || $value instanceof ArrayAccess;
  }

  public static function exists($array, $key)
  {
    if ($array instanceof ArrayAccess) {
      return $array->offsetExists($key);
    }

    return array_key_exists($key, $array);
  }

  public static function get($array, $key, $default)
  {

    if (!static::accessible($array)) {
      return $default;
    }

    // is key null?
    if (is_null($key)) {
      return $array;
    }

    // if 1st level arr exits return
    if (static::exists($array, $key)) {
      return $array[$key];
    }
    // iterate down and find the value

    foreach (explode('.', $key) as $segment) {
      if (static::accessible($array) && static::exists($array, $segment)) {

        //! vardump for seeing the drill down to result
        var_dump("<pre>",$array,"</pre>");

        $array = $array[$segment];
      } else {
        return $default;
      }
    }

    return $array;
  }


  public static function first($array, $callback = null , $default = null) {
    
    // first record if callback is null

    if (is_null($callback)) {
      if (empty($array)) {
        return $default;
      }
      // using foreach in case keys are not numbers
      foreach ($array as $item) {
        return $item;
      }
    }
    // iterate over array when callback is defined
    foreach($array as $key => $value) {
      if (call_user_func($callback, $value , $key)) {
        return $value;
      }
    }



    return $default;
  }

  public static function last($array, $callback = null , $default = null) {
    
    

    if (is_null($callback)) {
      if (empty($array)) {
        return $default;
      }

    return end($array);
  }

  // reverse the array and call ::first 
  // using array_reverse with preserve keys to true

  return static::first(array_reverse($array, true), $callback, $default);

  }

  public static function has($array, $key) {

    if (is_null($key)) {
      return false;
    }

    $keys = (array) $key;

    if ($keys === []) {
      return false;
    }

  foreach ($keys as $key) {
    $subKeyArray = $array;

    if(static::exists($array,$key)) {
      continue;
    }

    foreach (explode('.', $key) as $segment) {
      if (static::accessible($subKeyArray) && static::exists($subKeyArray, $segment)) {

        $subKeyArray = $subKeyArray[$segment];
      } else {
        return false;
      }
    }
  }
  
    return true;
  }

  public static function where($array,$callback) {

    return array_filter($array , $callback , ARRAY_FILTER_USE_BOTH); // use both key and value


  }

  public static function only($array , $key) {
    return array_intersect_key($array , array_flip((array) $key));
  }

  public static function forget(&$array , $keys ) {
    
    $original = &$array;
    $keys = (array)$keys;


    foreach($keys as $key) {
      if (static::exists($array,$key)){
        unset($array[$key]);
        continue;
      }

      $parts = explode('.', $key);

      $array = &$original;

      while (count($parts) > 1) {
        $part = array_shift($parts);

        if (static::accessible($array) && static::exists($array, $part)) {

          $array = &$array[$part]; //! passed in by reference!
        } else {
          continue 2; //! break out 2 levels
        }
      }

      //? unset($array[$parts[0]]);
      unset($array[array_shift($parts)]);



    }
  }
}
