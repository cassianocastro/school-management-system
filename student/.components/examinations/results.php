<?php require_once __DIR__ . '/../../../includes/config.php'; ?>

<?php require_once __DIR__ . '/../../../actions/student.php'; ?>

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
                <h1 class="m-0 text-dark">Results</h1>

                <nav class="row mb-2">
                  <div class="col-sm-6">
                    <ul class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Student</a></li>
                      <li class="breadcrumb-item active"><a href="#">Results</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </header>

            <div class="card">
              <div class="card-body">

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