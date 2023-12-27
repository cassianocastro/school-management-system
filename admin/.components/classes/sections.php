<?php
require_once __DIR__ . '/../../../includes/config.php';

if ( isset($_POST['submit']) )
{
  $title = $_POST['title'];

  $query = mysqli_query($db_conn, "INSERT INTO posts(author, title, description, type, status, parent) VALUES (1, $title, description, section, publish, 0)") or die('DB error');
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Admin's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/../header/index.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Manage Sections</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Sections</li>
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
                  <h3 class="card-title">Sections</h3>

                  <div class="card-tools"></div>
                </div>

                <div class="card-body">
                  <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 1;
                        $args  = ['type' => 'section', 'status' => 'publish'];
                        $sections = get_posts($args);

                        foreach ( $sections as $section ) {
                        ?>
                        <tr>
                          <td><?= $count++ ?></td>
                          <td><?= $section->title ?></td>
                          <td></td>
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
                  <h3 class="card-title">Add New Section</h3>
                </div>

                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="title">Title</label>

                      <input type="text" id="title" name="title" placeholder="Title" required class="form-control">
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

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script defer src="../../../plugins/jquery/jquery.min.js"></script>
  <script defer src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script defer src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script defer src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script defer src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script defer src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script defer src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script defer src="../../../assets/js/adminlte.js"></script>
  <script defer src="../../../assets/js/demo.js"></script>
  <!-- <script defer src="./dashboard.js"></script> -->
</body>
</html>