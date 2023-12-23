<?php
// session_start();

$site_url = "http://{$_SERVER['SERVER_NAME']}";

if ( isset($_SESSION['login']) )
{
  if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'teacher' )
  {
    $user_type = $_SESSION['user_type'];

    header("Location: /sms-project/$user_type/dashboard.php");
  }
}
else
{
  header("Location: ../login.php");
}

$std_id  = $_SESSION['user_id'];
$student = get_user_data($std_id);
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Teacher | Dashboard </title>

  <!-- jQuery -->
  <script async src="../plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">