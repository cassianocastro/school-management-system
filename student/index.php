<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../actions/student.php';

$current_month = strtolower(date('F'));
$current_year  = date('Y');
$current_date  = date('d');
$sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$current_month' AND year(current_session) = $current_year AND std_id = $std_id";

$query = mysqli_query($db_conn, $sql);
$row   = mysqli_fetch_object($query);

$attendance = unserialize($row->attendance_value);

// echo '<pre>', print_r($attendance), '</pre>';

if ( isset($_POST['sign-in']) )
{
  // $att_data = [];

  // for ( $i = 1; $i <= 31; $i++ )
  // {
  //   $att_data[$i] = [
  //     'signin_at'  => (date('d') == $i) ? time() : '',
  //     'signout_at' => (date('d') == $i) ? time() : '',
  //     'date' => $i
  //   ];
  // }

  $attendance[$current_date] = [
    'signin_at'  => time(),
    'signout_at' => '',
    'date'       => $current_date
  ];

  $att_data = serialize($attendance);
  $current_month = strtolower(date('F'));
  $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

  mysqli_query($db_conn, $sql) or die('DB error');
}

if ( isset($_POST['sign-out']) )
{
  $attendance[$current_date] = [
    'signin_at'  => $attendance[$current_date]['signin_at'],
    'signout_at' => time(),
    'date'       => $current_date
  ];

  $att_data = serialize($attendance);
  $current_month = strtolower(date('F'));
  $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

  mysqli_query($db_conn, $sql) or die('DB error');
}

$totals = [
  ["Students" , 2000, "photo1.png"],
  ["Teachers" , 50  , "photo2.png"],
  ["Courses"  , 100 , "photo3.jpg"],
  ["Inquiries", 10  , "photo4.jpg"]
];
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

  <title>Student's Dashboard | School SysManager</title>
</head>
<body>
  <?php require_once __DIR__ . '/.components/header/index.php'; ?>

  <main>
    <div>

      <?php require_once __DIR__ . '/.components/home/index.php'; ?>

      <?php require_once __DIR__ . '/.components/study-materials/index.php'; ?>

    </div>
  </main>

  <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

  <?php require_once __DIR__ . '/.components/aside/index.php'; ?>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="./index.js"></script>
</body>
</html>