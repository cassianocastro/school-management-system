<?php
require_once __DIR__ . '/../includes/config.php';

$error = '';

if ( isset($_POST['submit']) )
{
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");

  if ( mysqli_num_rows($check_query) > 0 )
  {
    $error = 'Email already exists';
  }
  else
  {
    mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$password','$type')") or die(mysqli_error($db_conn));

    $_SESSION['success_msg'] = 'User has been succefuly registered';

    header("Location: user-account.php?user=$type");

    exit;
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
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <style>
  /*
  span#loader
  {
    background: #e2e2e2b5;

    position: absolute;
    left: 50;

    width: 100%;
    height: 100%;
  }

  i.fas.fa-circle-notch.fa-spin
  {
    font-size: 10rem;

    position: absolute;
    left: 50%;
    top: 50%;

    transform: translate(-50%,-50%);
    transform-origin: center;
  }
  */
  </style>

  <title>Admin | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/header.php'; ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <div class="d-flex">
              <h1 class="m-0 text-dark">Manage Accounts</h1>
              <!-- <a href="user-account.php?user=<?= $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-sm">Add New</a> -->
            </div>

          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accounts</a></li>
              <li class="breadcrumb-item active"><?= ucfirst($_REQUEST['user']) ?></li>
            </ol>
          </div><!-- /.col -->

          <?php
          // $_SESSION['success_msg'] = 'User has been succefuly registered';
          // print_r($_SESSION);
          if ( isset($_SESSION['success_msg']) ) {
          ?>
            <div class="col-12">
              <small class="text-success" style="font-size:16px"><?= $_SESSION['success_msg'] ?></small>
            </div>
          <?php
            unset($_SESSION['success_msg']);
          }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php if ( isset($_GET['action']) ) { ?>
          <div class="card">
            <div class="card-body" id="form-container">
              <?php if ( $_GET['action'] == 'add-new' ) { ?>
                <form action="" id="student-registration" method="post">
                  <fieldset class="border border-secondary p-3 form-group">
                    <legend class="d-inline w-auto h6">Student Information</legend>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Full Name</label>

                          <input type="text" class="form-control" placeholder="Full Name" name="name">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">DOB</label>

                          <input type="date" required class="form-control" placeholder="DOB" name="dob">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Mobile</label>

                          <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Email</label>

                          <input type="email" required class="form-control" placeholder="Email Address" name="email">
                        </div>
                      </div>

                      <!-- Address Fields -->
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Address</label>

                          <input type="text" class="form-control" placeholder="Address" name="address">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Country</label>

                          <input type="text" class="form-control" placeholder="Country" name="country">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">State</label>

                          <input type="text" class="form-control" placeholder="State" name="state">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Pin/Zip Code</label>

                          <input type="text" class="form-control" placeholder="Pin/Zip Code" name="zip">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="border border-secondary p-3 form-group">
                    <legend class="d-inline w-auto h6">Parents Information</legend>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Father's Name</label>

                          <input type="text" class="form-control" placeholder="Father's Name" name="father_name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Father's Mobile</label>

                          <input type="text" class="form-control" placeholder="Father's Mobile" name="father_mobile">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Mother's Name</label>

                          <input type="text" class="form-control" placeholder="Mother's Name" name="mother_name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Mothers's Mobile</label>

                          <input type="text" class="form-control" placeholder="Mothers's Mobile" name="mother_mobile">
                        </div>
                      </div>
                      <!-- Address Fields -->
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Address</label>

                          <input type="text" class="form-control" placeholder="Address" name="parents_address">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Country</label>

                          <input type="text" class="form-control" placeholder="Country" name="parents_country">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">State</label>

                          <input type="text" class="form-control" placeholder="State" name="parents_state">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Pin/Zip Code</label>

                          <input type="text" class="form-control" placeholder="Pin/Zip Code" name="parents_zip">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="border border-secondary p-3 form-group">
                    <legend class="d-inline w-auto h6">Last Qualification</legend>
                    <div class="row">

                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">School Name</label>

                          <input type="text" class="form-control" placeholder="School Name" name="school_name">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Class</label>

                          <input type="text" class="form-control" placeholder="Class" name="previous_class">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Status</label>

                          <input type="text" class="form-control" placeholder="Status" name="status">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Total Marks</label>

                          <input type="text" class="form-control" placeholder="Total Marks" name="total_marks">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Obtain Marks</label>

                          <input type="text" class="form-control" placeholder="Obtain Marks" name="obtain_mark">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Percentage</label>

                          <input type="text" class="form-control" placeholder="Percentage" name="previous_percentage">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="border border-secondary p-3 form-group">
                    <legend class="d-inline w-auto h6">Admission Details</legend>
                    <div class="row">
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Class</label>
                          <!-- <input type="text" class="form-control" placeholder="Class" name="class"> -->

                          <select name="class" id="class" class="form-control">
                            <option value="">Select Class</option>
                            <?php
                            $args = ['type' => 'class', 'status' => 'publish'];
                            $classes = get_posts($args);

                            foreach ($classes as $class)
                            {
                              echo '<option value="' . $class->id . '">' . $class->title . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group" id="section-container">
                          <label for="section">Select Section</label>

                          <select require name="section" id="section" class="form-control">
                            <option value="">-Select Section-</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Subject Streem</label>

                          <input type="text" class="form-control" placeholder="Subject Streem" name="subject_streem">
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Date of Admission</label>

                          <input type="date" class="form-control" placeholder="Date of Admission" name="doa">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <div class="form-group">
                    <label for="online-payment"><input type="radio" name="payment_method" value="online" id="online-payment"> Online Payment</label>

                    <label for="offline-payment"><input type="radio" name="payment_method" value="offline" id="offline-payment"> Offline Payment</label>
                  </div>

                  <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">

                  <button type="submit" name="submit" class="btn btn-primary"><span id="loader" style='display:none'><i class="fas fa-circle-notch fa-spin"></i></span> Register</button>
                </form>
              <?php } elseif ($_GET['action'] == 'fee-payment') { ?>
                <form action="" id="registration-fee" method="post">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Reciept Number</label>

                        <input type="text" name="reciept_number" placeholder="Reciept Number" class="form-control">
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Registration Fee</label>

                        <input type="text" name="registration_fee" placeholder="Registration Fee" class="form-control">
                      </div>
                    </div>

                  </div>
                  <input type="hidden" name="std_id" value="<?= $_GET['std_id'] ?? '' ?>">

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              <?php } ?>
            </div>
          </div>
        <?php } else { ?>
          <!-- Info boxes -->
          <div class="card">

            <div class="card-header py-2">
              <h3 class="card-title"><?= ucfirst($_REQUEST['user']) ?>s</h3>

              <div class="card-tools">
                <a href="?user=<?= $_REQUEST['user'] ?>&action=add-new" class="btn btn-success btn-xs">
                  <i class="fa fa-plus mr-2"></i>
                  Add New
                </a>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive bg-white">
                <table class="table table-bordered" id="users-table" width="100%">
                  <thead>
                    <tr>
                      <th width="50">ID</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                </table>
              </div>
            </div>
          </div>
          <!-- /.row -->
        <?php } ?>
      </div><!--/. container-fluid -->
    </section><!-- /.content -->

    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <?php require_once __DIR__ . '/footer.php'; ?>
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

  <script>
  jQuery(document).ready(function() {
    jQuery('#users-table').DataTable({
      ajax: {
        url: 'ajax.php?user=<?= $_GET['user'] ?>',
        type: 'POST'
      },
      columns: [
        {
          data: 'serial'
        },
        {
          data: 'name'
        },
        {
          data: 'email'
        },
        {
          data: 'action',
          orderable: false
        }
      ],
      processing: true,
      serverSide: true
    });
  });

  jQuery('#student-registration').on('submit', function() {

    if ( true )
    {
      var formdata = jQuery(this).serialize();

      jQuery.ajax({
        type: "post",
        url: "http://<?= $_SERVER["SERVER_NAME"] ?>/actions/student-registration.php",
        data: formdata,
        dataType: "json",
        beforeSend: () => jQuery('#loader').show(),
        success: (response) => {
          // console.log(response);

          if ( response.success == true )
          {
            // location.href = 'http://<?= $_SERVER["SERVER_NAME"] ?>/admin/user-account.php?user=student&action=fee-payment&std_id=' + response.std_id + '&payment_method=' + response.payment_method;
            location.assign(`http://<?= $_SERVER["SERVER_NAME"] ?>/admin/user-account.php?user=student&action=fee-payment&std_id=${response.std_id}&payment_method=${response.payment_method}`);
          }
        },
        complete: () => {} // jQuery('#loader').hide() }
      });
    }

    return false;
  });
  </script>
</body>
</html>