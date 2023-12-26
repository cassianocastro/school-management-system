<?php
require_once __DIR__ . '/../includes/config.php';

if ( isset($_POST['submit']) )
{
  $title    = $_POST['title'];
  $sections = $_POST['section'];
  // $added_date = date('Y-m-d');

  $query = mysqli_query($db_conn, "INSERT INTO posts(author, title, description, type, status, parent) VALUES (1, $title, description, class, publish, 0)") or die('DB error');

  if ( $query )
  {
    $post_id = mysqli_insert_id($db_conn);
  }

  foreach ( $sections as $key => $value )
  {
    mysqli_query($db_conn, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ($post_id, section, $value)") or die(mysqli_error($db_conn));
  }
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
  <link rel="stylesheet" type="text/css" href="../assets/css/adminlte.min.css">
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
              <h1 class="m-0 text-dark">Manage Classes</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Admin</a></li>
                <li class="breadcrumb-item active">Classes</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <?php
          if ( isset($_REQUEST['action']) ) : ?>
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">Add New class</h3>
              </div>

              <div class="card-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="title">Title</label>

                    <input type="text" name="title" placeholder="Title" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="title">Sections</label>

                    <?php
                    $args = ['type' => 'section', 'status' => 'publish'];
                    $sections = get_posts($args);

                    foreach ( $sections as $key => $section ) {
                    ?>
                      <div>
                        <label for="<?= $key ?>">
                          <input type="checkbox" name="section[]" id="<?= $key ?>" value="<?= $section->id ?>">

                          <?= $section->title ?>
                        </label>
                      </div>
                    <?php } ?>
                  </div>

                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
              </div>
            </div>
          <?php else: ?>
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">Classes</h3>

                <div class="card-tools">
                  <a class="btn btn-success btn-xs" href="?action=add-new">
                    <i class="fa fa-plus mr-2"></i>

                    Add New
                  </a>
                </div>
              </div>

              <div class="card-body">
                <div class="table-responsive bg-white">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>section</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count   = 1;
                      $args    = ['type' => 'class', 'status' => 'publish'];
                      $classes = get_posts($args);

                      foreach ( $classes as $class ) {
                      ?>
                        <tr>
                          <td><?= $count++ ?></td>
                          <td>Class <?= $class->title ?></td>
                          <td>
                            <?php
                            $class_meta = get_metadata($class->id, 'section');

                            foreach ( $class_meta as $meta )
                            {
                              $section = get_post(['id' => $meta->meta_value]);

                              echo $section->title;
                            }
                            ?>
                          </td>
                          <td><?= $class->publish_date ?></td>
                          <td></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php endif; ?>
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
  <script defer src="../assets/js/adminlte.js"></script>
  <script defer src="../assets/js/demo.js"></script>
  <!-- <script defer src="./dashboard.js"></script> -->
</body>
</html>