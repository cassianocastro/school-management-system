<?php
require_once __DIR__ . '/../includes/config.php';

//session_start();

$site_url = "http://{$_SERVER['SERVER_NAME']}";

if ( isset($_SESSION['login']) and $_SESSION['login'] == true )
{
  if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'admin' )
  {
    $user_type = $_SESSION['user_type'];

    header("Location: /sms-project/$user_type/dashboard.php");
  }
}
else
{
  header("Location: ../login.php");
}

require_once __DIR__ . '/dashboard.php';