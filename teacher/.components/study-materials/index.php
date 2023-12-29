<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/../../../includes/config.php';
require_once __DIR__ . '/../../../actions/teacher.php';

if ( isset($_POST['submit']) )
{
  $title       = $_POST['title'];
  $description = $_POST['description'];
  $class       = $_POST['class'];
  $subject     = $_POST['subject'];
  $file        = $_FILES["attachment"]["name"];
  $today       = date('Y-m-d');

  $target_dir  = "$site_url/assets/uploads/";
  $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
  // $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

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

      $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `description`, `type`, `status`, `parent`, `author`) VALUES ('$title', '$description', 'study-material', 'publish', 0, 1)");

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
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
      }

      $_SESSION['success_msg'] = 'Course has been uploaded successfuly';

      header('Location: study-materials.php');

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
  <link rel="stylesheet" type="text/css" href="../../../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" type="text/css" href="./.components/table/index.css">

  <title>Teacher's Dashboard | School SysManager</title>
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
              <h1 class="m-0 text-dark">Study Materials</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
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
          if ( isset($_GET['action']) and $_GET['action'] == 'add-new' )
          {
            $classes  = get_posts(['type' => 'class', 'status' => 'publish']);
            $subjects = get_posts(['type' => 'subject', 'status' => 'publish']);

            require_once __DIR__ . '/.components/form/index.php';
          }
          else
          {
            require_once __DIR__ . '/.components/table/index.php';
          }
          ?>
        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script defer src="../../../plugins/jquery/jquery.min.js"></script>
  <script defer src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../../../assets/js/adminlte.js"></script>
  <script defer src="../../../assets/js/demo.js"></script>
  <script defer src="../../index.js"></script>
</body>
</html>