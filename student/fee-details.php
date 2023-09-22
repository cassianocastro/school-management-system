<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<?php
$success_msg =  false;
if(isset($_POST['form_submitted'])){

    $status = isset($_POST["status"])?$_POST["status"]:'success';
    $firstname = isset($_POST["firstname"])?$_POST["firstname"]:'';
    $amount = isset($_POST["amount"])?$_POST["amount"]:'';
    $email = isset($_POST["email"])?$_POST["email"]:'';
    $month = isset($_POST["month"])?$_POST["month"]:'';

    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";

    $title = $month.' - Fee';
    
    $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `type`,`description`, `status`, `author`,`parent`) VALUES ('$title', 'payment','','$status', $user_id,0)");
    
    if($query){
        $item_id = mysqli_insert_id($db_conn);
    }
    
    $payment_data = array(
        'amount' => $amount,
        'status' => $status,
        'student_id' => $user_id,
        'month' => $month
    );
    
    foreach($payment_data as $key => $value){
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
    }
    
    $success_msg = true;
}

?>



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Fee Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Student Fee Details</li>
            </ol>
          </div><!-- /.col -->

          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <?php if($success_msg){?>
                <div class="alert alert-success" role="alert">
                    Payment has been completed, Thank You!
                </div>
            <?php } ?>

        <?php 
          $usermeta = get_user_metadata($std_id);
          ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Student Detail</h3>
          </div>
          <div class="card-body"> 
            <strong>Name: </strong> <?php echo get_users(array('id'=>$std_id))[0]->name ?> <br>
            <strong>Class: </strong> <?php echo $usermeta['class'] ?>
            
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
                $months = array('january', 'fabruary','march','april','may','june','july','august','september','october','november','december');
                foreach ($months as $key => $value) {
                  $highlight = ''; 
                  if(date('F') == ucwords($value))
                  {
                    $highlight = 'class="bg-success"';
                  }
                  ?>
                  <tr>
                    <td><?php echo ++$key?></td>
                    <td <?php echo $highlight?>><?php echo ucwords($value)?></td>
                    <td></td>
                    <td>
                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                      <a href="#" data-toggle="modal" data-month="<?php echo ucwords($value)?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn"><i class="fa fa-money-check-alt fa-fw"></i> Pay Now</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-dark"><i class="fa fa-envelope fa-fw"></i> Send Message</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


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
                    <form action="" method="post" >
                        <input type="hidden" name="amount" readonly="readonly" value="500" />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="firstname" readonly class="form-control" value="<?php echo $student->name?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" readonly class="form-control" value="<?php echo $student->email?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" readonly class="form-control" value="1234567890">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Months</label>
                                    <input type="text" name="month" readonly class="form-control" id="month" value="<?php echo $student->name?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h3><i class="fa fa-rupee-sign"></i> 500.00</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" name="form_submitted" class="btn btn-success">Confirm & Pay</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        jQuery(document).on('click', '.paynow-btn',function(){
            var month = jQuery(this).data('month');

            jQuery('#month').val(month)
        })
    </script>
    
<?php include('footer.php') ?>