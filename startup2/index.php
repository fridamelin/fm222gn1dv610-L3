<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php'); 
require_once('view/RegisterView.php');
require_once('model/LoginModel.php');
require_once("model/RegisterModel.php");
require_once("controller/LoginController.php");

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new \view\LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$rv = new \view\RegisterView();
$lc = new \controller\LoginController($v, $rv);
$rm = new \model\RegisterModel();

session_start();

$loginModel = $lc->userWantsToLogin();
//$registerModel = $lc->userWantsToRegister();

if(isset($_SESSION['username'])){
    if(isset($_GET['register'])){
         $lv->render($loginModel, $v, $dtv);
    }else {
         $lv->render($loginModel, $v, $dtv);
    }
}else { 
      if(isset($_GET['register'])){
         $lv->render($loginModel, $rv, $dtv);
    }else {
         $lv->render($loginModel, $v, $dtv);
    }   
}


