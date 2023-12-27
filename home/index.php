<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="preload" as="style" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">
  <link rel="preload" as="style" href="home/index.css">

  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">

  <!--
    1. Font Awesome
    2. Google Fonts
    3. Bootstrap core CSS
    4. Material Design Bootstrap
  -->
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">
  <link rel="stylesheet" type="text/css" href="home/index.css">

  <title>Home | School SysManager</title>
</head>
<body>
  <?php require_once __DIR__ . '/../includes/config.php'; ?>

  <?php require_once __DIR__ . '/.components/header/index.php';?>

  <?php require_once __DIR__. '/.components/admission/index.php'; ?>

  <?php require_once __DIR__. '/.components/about/index.php'; ?>

  <?php require_once __DIR__. '/.components/courses/index.php'; ?>

  <?php require_once __DIR__. '/.components/teachers/index.php'; ?>

  <?php require_once __DIR__ . '/.components/achievements/index.php'; ?>

  <?php require_once __DIR__ . '/.components/testimonials/index.php'; ?>

  <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

  <!--
    1. JQuery
    2. Bootstrap tooltips
    3. Bootstrap core JavaScript
    4. MDB core JavaScript
  -->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>
</html>