<?php

require 'vendor/autoload.php';

$user = [
  'name' => 'JOs',
  'topics' => [
    ['title' => 'hi!'],
    ['title' => 'bye!'],
  ],
  'country' => [
    'name' => 'NL',
    'flag' => [
      'url' => 'path_file.png',
      'size' => 30,
    ]

  ]
  ];

  //! from the array $user get the value of and if not default is null
  echo array_get($user , 'topics.0.title', "null") . PHP_EOL; // hi!
 echo "<hr>";

  $users = [
    ['name' => 'Someone','score' => 11],
['name' => 'Seone','score' => 21],
['name' => 'eone','score' => 3],
['name' => 'Sone','score' => 331],
['name' => 'ne','score' => 200],
  ];

$firstUser = array_first($users);

var_dump("<pre>",$firstUser,"</pre>");
echo "<br><hr>";

$userWithScore = array_first($users , function ($user, $key) {
  return array_get($user,'score') > 11 ;
});

var_dump("<pre>",$userWithScore,"</pre>");

echo "<br><hr>";

$usr = array_last($users , function ($user , $key) {
  return array_get($user,'score') < 11 ;

});

var_dump("<pre>",$usr,"</pre>");
echo "<br><hr>";

var_dump(array_has($user, ['topics.1.title','country.flag'])) ; // false

// array_has($user, ['name','country.name']) // returns true if both conditions (name) are met

echo "<br><hr>";

$ussr = array_where($users , function($user , $key) {
  return array_get($user , 'score') >= 200;
});

var_dump("<pre>",$ussr,"</pre>");

echo "<br><hr>";

$userOnly = array_only($user, ['name','topics']);

var_dump("<pre>",$userOnly,"</pre>");

echo "<br><hr>";

//? variables by reference (&)

//? $userDuplicate = &$user; // duplicates array through passing in by reference
//? 
//? unset($userDuplicate['name']); //! unsets the name the orignal
//? 
//? var_dump($user);
//? echo "<br><hr>";
//? var_dump($userDuplicate);
//! ------------------------

//? array_shift 'removes' the first element of an array and returns it

//? $name = array_shift($user) $name will contain 'name' element and will be removed from $user


array_forget($user, ['name','topics.0','country.flag.url']);

var_dump("<pre>",$user,"</pre>");
