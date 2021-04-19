<?php
session_start();
@session_regenerate_id(true);
require('db_connect.php');
require('function.php');
require('head.php'); 
require('post_process.php');
require('withdraw.php');

if(isset($_SESSION['flash'])){
  $flash_messages = $_SESSION['flash']['message'];
  $flash_type = $_SESSION['flash']['type'];
  }
  unset($_SESSION['flash']);

$error_messages = array();

require('header.php');
//グローバル変数として定義 
_debug('',true);
global $i;
if(empty($_POST['block'])){
  $_SESSION[$i]=0;
  //_debug($_SESSION[$i]);
}
if(isset($_POST['block'])){
switch($_POST['block']){
  case '«':
    $_SESSION[$i]--;
  break;
  case '»':
    $_SESSION[$i]++;
  break;
  default:
  $_SESSION[$i] = $_POST['block']-1;
  break;
}
}
//_debug($_SESSION[$i]);
?>