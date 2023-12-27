<?php require_once __DIR__ . '/../../../includes/config.php'; ?>

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
              <h1 class="m-0 text-dark">Manage Student Fee Details</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Student Fee Details</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php
          if ( isset($_GET['action']) and $_GET['action'] == 'view' ) {
            $std_id   = $_GET['std_id'] ?? '';
            $usermeta = get_user_metadata($std_id);
          ?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Detail</h3>
              </div>

              <div class="card-body">
                <strong>Name: </strong><?= get_users(['id' => $std_id])[0]->name ?>
                <br>
                <strong>Class: </strong><?= $usermeta['class'] ?>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tution Fee</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Month</th>
                      <th>Fee Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = <<<SQL
                      SELECT
                        m.meta_value as `month`
                      FROM
                        `posts` as p
                      JOIN
                        `metadata` as m ON p.id = m.item_id
                      WHERE
                        p.type = 'payment'
                      AND
                        p.author = $std_id
                      AND
                        m.meta_key = 'month'
                      AND
                        year(p.publish_date) = 2023
                    SQL;

                    $query = mysqli_query($db_conn, $sql);
                    $paid_fees = [];

                    while ( $row = mysqli_fetch_object($query) )
                    {
                      $paid_fees[] = strtolower($row->month);
                    }

                    // echo '<pre>', print_r($paid_fees), '</pre>';

                    $months = ['january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

                    foreach ( $months as $key => $value )
                    {
                      $highlight = '';
                      $paid = false;

                      if ( in_array($value, $paid_fees) )
                      {
                        $paid = true;
                        $highlight = 'class="bg-success"';
                      }

                      //   if(date('F') == ucwords($value))
                      //   {
                      //     $highlight = 'class="bg-success"';
                      //   }
                    ?>
                      <tr>
                        <td><?= ++$key ?></td>
                        <td><?= ucwords($value) ?></td>
                        <td <?= $highlight ?>><?= ($paid) ? "Paid" : "Pending"; ?></td>
                        <td>
                          <?php if ($paid) : ?>
                            <a class="btn btn-sm btn-primary" href="?action=view-invoice&month=<?= $value ?>&std_id=<?= $std_id ?>">
                              <i class="fa fa-eye fa-fw"></i>

                              View
                            </a>
                          <?php else : ?>
                            <a class="btn btn-sm btn-warning paynow-btn" data-toggle="modal" data-month="<?= ucwords($value) ?>" data-target="#paynow-popup" href="#">
                              <i class="fa fa-money-check-alt fa-fw"></i>

                              Pay Now
                            </a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php } elseif (isset($_GET['action']) and $_GET['action'] == 'view-invoice') { ?>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="invoice-title">
                        <h4 class="float-end font-size-15">
                          Invoice #DS0204

                          <span class="badge bg-success font-size-12 ms-2">Paid</span>
                        </h4>

                        <div class="mb-4">
                          <h2 class="mb-1 text-muted">Bootdey.com</h2>
                        </div>

                        <div class="text-muted">
                          <p class="mb-1">
                            3184 Spruce Drive Pittsburgh, PA 15201
                          </p>

                          <p class="mb-1">
                            <i class="uil uil-envelope-alt me-1"></i> xyz@987.com
                          </p>

                          <p>
                            <i class="uil uil-phone me-1"></i> 012-345-6789
                          </p>
                        </div>
                      </div>

                      <hr class="my-4">

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="text-muted">
                            <h5 class="font-size-16 mb-3">Billed To:</h5>

                            <h5 class="font-size-15 mb-2">Preston Miller</h5>

                            <p class="mb-1">4068 Post Avenue Newfolden, MN 56738</p>

                            <p class="mb-1">PrestonMiller@armyspy.com</p>

                            <p>001-234-5678</p>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="text-muted text-sm-end">
                            <div>
                              <h5 class="font-size-15 mb-1">Invoice No:</h5>

                              <p>#DZ0112</p>
                            </div>

                            <div class="mt-4">
                              <h5 class="font-size-15 mb-1">Invoice Date:</h5>

                              <p>12 Oct, 2020</p>
                            </div>

                            <div class="mt-4">
                              <h5 class="font-size-15 mb-1">Order No:</h5>

                              <p>#1123456</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                          <table class="table align-middle table-nowrap table-centered mb-0">
                            <thead>
                              <tr>
                                <th style="width: 70px;">No.</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end" style="width: 120px;">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">01</th>
                                <td>
                                  <div>
                                    <h5 class="text-truncate font-size-14 mb-1">Black Strap A012</h5>
                                    <p class="text-muted mb-0">Watch, Black</p>
                                  </div>
                                </td>
                                <td>$ 245.50</td>
                                <td>1</td>
                                <td class="text-end">$ 245.50</td>
                              </tr>

                              <tr>
                                <th scope="row">02</th>
                                <td>
                                  <div>
                                    <h5 class="text-truncate font-size-14 mb-1">Stainless Steel S010</h5>
                                    <p class="text-muted mb-0">Watch, Gold</p>
                                  </div>
                                </td>
                                <td>$ 245.50</td>
                                <td>2</td>
                                <td class="text-end">$491.00</td>
                              </tr>

                              <tr>
                                <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                <td class="text-end">$732.50</td>
                              </tr>

                              <tr>
                                <th scope="row" colspan="4" class="border-0 text-end">Discount:</th>
                                <td class="border-0 text-end">- $25.50</td>
                              </tr>

                              <tr>
                                <th scope="row" colspan="4" class="border-0 text-end">Shipping Charge:</th>
                                <td class="border-0 text-end">$20.00</td>
                              </tr>

                              <tr>
                                <th scope="row" colspan="4" class="border-0 text-end">Tax</th>
                                <td class="border-0 text-end">$12.00</td>
                              </tr>

                              <tr>
                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                <td class="border-0 text-end">
                                  <h4 class="m-0 fw-semibold">$739.00</h4>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>

                        <div class="d-print-none mt-4">
                          <div class="float-end">
                            <a class="btn btn-success me-1" href="javascript: window.print()">
                              <i class="fa fa-print"></i>
                            </a>

                            <a class="btn btn-primary w-md" href="#">
                              Send
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>S.no.</th>
                  <th>Student Name</th>
                  <th>Last Payment</th>
                  <th>Due Payment</th>
                  <th>Fee Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $students = get_users(['type' => 'student']);

                foreach ( $students as $key => $student ) {
                ?>
                  <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $student->name ?></td>
                    <td>4/12</td>
                    <td></td>
                    <td></td>
                    <td>
                      <a class="btn btn-sm btn-info" href="?action=view&std_id=<?= $student->id ?>">
                        <i class="fa fa-eye fa-fw"></i>

                        View
                      </a>
                      <!--
                      <a href="" class="btn btn-xs btn-dark">
                        <i class="fa fa-pencil-alt fa-fw"></i>
                      </a>
                      -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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