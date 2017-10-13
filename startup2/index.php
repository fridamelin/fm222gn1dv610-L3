<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php'); 
require_once('view/RegisterView.php');
require_once('view/ReminderView.php');
require_once('model/LoginModel.php');
require_once("model/RegisterModel.php");
require_once("model/ReminderModel.php");
require_once("controller/LoginController.php");
require_once("controller/RegisterController.php");
require_once("controller/ToDoController.php");

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new \view\LoginView();
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();
$rv = new \view\RegisterView();
$rminderView = new \view\ReminderView();

$lc = new \controller\LoginController($v);
$rc = new \controller\RegisterController($rv);
$rminderController = new \controller\ToDoController($rminderView);

$rm = new \model\RegisterModel();
$rminderModel = new \model\ReminderModel();


session_start();



//Flytta härifrån 

$loginModel = $lc->userWantsToLogin();
$registerModel = $rc->userWantsToRegister();
$reminderModel = $rminderController->userWantsToAddTodo();
$reminderView = $rminderView->reminder();

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


