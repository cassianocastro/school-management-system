<?php
require_once __DIR__ . '/../includes/config.php';

if ( isset($_POST['submit']) )
{
  $class_id   = $_POST['class_id'] ?? '';
  $section_id = $_POST['section_id'] ?? '';
  $teacher_id = $_POST['teacher_id'] ?? '';
  $period_id  = $_POST['period_id'] ?? '';
  $day_name   = $_POST['day_name'] ?? '';
  $subject_id = $_POST['subject_id'] ?? '';
  $date_add   = date('Y-m-d g:i:s');
  $status     = 'publish';
  $author     = 1;
  $type       = 'timetable';
  // $title =
  // $query = mysqli_query($db_conn, "INSERT INTO posts (`type`,`author`,`status`,`publish_date`) VALUES ('$type','$author','$status','$date_add')");
  $query = mysqli_query($db_conn, "INSERT INTO posts(author, title, description, type, status, parent) VALUES (1, $type, description, timetable, publish, 0)") or die('DB error');

  if ( $query )
  {
    $item_id = mysqli_insert_id($db_conn);
  }

  $metadata = [
    'class_id'   => $class_id,
    'section_id' => $section_id,
    'teacher_id' => $teacher_id,
    'period_id'  => $period_id,
    'day_name'   => $day_name,
    'subject_id' => $subject_id
  ];

  foreach ( $metadata as $key => $value )
  {
    mysqli_query($db_conn, "INSERT INTO metadata(item_id, meta_key, meta_value) VALUES ($item_id, $key, $value)");
  }

  header('Location: timetable.php');
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

  <title>Admin's Dashboard | School SysManager</title>
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
              <h1 class="m-0 text-dark">
                Manage Time Table

                <a class="btn btn-success btn-sm" href="?action=add">
                  Add New
                </a>
              </h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Time Table</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php if ( isset($_GET['action']) and $_GET['action'] == 'add' ) { ?>

          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-lg">
                    <div class="form-group">
                      <label for="class_id">Select Class</label>

                      <select name="class_id" id="class_id" class="form-control" required>
                        <option value="" label="Select"></option>
                        <?php
                        $args = ['type' => 'class', 'status' => 'publish'];
                        $classes = get_posts($args);

                        foreach ($classes as $key => $class) {
                        ?>
                        <option value="<?= $class->id ?>" label="<?= $class->title ?>"></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="section_id">Select Section</label>

                      <select name="section_id" id="section_id" class="form-control" required>
                        <option value="" label="Select"></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="teacher_id">Select Teacher</label>

                      <select name="teacher_id" id="teacher_id" class="form-control" required>
                        <option value="" label="Select"></option>
                        <option value="1" label="Teacher 1"></option>
                        <option value="2" label="Teacher 2"></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="period_id">Select Period</label>

                      <select name="period_id" id="period_id" class="form-control" required>
                        <option value="" label="Select"></option>

                        <?php
                        $args    = ['type' => 'period', 'status' => 'publish'];
                        $periods = get_posts($args);

                        foreach ( $periods as $key => $period ) {
                        ?>
                          <option value="<?= $period->id ?>" label="<?= $period->title ?>"></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="day_name">Select Day</label>

                      <select name="day_name" id="day_name" class="form-control" required>
                        <option value="" label="Select"></option>

                        <?php
                        $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];

                        foreach ( $days as $key => $day ) {
                        ?>
                          <option value="<?= $day ?>" label="<?= ucwords($day) ?>"></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                      <label for="subject_id">Select Subject</label>

                      <select name="subject_id" id="subject_id" class="form-control" required>
                        <option value="" label="Select"></option>
                        <option value="19" label="Mathematics"></option>
                        <option value="20" label="English"></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg">
                    <div class="from-group">
                      <label for="">&nbsp;</label>

                      <!-- <input type="submit" value="submit" name="submit" class="btn btn-success form-control"> -->
                      <button type="submit" name="submit" class="btn btn-success form-control">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <?php } else { ?>

          <form action="" method="get">
            <?php
            $class_id   = $_GET['class'] ?? 43;
            $section_id = $_GET['section'] ?? 3;
            ?>
            <div class="row">
              <div class="col-auto">
                <div class="form-group">
                  <select name="class" id="class" class="form-control">
                    <option value="" label="Select Class"></option>
                    <?php
                    $args    = ['type' => 'class', 'status' => 'publish'];
                    $classes = get_posts($args);

                    foreach ( $classes as $class )
                    {
                      $selected = ($class_id ==  $class->id) ? 'selected' : '';
                      echo "<option value=\"{$class->id}\" label=\"{$class->title}\" $selected></option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-auto">
                <div class="form-group" id="section-container">
                  <select name="section" id="section" class="form-control">
                    <option value="" label="Select Section"></option>
                    <?php
                    $args = ['type' => 'section', 'status' => 'publish'];
                    $sections = get_posts($args);

                    foreach ( $sections as $section )
                    {
                      $selected = ($section_id ==  $section->id) ? 'selected' : '';
                      echo "<option value=\"{$section->id}\" label=\"{$section->title}\" $selected></option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Apply</button>
              </div>
            </div>
          </form>

          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Timing</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $args = ['type' => 'period', 'status' => 'publish'];
                  $periods = get_posts($args);

                  foreach ( $periods as $period )
                  {
                    $from = get_metadata($period->id, 'from')[0]->meta_value;
                    $to   = get_metadata($period->id, 'to')[0]->meta_value;
                  ?>
                  <tr>
                    <td><?= date('h:i A', strtotime($from)) ?> - <?= date('h:i A', strtotime($to)) ?></td>
                      <?php
                      $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];

                      foreach ( $days as $day )
                      {
                        $query = mysqli_query(
                          $db_conn,
                          <<<SQL
                            SELECT * FROM
                              posts as p
                            INNER JOIN
                              metadata as md ON (md.item_id = p.id)
                            INNER JOIN
                              metadata as mp ON (mp.item_id = p.id)
                            INNER JOIN
                              metadata as mc ON (mc.item_id = p.id)
                            INNER JOIN
                              metadata as ms ON (ms.item_id = p.id)
                            WHERE
                              p.type = 'timetable'
                            AND
                              p.status = 'publish'
                            AND
                              md.meta_key = 'day_name'
                            AND
                              md.meta_value = '$day'
                            AND
                              mp.meta_key = 'period_id'
                            AND
                              mp.meta_value = $period->id
                            AND
                              mc.meta_key = 'class_id'
                            AND
                              mc.meta_value = $class_id
                            AND
                              ms.meta_key = 'section_id'
                            AND
                              ms.meta_value = $section_id
                          SQL
                        );

                        if ( mysqli_num_rows($query) > 0 )
                        {
                            while ( $timetable = mysqli_fetch_object($query) ) {
                      ?>
                              <td>
                                <p>
                                  <b>Teacher: </b>
                                  <?php
                                  $teacher_id = get_metadata($timetable->item_id, 'teacher_id')[0]->meta_value;

                                  echo get_user_data($teacher_id)->name;
                                  ?>

                                  <br>
                                  <b>Class: </b>

                                  <?php
                                  $class_id = get_metadata($timetable->item_id, 'class_id')[0]->meta_value;

                                  echo get_post(['id' => $class_id])->title;
                                  ?>
                                  <br>
                                  <b>Section: </b>
                                  <?php
                                  $section_id = get_metadata($timetable->item_id, 'section_id')[0]->meta_value;

                                  echo get_post(['id' => $section_id])->title;
                                  ?>
                                  <br>
                                  <b>Subject: </b>
                                  <?php
                                  $subject_id = get_metadata($timetable->item_id, 'subject_id')[0]->meta_value;

                                  echo get_post(['id' => $subject_id])->title;
                                  ?>
                                  <br>
                                </p>
                              </td>
                      <?php }
                        } else {
                      ?>
                              <td>
                                Unscheduled
                              </td>
                      <?php }
                      }?>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php } ?>
        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>

    <?php require_once __DIR__ . '/sidebar.php'; ?>
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
  <script defer src="./timetable.js"></script>
</body>
</html>