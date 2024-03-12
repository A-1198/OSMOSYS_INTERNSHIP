<?php

class SessionManager
{
  public static function startSession()
  {
    session_start();
    if(!isset($_SESSION['first']))
    {
      $_SESSION['first'] = date('Y-m-d H:i:s');
    }
  }

  public static function updateSession()
  {
    $_SESSION['last'] = date('Y-m-d H:i:s');
  }
}

?>