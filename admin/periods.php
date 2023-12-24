<?php
require_once __DIR__ . '/../includes/config.php';

if ( isset($_POST['submit']) )
{
  $title    = $_POST['title'] ?? '';
  $from     = $_POST['from'] ?? '';
  $to       = $_POST['to'] ?? '';
  $status   = 'publish';
  $type     = 'period';
  $date_add = date('Y-m-d g:i:s');

  $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`,`status`,`publish_date`,`type`) VALUES ('$title','$status','$date_add','$type') ");

  if ( $query )
  {
    $item_id = mysqli_insert_id($db_conn);
  }

  mysqli_query($db_conn, "INSERT INTO metadata(meta_key, meta_value, item_id) VALUES (from, $from, $item_id)");
  mysqli_query($db_conn, "INSERT INTO metadata(meta_key, meta_value, item_id) VALUES (to, $to, $item_id)");

  header('Location: periods.php');
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Admin's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/header.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Manage Periods</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Periods</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class='col-lg-8'>

              <!-- Info boxes -->
              <div class="card">
                <div class="card-header py-2">
                  <h3 class="card-title">Periods</h3>

                  <div class="card-tools"></div>
                </div>

                <div class="card-body">
                  <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>From</th>
                          <th>To</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count   = 1;
                        $args    = ['type' => 'period', 'status' => 'publish'];
                        $periods = get_posts($args);

                        foreach ( $periods as $period )
                        {
                          $from = get_metadata($period->id, 'from')[0]->meta_value;
                          $to   = get_metadata($period->id, 'to')[0]->meta_value;
                        ?>
                        <tr>
                          <td><?= $count++ ?></td>
                          <td><?= $period->title ?></td>
                          <td><?= date('h:i A', strtotime($from)) ?></td>
                          <td><?= date('h:i A', strtotime($to)) ?></td>
                        </tr>
                        <?php } ?>
                      </toby>
                    </table>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-lg-4">
              <!-- Info boxes -->
              <div class="card">

                <div class="card-header py-2">
                  <h3 class="card-title">Add New Period</h3>
                </div>

                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="title">Title</label>

                      <input type="text" name="title" placeholder="Title" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="title">From</label>

                      <input type="time" name="from" placeholder="From" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="title">To</label>

                      <input type="time" name="to" placeholder="To" class="form-control" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success float-right">Submit</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>

    <?php require_once __DIR__ . '/sidebar.php'; ?>
  </div>

  <script defer src="../plugins/jquery/jquery.min.js"></script>
  <script defer src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script defer src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script defer src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script defer src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script defer src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script defer src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script defer src="../dist/js/adminlte.js"></script>
  <script defer src="../dist/js/demo.js"></script>
  <!-- <script defer src="./dashboard.js"></script> -->
</body>
</html>