<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../actions/teacher.php';
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="./index.css">

  <title>Teacher's Dashboard | School SysManager</title>
</head>
<body>
  <?php require_once __DIR__ . '/.components/header/index.php'; ?>

  <main>
    <div>
      <?php require_once __DIR__ . '/.components/home/index.php'; ?>

      <?php require_once __DIR__ . '/.components/routines/index.php'; ?>

      <?php require_once __DIR__ . '/.components/study-materials/index.php'; ?>

      <?php require_once __DIR__ . '/.components/messages/index.php'; ?>

      <?php require_once __DIR__ . '/.components/notifications/index.php'; ?>
    </div>
  </main>

  <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

  <?php require_once __DIR__ . '/.components/aside/index.php'; ?>

  <script defer src="/plugins/jquery/jquery.min.js"></script>
  <script defer src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="/assets/js/adminlte.js"></script>
  <script defer src="/assets/js/demo.js"></script>
  <script defer type="module" src="./index.js"></script>
</body>
</html>