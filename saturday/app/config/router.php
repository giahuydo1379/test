<?php

$router = $di->getRouter();

// Define your routes here
//$router->add(
//        '/abc/ed', [
//    'controller' => 'hello',
//    'action' => 'test',
//        ]
//);
//$router->
// add('/abc/edf/([0-9]{2})/:params',
// [
//   'controller' => 'hello',
//   'action' => 'test',
//   'param1' => 1,
//   'param2' => 2,
// ]
//);
$router->
 add('/abc/edf/{id}/{params}',
 [
   'controller' => 'hello',
   'action' => 'test',
    
 ]
);
$router->handle();

