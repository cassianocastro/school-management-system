<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/../../../../../includes/config.php';
require_once __DIR__ . '/../../../../../actions/student.php';

$success_msg =  false;
$user_id     = $_SESSION['user_id'] ?? "";

if ( isset($_POST['form_submitted']) )
{
  $status    = $_POST["status"] ?? 'success';
  $firstname = $_POST["firstname"] ?? '';
  $amount    = $_POST["amount"] ?? '';
  $email     = $_POST["email"] ?? '';
  $month     = $_POST["month"] ?? '';
  $title     = "$month - Fee";

  $query = mysqli_query($db_conn, "INSERT INTO posts (title, type, description, status, author, parent) VALUES ('$title', 'payment','', '$status', $user_id, 0)");

  if ( $query )
  {
    $item_id = mysqli_insert_id($db_conn);
  }

  $payment_data = [
    'amount'     => $amount,
    'status'     => $status,
    'student_id' => $user_id,
    'month'      => $month
  ];

  foreach ( $payment_data as $key => $value )
  {
    mysqli_query($db_conn, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ('$item_id', '$key', '$value')");
  }

  $success_msg = true;
}
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

  <title>Student's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php
      // if ( isset($_GET['action']) and $_GET['action'] == 'view-invoice' )
      // {



      // }
      // else
      // {
        require_once __DIR__ . '/.components/table/index.php';
        require_once __DIR__ . '/.components/invoice/index.php';
        require_once __DIR__ . '/.components/modal/index.php';
      // }
      ?>
    </div>

  </div>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="../../../../index.js"></script>
  <script src="./index.js"></script>
  <script defer src="./.components/table/index.js"></script>
</body>
</html>