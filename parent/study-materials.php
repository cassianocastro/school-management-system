<?php
require_once __DIR__ . '/../includes/config.php';

if ( isset($_POST['submit']) )
{
  $title       = $_POST['title'];
  $description = $_POST['description'];
  $class       = $_POST['class'];
  $subject     = $_POST['subject'];
  $file        = $_FILES["attachment"]["name"];
  $today       = date('Y-m-d');
  $target_dir  = "../assets/uploads/";
  $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
  // $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk    = 1;

  // Check if file already exists
  if ( file_exists($target_file) )
  {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ( $_FILES["attachment"]["size"] > 500000 )
  {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  // if ( $imageFileType != "jpg"
  // && $imageFileType != "png"
  // && $imageFileType != "jpeg"
  // && $imageFileType != "gif" )
  // {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   $uploadOk = 0;
  // }

  // Check if $uploadOk is set to 0 by an error
  if ( $uploadOk == 0 )
  {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
  else
  {
    if ( move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file) )
    {
      // mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));

      $query = mysqli_query($db_conn, "INSERT INTO posts(title, description, type, status, parent, author) VALUES ($title, $description, 'study-material', 'publish', 0, 1)");

      if ( $query )
      {
        $item_id = mysqli_insert_id($db_conn);
      }

      $metadata = [
        'class' => $class,
        'subject' => $subject,
        'file_attachment' => $file
      ];

      foreach ( $metadata as $key => $value )
      {
        mysqli_query($db_conn, "INSERT INTO metadata(item_id, meta_key, meta_value) VALUES ($item_id, $key, $value)");
      }

      $_SESSION['success_msg'] = "Course has been uploaded successfuly";

      header("Location: study-materials.php");

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

  <!--
    1. Font Awesome Icons
    2. overlayScrollbars
    3. Theme style
    4. Google Font: Source Sans Pro
  -->
  <link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Parent's Dashboard | School SysManager</title>
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
              <h1 class="m-0 text-dark">Study Materials</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item active">Study Materials</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php
          if ( isset($_GET['action']) and $_GET['action'] == 'add-new' ) :
            $classes  = get_posts(['type' => 'class', 'status' => 'publish']);
            $subjects = get_posts(['type' => 'subject', 'status' => 'publish']);
          ?>

          <!-- Info boxes -->
          <div class="card">
            <div class="card-header py-2">
              <h3 class="card-title">Add New Study-Material</h3>
            </div>

            <div class="card-body">
              <form action="./" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Title</label>

                  <input type="text" name="title" placeholder="Enter the title" class="form-control">
                </div>

                <div class="form-group">
                  <label for="name">Description</label>

                  <textarea name="description" id="description" placeholder="Enter the description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label for="name">Class</label>

                  <select name="class" id="class" class="form-control" required>
                    <option value="" label="Select"></option>
                    <?php
                    foreach ( $classes as $key => $class )
                    {
                      echo "<option value=\"{$class->id}\" label=\"{$class->title}\"></option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Your Subject</label>

                  <select name="subject" id="subject" class="form-control" required>
                    <option value="" label="Select"></option>
                    <?php
                    foreach ( $subjects as $key => $subject )
                    {
                      echo "<option value=\"{$subject->id}\" label=\"{$subject->title}\"></option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <input type="file" name="attachment" id="attachment" required>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
          </div>
          <?php else: ?>

          <!-- Info boxes -->
          <div class="card">
            <div class="card-header py-2">
              <h3 class="card-title">Study Materials</h3>

              <div class="card-tools">
                <a href="?action=add-new" class="btn btn-success btn-xs">
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
                      <th>Title</th>
                      <th>Attachment</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE type = 'study-material' AND author = 1");

                    while ( $att = mysqli_fetch_object($query) ) :
                      $class_id        = get_metadata($att->id, 'class')[0]->meta_value;
                      $class           = get_post(['id' => $class_id]);
                      $subject_id      = get_metadata($att->id, 'subject')[0]->meta_value;
                      $subject         = get_post(['id' => $subject_id]);
                      $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

                      // $file_attachment = get_post(['id' => $file_attachment]);
                      // echo '<pre>', print_r($class), '</pre>';
                    ?>
                      <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $att->title ?></td>
                        <td><a href="<?= "../assets/uploads/$file_attachment" ?>">Download File</a></td>
                        <td><?= $class->title ?></td>
                        <td><?= $subject->title ?></td>
                        <td><?= $att->publish_date ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </toby>
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

  <!--
    1. jQuery
    2. Bootstrap
    3. overlayScrollbars
    4. AdminLTE App
    5. OPTIONAL SCRIPTS
  -->
  <script defer src="../plugins/jquery/jquery.min.js"></script>
  <script defer src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../assets/js/adminlte.js"></script>
  <script defer src="../assets/js/demo.js"></script>
  <script defer src="./index.js"></script>
</body>
</html>