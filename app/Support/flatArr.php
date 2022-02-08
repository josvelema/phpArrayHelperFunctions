<?php

$arr = [
  'name' => [
    'your name is required',
    'can not contain numbers'

  ],
  'dob' => [
    'your date of birth is required'
  ],
  'password' => [
    'pw is required to have 6 or more characters',
    'pw is not strong'
  ],
  'not an array'
];

function flatten_array(array $items ,array $flattend = [])
{
  foreach ($items as $item) {

    if (is_array($item)) {
      $flattend  = flatten_array($item , $flattend);
      continue;
    }

    $flattend[] = $item;

  }
  return $flattend;
}


$flat = flatten_array($arr);

var_dump("<pre>",$flat,"</pre>");
