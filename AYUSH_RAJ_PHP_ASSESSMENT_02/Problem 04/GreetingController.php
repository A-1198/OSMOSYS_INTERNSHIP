<?php

require_once 'SessionManager.php';

SessionManager :: startSession();




$name = isset($_POST['name']) ? trim($_POST['name']) : null;
if(!isset($_COOKIE['first']))
{
  setcookie('first',date('Y-m-d H:i:s'),time() + (86400),"/");
}





SessionManager::updateSession();


if($name==='' && strlen($name)==0)
{
  echo "Name can't be empty and must be filled.";
}
else
{
echo "Hello user $name!, Welcome Back!!"."<br/>";
if(isset($_SESSION['first']))
{
  echo "First visit : ".$_SESSION['first']."<br/>";
}
if(isset($_SESSION['last']))
{
  echo "Last visit : ".$_SESSION['last']."<br/>";
}
if(isset($_COOKIE['first']))
{
  echo "First visit(from cookie) : ".$_COOKIE['first']."<br/>";
}
}

//set http response header
header("Cache-Control: no-cache");
header("Expires:0");
header("Content-Type:text/html; charset=UTF-8");

?>