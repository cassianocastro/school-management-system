<?php
//session_start();

$site_url = "http://{$_SERVER['SERVER_NAME']}";

if ( isset($_SESSION['login']) and $_SESSION['login'] == true )
{
  if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'admin' )
  {
    $user_type = $_SESSION['user_type'];

    if ( $user_type === "teacher" )
      header("Location: ../teacher");
    else
      header("Location: ../$user_type/dashboard.php");
  }
}
else
{
  header("Location: ../login");
}