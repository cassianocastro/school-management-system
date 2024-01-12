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

      <section class="content">
        <div class="container-fluid">

          <header class="content-header">
            <div class="container-fluid">
              <h1 class="m-0 text-dark">Dashboard</h1>

              <nav class="row mb-2">
                <div class="col-sm-6">
                  <ul class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </header>

          <nav>
            <div>
              <ul>
                <li>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-graduation-cap"></i>
                      </span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Students</span>
                        <span class="info-box-number">2000</span>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-users"></i>
                      </span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Teachers</span>
                        <span class="info-box-number">50</span>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-book-open"></i>
                      </span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Courses</span>
                        <span class="info-box-number">100</span>
                      </div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-question"></i>
                      </span>

                      <div class="info-box-content">
                        <span class="info-box-text">New Inquiries</span>
                        <span class="info-box-number">10</span>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>

          <footer>
            <div>
              <p>
                Sign in Info
              </p>

              <form action="./" method="post">
                <div>
                  <?php if ( empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at']) : ?>
                    <button name="sign-in" class="btn btn-primary">Sign in</button>
                  <?php else: ?>
                    <button name="sign-out" class="btn btn-primary">Sign Out</button>
                  <?php endif; ?>
                </div>
              </form>
            </div>
          </footer>

        </div>
      </section>

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