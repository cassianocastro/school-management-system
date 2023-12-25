<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/sidebar.php';
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Student Attendance</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-item active">Attendance</li>
        </ol>
      </div>

    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <?php
    $usermeta = get_user_metadata($std_id);
    $class    = get_post(['id' => $usermeta['class']]);
    ?>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Student Detail</h3>
      </div>

      <div class="card-body">
        <strong>Name: </strong> <?= get_users(array('id' => $std_id))[0]->name ?><br>

        <strong>Class: </strong> <?= $class->title ?>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Attendance</h3>
      </div>

      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Date</td>
              <td>Status</td>
              <td>Singin Time</td>
              <td>Singout Time</td>
            </tr>
          </thead>
          <tbody>
          <?php
          $current_month = strtolower(date('F'));
          $current_year  = date('Y');
          $sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$current_month' AND year(current_session) = $current_year";

          $query = mysqli_query($db_conn, $sql);
          $row   = mysqli_fetch_object($query);

          foreach ( unserialize($row->attendance_value) as $date => $value)
          { ?>
            <tr>
              <td><?= $date ?></td>
              <td><?= ($value['signin_at']) ? 'Present' : 'Absent' ?></td>
              <td><?= ($value['signin_at']) ? date('d-m-yyy h:i:s', $value['signin_at']) : '' ?></td>
              <td><?= ($value['signout_at']) ? date('d-m-yyy h:i:s', $value['signout_at']) : '' ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>