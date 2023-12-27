<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

$site_url = "http://{$_SERVER['SERVER_NAME']}";

if ( isset($_SESSION['login']) )
{
    if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'teacher' )
    {
        $user_type = $_SESSION['user_type'];

        header("Location: ../$user_type/dashboard.php");
    }
}
else
{
    header("Location: ../login");
}

$std_id  = $_SESSION['user_id'];
$student = get_user_data($std_id);