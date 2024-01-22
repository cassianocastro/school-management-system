<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <?php if ($success_msg) : ?>
      <div class="alert alert-success" role="alert">
        Payment has been completed, Thank You!
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <header>
      <div>
        <h1>Manage Student Fee Details</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Student Fee Details</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <?php
    $usermeta = get_user_metadata($std_id);
    $class    = get_post(['id' => $usermeta['class']]);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Student Detail</h3>
      </div>

      <div class="card-body">
        <strong>Name: </strong><?= get_users(['id' => $std_id])[0]->name ?>

        <br>

        <strong>Class: </strong><?= $class->title ?>
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
            $sql = "SELECT m.meta_value as `month` FROM `posts` as p JOIN `metadata` as m ON p.id = m.item_id WHERE p.type = 'payment' AND p.author = $user_id AND m.meta_key = 'month' AND year(p.publish_date) = 2023";

            $query = mysqli_query($db_conn, $sql);
            $paid_fees = [];

            while ( $row = mysqli_fetch_object($query) )
            {
              $paid_fees[] = strtolower($row->month);
            }

            // echo '<pre>', print_r($paid_fees), '</pre>';

            $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

            foreach ( $months as $key => $value )
            {
              $highlight = '';

              $paid = false;

              if ( in_array($value, $paid_fees) )
              {
                $paid = true;
                $highlight = 'class="bg-success"';
              }
              // if ( date('F') == ucwords($value) )
              // {
              //   $highlight = 'class="bg-success"';
              // }
            ?>
              <tr>
                <td><?= ++$key; ?></td>
                <td><?= ucwords($value); ?></td>
                <td <?= $highlight; ?>><?= ($paid) ? "Paid" : "Pending"; ?></td>
                <td>
                  <?php if ($paid) : ?>
                    <a href="?action=view-invoice&month=<?= $value ?>&std_id=<?= $std_id ?>" class="btn btn-sm btn-primary">
                      <i class="fa fa-eye fa-fw"></i>

                      View
                    </a>
                  <?php else : ?>
                    <a href="#" data-toggle="modal" data-month="<?= ucwords($value) ?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn">
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
  </div>
</section>