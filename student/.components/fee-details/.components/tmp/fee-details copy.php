<?php require_once __DIR__ . '/../../../includes/config.php'; ?>

<?php require_once __DIR__ . '/../../../actions/student.php'; ?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/adminlte.min.css">

  <title>Student's Dashboard | School SysManager</title>
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
                <li class="breadcrumb-item"><a href="#">Student</a></li>
                <li class="breadcrumb-item active">Student Fee Details</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php $usermeta = get_user_metadata($std_id); ?>

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
                  $months = ['january', 'february','march','april','may','june','july','august','september','october','november','december'];

                  foreach ( $months as $key => $value ) :
                    $highlight = '';

                    if ( date('F') == ucwords($value) )
                    {
                      $highlight = 'class="bg-success"';
                    }
                  ?>
                    <tr>
                      <td><?= ++$key ?></td>
                      <td <?= $highlight ?>><?= ucwords($value) ?></td>
                      <td></td>
                      <td>
                        <a href="?action=pay&month=<?= $value ?>&std_id=<?= $std_id ?>" class="btn btn-sm btn-primary">
                          <i class="fa fa-eye fa-fw"></i>

                          View
                        </a>
                        <a href="#" data-toggle="modal" data-month="<?= ucwords($value) ?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn">
                          <i class="fa fa-money-check-alt fa-fw"></i>

                          Pay Now
                        </a>
                        <a href="?action=pay&month=<?= $value ?>&std_id=<?= $std_id ?>" class="btn btn-sm btn-dark">
                          <i class="fa fa-envelope fa-fw"></i>

                          Send Message
                        </a>
                        <a href="?action=pay&month=<?= $value ?>&std_id=<?= $std_id ?>" class="btn btn-sm btn-danger">
                          <i class="fa fa-trash fa-fw"></i>

                          Delete
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <?php
      $MERCHANT_KEY  = "YOUR MERCHANT_KEY";
      $SALT          = "YOUR SALT";
      $PAYU_BASE_URL = "https://test.payu.in"; // For Production Mode
      $action = '';
      $posted = [];

      if ( ! empty($_POST) )
      {
        // print_r($_POST);
        // die;

        foreach ( $_POST as $key => $value )
        {
          $posted[$key] = $value;
        }
      }

      $formError = 0;

      if ( empty($posted['txnid']) )
      {
        // Generate random transaction id
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
      }
      else
      {
        $txnid = $posted['txnid'];
      }

      $hash = '';

      // Hash Sequence
      $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

      if ( empty($posted['hash']) and sizeof($posted) > 0 )
      {
        if (
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
        )
        {
          $formError = 1;
        }
        else
        {
          //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
          $hashVarsSeq = explode('|', $hashSequence);
          $hash_string = '';

          foreach ( $hashVarsSeq as $hash_var )
          {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
          }

          $hash_string .= $SALT;
          $hash   = strtolower(hash('sha512', $hash_string));
          $action = $PAYU_BASE_URL . '/_payment';
        }
      }
      elseif ( ! empty($posted['hash']) )
      {
        $hash = $posted['hash'];
        $action = $PAYU_BASE_URL . '/_payment';
      }
      ?>

      <!-- Modal -->
      <div class="modal fade" id="paynow-popup" tabindex="-1" role="dialog" aria-labelledby="paynow-popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="paynow-popupLabel">Paynow</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="<?= $action ?>" method="post" name="payuForm">
                <input type="hidden" name="surl" value="http://localhost:8888/sms/actions/success.php" size="64">
                <input type="hidden" name="furl" value="http://localhost:8888/sms/actions/failure.php" size="64">
                <input type="hidden" name="amount" value="500" readonly>
                <input type="hidden" name="key" value="<?= $MERCHANT_KEY ?>" readonly>
                <input type="hidden" name="hash" value="<?= $hash ?>" readonly>
                <input type="hidden" name="txnid" value="<?= $txnid ?>" readonly>
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" readonly>
                <input type="hidden" name="productinfo" value="Fee payment" readonly>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Full Name</label>

                      <input type="text" name="firstname" value="<?= $student->name ?>" readonly class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Email Address</label>

                      <input type="email" name="email" value="<?= $student->email ?>" readonly class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Phone</label>

                      <input type="text" name="phone" value="1234567890" readonly class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Months</label>

                      <input type="text" name="month" id="month" value="<?= $student->name ?>" readonly class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <h3><i class="fa fa-rupee-sign"></i> 500.00</h3>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Confirm & Pay</button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="../../index.js"></script>
  <script>
    <?php require_once __DIR__ . '/fee-details copy.js.php'; ?>
  </script>
</body>
</html>