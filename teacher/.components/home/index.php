<section id="index">
  <div>

    <header>
      <div>
        <h1>Dashboard</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <!-- Info boxes -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-graduation-cap"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Total Students</span>
            <span class="info-box-number">2000</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1">
            <i class="fas fa-users"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Total Teachers</span>
            <span class="info-box-number">50</span>
          </div>
        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
            <i class="fas fa-book-open"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Total Courses</span>
            <span class="info-box-number">100</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1">
            <i class="fas fa-question"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">New Inquiries</span>
            <span class="info-box-number">10</span>
          </div>
        </div>
      </div>

    </div>

    <hr>

    <?php
    $current_month = strtolower(date('F'));
    $current_year  = date('Y');
    $current_date  = date('d');
    $sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$current_month' AND year(current_session) = $current_year AND std_id = $std_id";

    $query = mysqli_query($db_conn, $sql);
    $row   = mysqli_fetch_object($query);

    $attendance = unserialize($row->attendance_value);

    // echo '<pre>', print_r($attendance), '</pre>';

    if ( isset($_POST['sign-in']) )
    {
      // $att_data = [];

      // for ( $i = 1; $i <= 31; $i++ )
      // {
      //   $att_data[$i] = [
      //     'signin_at'  => (date('d') == $i) ? time() : '',
      //     'signout_at' => (date('d') == $i) ? time() : '',
      //     'date' => $i
      //   ];
      // }

      $attendance[$current_date] = [
        'signin_at'  => time(),
        'signout_at' => '',
        'date'       => $current_date
      ];

      $att_data = serialize($attendance);
      $current_month = strtolower(date('F'));
      $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

      mysqli_query($db_conn, $sql) or die('DB error');
    }

    if ( isset($_POST['sign-out']) )
    {
      $attendance[$current_date] = [
        'signin_at'  => $attendance[$current_date]['signin_at'],
        'signout_at' => time(),
        'date'       => $current_date
      ];

      $att_data = serialize($attendance);
      $current_month = strtolower(date('F'));
      $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

      mysqli_query($db_conn, $sql) or die('DB error');
    }
    ?>
    <div class="row">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-header">
            Sign in Info
          </div>

          <div class="card-body">
            <form action="./" method="post">
              <?php if ( empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at'] ) : ?>
                <button name="sign-in" class="btn btn-primary">Sign in</button>
              <?php else: ?>
                <button name="sign-out" class="btn btn-primary">Sign Out</button>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>