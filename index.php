<?php
// error_reporting(0);
// config files
require_once("./config/cons.php");
require_once("./config/db.php");

// libs
require_once("./libs/Controller.php");
require_once("./libs/DB.php");
require_once("./libs/Model.php");
require_once("./libs/Session.php");
require_once("./libs/simple_html_dom.php");
require_once("./libs/View.php");
require_once("./libs/Route.php");


/* 
   set GET to pass parameters to method getUser
   we must go to http://url.com/index/users/2
   we get user id 2
   for more than one parameter we should type
   http://url.com/index/users/2|3|4|5
   then we will explode it in getUser by this :
   explode('|',$parameter);
   ------------------------------
   $r->addRoute("/index/users/GET","index@getUser");
*/

// Routes 
/*
 * Example :
 * $r->addRoute('/path','controllerName@methodIntoIt');
*/

// index controller
$r->addRoute("/index","index@index");

$r->addRoute(ADMIN_R ,"admin@index");  // done
$r->addRoute(ADMIN_R . '/login' ,"admin@login");  // done
$r->addRoute(ADMIN_R . '/new-chan' ,"admin@newChan");  // done
$r->addRoute(ADMIN_R . '/new-commentor' ,"admin@newComm");  // done
$r->addRoute(ADMIN_R . '/new-nft' ,"admin@newNFT");  // done
$r->addRoute(ADMIN_R . '/new-club' ,"admin@newClub");  // done
$r->addRoute(ADMIN_R . '/new-champ' ,"admin@newChamp");
$r->addRoute(ADMIN_R . '/new-match' ,"admin@newMatch");
$r->addRoute(ADMIN_R . '/new-url' ,"admin@newMatch");
$r->addRoute(ADMIN_R . '/new-players' ,"admin@newMatch");
$r->addRoute(ADMIN_R . '/logout' ,"admin@logout");

if(isset($_GET['route'])){
    $route = "/" . rtrim($_GET['route'],"/");
    $r->getRoute($route);
}else{
    Controller::redirect(URL . "/index");
}

?>
