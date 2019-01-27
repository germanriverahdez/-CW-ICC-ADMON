<?php

$f3 = require('lib/fatfree/base.php');
//$db = require('c:/f3/fatfree-master/lib/db/sql/mapper.php');

$f3->config('config.ini');
$f3->config('routes.ini');

new Session();

//$f3->route('GET /', 'Main->render');
//$f3->route('GET /hola', 'Main->sayhello');
//$f3->route('GET /about', 'AboutPage->render');

/*
$db=new DB\SQL(
    'mysql:host=localhost;port=3306;dbname=perros',
    'root',
    ''
);
*/
//$f3->set('message', 'Hola a todos, este es el contenido de una variable');

//$f3->route('GET /',
  
  //  function($f3) {
       // echo 'Hola, Mundo. Estre es mi segundo proyecto con f3!<br>';
    //    echo $f3->get('message');
   // }
//);

$f3->run();