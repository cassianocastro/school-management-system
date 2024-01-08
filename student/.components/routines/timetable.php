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

    <main class="content-wrapper">
      <div>

        <section class="content">
          <div class="container-fluid">

            <header class="content-header">
              <div class="container-fluid">
                <h1 class="m-0 text-dark">Time Table</h1>

                <nav class="row mb-2">
                  <div class="col-sm-6">
                    <ul class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Student</a></li>
                      <li class="breadcrumb-item active"><a href="#">Time Table</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </header>

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
                    $args    = ['type' => 'period', 'status' => 'publish'];
                    $periods = get_posts($args);

                    foreach ( $periods as $period ) :
                      $from = get_metadata($period->id, 'from')[0]->meta_value;
                      $to   = get_metadata($period->id, 'to')[0]->meta_value;
                    ?>
                      <tr>
                        <td><?= date('h:i A', strtotime($from)) ?> - <?= date('h:i A', strtotime($to)) ?></td>
                        <?php
                        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

                        foreach ( $days as $day ) :
                          $query = mysqli_query(
                            $db_conn,
                            <<<SQL
                              SELECT
                                *
                              FROM
                                posts AS p
                              INNER JOIN
                                metadata AS mc ON (mc.item_id = p.id)
                              INNER JOIN
                                metadata AS md ON (md.item_id = p.id)
                              INNER JOIN
                                metadata AS mp ON (mp.item_id = p.id)
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
                                mp.meta_value = {$period->id}
                              AND
                                mc.meta_key = 'class_id'
                              AND
                                mc.meta_value = 1
                            SQL
                          );

                          if ( mysqli_num_rows($query) > 0 ) :
                            while ( $timetable = mysqli_fetch_object($query) ) :
                        ?>
                              <td>
                                <p>
                                  <b>Teacher: </b>

                                  <?php
                                  $teacher_id = get_metadata($timetable->item_id, 'teacher_id')[0]->meta_value;

                                  // echo get_user_data($teacher_id)[0]->name;
                                  echo get_user_data($teacher_id)->name;
                                  ?>
                                  <br>

                                  <b>Subject: </b>

                                  <?php
                                  $subject_id = get_metadata($timetable->item_id, 'subject_id')[0]->meta_value;

                                  echo get_post(['id' => $subject_id])->title;
                                  ?>
                                </p>
                              </td>
                          <?php
                            endwhile;
                          else: ?>
                            <td>
                              Unscheduled
                            </td>
                        <?php
                          endif;
                        endforeach;
                        ?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </section>

      </div>
    </main>

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="../../index.js"></script>
</body>
</html>