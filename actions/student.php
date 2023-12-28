<?php
// session_start();

$site_url = "http://{$_SERVER["SERVER_NAME"]}/";

if ( isset($_SESSION['login']) )
{
    if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'student' )
    {
        $user_type = $_SESSION['user_type'];

        header("Location: {$site_url}{$user_type}");
    }
}
else
{
    header("Location: ../login");
}

$std_id  = $_SESSION['user_id'];
$student = get_user_data($std_id);
$stdmeta = get_user_metadata($std_id);