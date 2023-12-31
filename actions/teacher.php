<?php
define("SITE_URL", "http://{$_SERVER['SERVER_NAME']}");

if ( isset($_SESSION['login']) )
{
    if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'teacher' )
    {
        $user_type = $_SESSION['user_type'];

        header("Location: " . SITE_URL . "/$user_type");
    }
}
else
{
    header("Location: ../login");
}

$std_id  = $_SESSION['user_id'];
$student = get_user_data($std_id);