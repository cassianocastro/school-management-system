<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

$db_conn = mysqli_connect('localhost', 'php', 'php', 'sms_project');

if ( ! $db_conn )
{
    echo 'Connection Failed';

    exit;
}

session_start();

// if ( empty($_SESSION) || ! isset($_SESSION['login']) )
// {
//   session_start();
// }

date_default_timezone_set('Asia/Kolkata');

require 'functions.php';