<?php
require_once __DIR__ . '/../../../includes/config.php';

if ( isset($_POST['submit']) )
{
  $name     = $_POST['name'];
  $category = $_POST['category'];
  $duration = $_POST['duration'];
  $image    = $_FILES["thumbnail"]["name"];
  $today    = date('Y-m-d');

  $target_dir    = "../assets/uploads/";
  $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check if file already exists
  if ( file_exists($target_file) )
  {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ( $_FILES["thumbnail"]["size"] > 500000 )
  {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if ( $imageFileType != "jpg"
  && $imageFileType != "png"
  && $imageFileType != "jpeg"
  && $imageFileType != "gif" )
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ( $uploadOk == 0 )
  {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
  else
  {
    if ( move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file) )
    {
      mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));

      $_SESSION['success_msg'] = 'Course has been uploaded successfuly';

      header('Location: courses.php');
      exit;
    }
    else
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  // ob_start();
  // ob_end_flush();
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
              <h1 class="m-0 text-dark">Manage Subjects</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Subjects</li>
              </ol>
            </div>

            <?php if ( isset($_SESSION['success_msg']) ) { ?>
              <div class="col-12">
                <small class="text-success" style="font-size: 16px"><?= $_SESSION['success_msg']?></small>
              </div>
            <?php
                unset($_SESSION['success_msg']);
              }
            ?>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php if ( isset($_REQUEST['action']) ) { ?>

          <!-- Info boxes -->
          <div class="card">
            <div class="card-header py-2">
              <h3 class="card-title">Add New Course</h3>
            </div>

            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="name">Course Name</label>

                  <input type="text" name="name" placeholder="Course Name" required class="form-control">
                </div>

                <div class="form-group">
                  <label for="category">Course Category</label>

                  <select name="category" id="category" class="form-control">
                    <option value="" label="Select Category"></option>
                    <option value="web-design-and-development" label="Web Design & Development"></option>
                    <option value="app-developement" label="App Development"></option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="duration">Course Duration</label>

                  <input type="text" name="duration" id="duration" placeholder="Course Duration" class="form-control" required>
                </div>

                <div class="form-group">
                  <input type="file" name="thumbnail" id="thumbnail" required>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Submit</button>

              </form>
            </div>
          </div>
          <?php } else { ?>
          <!-- Info boxes -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card">

                <div class="card-header py-2">
                  <h3 class="card-title">Add New Subject</h3>
                </div>

                <div class="card-body" >
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="class">Select Class</label>

                      <select name="class" id="class" class="form-control" required>
                        <option value="" label="Select Class"></option>
                        <?php
                        $args    = ['type' => 'class', 'status' => 'publish'];
                        $classes = get_posts($args);

                        foreach ( $classes as $key => $class ) {
                        ?>
                        <option value="<?= $class->id ?>" label="<?= $class->title ?>"></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div id="section-container" class="form-group" style="display: none">
                      <label for="section">Select Section</label>

                      <select name="section" id="section" class="form-control" required>
                        <option value="" label="Select Section"></option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="subject">Subject Name</label>

                      <input type="text" name="subject" id="subject" placeholder="Subject Name" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                    </div>
                  </form>
                </div>

              </div>
            </div>

            <div class="col-lg-8">
              <div class="card">
                <div class="card-header py-2">
                  <h3 class="card-title">Subjects</h3>

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
                          <th>S.No.</th>
                          <th>Name</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $count    = 1;
                          $args     = ['type' => 'subject', 'status' => 'publish'];
                          $subjects = get_posts($args);

                          foreach ( $subjects as $subject ) {
                        ?>
                          <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $subject->title ?></td>
                            <td><?= $subject->publish_date ?></td>
                          </tr>
                        <?php } ?>
                      </toby>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
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