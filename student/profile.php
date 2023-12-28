<?php require_once __DIR__ . '/../includes/config.php';?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Student's Dashboard | School SysManager</title>
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
              <h1 class="m-0 text-dark">Profile</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Student</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <?php
      $class   = get_post(['id' => $stdmeta['class']]);
      $section = get_post(['id' => $stdmeta['section']]);
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-3">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img src="../assets/img/AdminLTELogo.png" alt="User profile picture" class="profile-user-img img-fluid img-circle">
                  </div>

                  <h3 class="profile-username text-center"><?= $student->name; ?></h3>

                  <p class="text-muted text-center">
                    <?= $stdmeta['address']; ?>,
                    <?= $stdmeta['state']; ?>,
                    <?= $stdmeta['country']; ?>
                    (<?= $stdmeta['zip']; ?>)
                  </p>

                  <hr>

                  <p>
                    <strong>
                      <i class="fa-fw fas fa-chalkboard mr-1"></i>

                      Class
                    </strong>

                    <span class="text-muted float-right">
                      <?= $class->title; ?> (<?= $section->title; ?>)
                    </span>
                  </p>

                  <hr>

                  <p>
                    <strong>
                      <i class="fa-fw fas fa-calendar-alt mr-1"></i>

                      DOB
                    </strong>

                    <span class="text-muted float-right">
                      <?= $stdmeta['dob']; ?>
                    </span>
                  </p>

                  <hr>

                  <p>
                    <strong>
                      <i class="fa-fw fas fa-phone-square mr-1"></i>

                      Mobile
                    </strong>

                    <span class="text-muted float-right">
                      <?= $stdmeta['mobile']; ?>
                    </span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Parent's Information</h3>
                </div>

                <div class="card-body">
                  <strong>
                    <i class="fas fa-book mr-1"></i>

                    Education
                  </strong>

                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>

                  <hr>

                  <strong>
                    <i class="fas fa-map-marker-alt mr-1"></i>

                    Location
                  </strong>

                  <p class="text-muted">
                    Malibu, California
                  </p>

                  <hr>

                  <strong>
                    <i class="fas fa-pencil-alt mr-1"></i>

                    Skills
                  </strong>

                  <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong>
                    <i class="far fa-file-alt mr-1"></i>

                    Notes
                  </strong>

                  <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                  </p>
                </div>
              </div>

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Parent's Information</h3>
                </div>

                <div class="card-body">
                  <strong>
                    <i class="fas fa-book mr-1"></i>

                    Education
                  </strong>

                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>

                  <hr>

                  <strong>
                    <i class="fas fa-map-marker-alt mr-1"></i>

                    Location
                  </strong>

                  <p class="text-muted">Malibu, California</p>

                  <hr>

                  <strong>
                    <i class="fas fa-pencil-alt mr-1"></i>

                    Skills
                  </strong>

                  <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong>
                    <i class="far fa-file-alt mr-1"></i>

                    Notes
                  </strong>

                  <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                  </p>
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

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../assets/js/adminlte.js"></script>
  <script src="../assets/js/demo.js"></script>
  <script src="./index.js"></script>
</body>
</html>