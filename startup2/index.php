<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php'); 
require_once('view/RegisterView.php');
require_once('view/ReminderView.php');
require_once('model/LoginModel.php');
require_once("model/RegisterModel.php");
require_once("controller/LoginController.php");
require_once("controller/RegisterController.php");

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new \view\LoginView();
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();
$rv = new \view\RegisterView();
$rView = new \view\ReminderView();
$lc = new \controller\LoginController($v);
$rc = new \controller\RegisterController($rv);
$rm = new \model\RegisterModel();

session_start();


$loginModel = $lc->userWantsToLogin();
$registerModel = $rc->userWantsToRegister();
$reminderView = $rView->reminder();

if(isset($_SESSION['username'])){
    if(isset($_GET['register'])){
         $lv->render($loginModel, $v, $dtv, $reminderView);
    }else {
         $lv->render($loginModel, $v, $dtv, $reminderView);
    }
}else { 
      if(isset($_GET['register'])){
         $lv->render($registerModel, $rv, $dtv, $reminderView);
    }else {
         $lv->render($loginModel, $v, $dtv, $reminderView);
    }   
}


