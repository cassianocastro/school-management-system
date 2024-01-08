<?php require_once __DIR__ . '/../../../includes/config.php'; ?>

<?php require_once __DIR__ . '/../../../actions/student.php'; ?>

<?php
$usermeta = get_user_metadata($std_id);
$class    = get_post(['id' => $usermeta['class']]);
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Student's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/../header/index.php'; ?>

    <main class="content-wrapper">
      <div>

        <section class="content">
          <div class="container-fluid">

            <header class="content-header">
              <div class="container-fluid">
                <h1 class="m-0 text-dark">Manage Student Attendance</h1>

                <nav class="row mb-2">
                  <div class="col-sm-6">
                    <ul class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Student</a></li>
                      <li class="breadcrumb-item active"><a href="#">Attendance</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </header>

            <div class="card">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="4">Student Details</th>
                    </tr>
                    <tr>
                      <th colspan="3">Name: <?= get_users(['id' => $std_id])[0]->name ?></th>
                      <th>Class: <?= $class->title ?></th>
                    </tr>
                    <tr>
                      <td>Date</td>
                      <td>Status</td>
                      <td>Sing In Time</td>
                      <td>Sing Out Time</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $current_month = strtolower(date('F'));
                  $current_year  = date('Y');
                  $sql = <<<SQL
                    SELECT
                      *
                    FROM
                      attendance
                    WHERE
                      attendance_month = '$current_month'
                    AND
                      year(current_session) = 2023 -- $current_year
                  SQL;

                  $query = mysqli_query($db_conn, $sql);
                  $row   = mysqli_fetch_object($query);

                  foreach ( unserialize($row->attendance_value) as $date => $value ) :
                  ?>
                    <tr>
                      <td><?= $date ?></td>
                      <td><?= ($value['signin_at']) ? 'Present' : 'Absent' ?></td>
                      <td><?= ($value['signin_at']) ? date('d-m-yyy h:i:s', $value['signin_at']) : '' ?></td>
                      <td><?= ($value['signout_at']) ? date('d-m-yyy h:i:s', $value['signout_at']) : '' ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </section>

      </div>
    </main>

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../../../assets/js/adminlte.js"></script>
  <script src="../../../assets/js/demo.js"></script>
  <script src="../../index.js"></script>
</body>
</html>