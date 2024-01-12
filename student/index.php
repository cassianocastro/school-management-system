<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../actions/student.php';

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

$totals = [
  ["Students" , 2000, "photo1.png"],
  ["Teachers" , 50  , "photo2.png"],
  ["Courses"  , 100 , "photo3.jpg"],
  ["Inquiries", 10  , "photo4.jpg"]
];
?>

<?php // Study-Materials
$materials = [];
$usermeta  = get_user_metadata($std_id);
$class     = $usermeta['class'];
$count     = 1;
$query     = mysqli_query(
  $db_conn,
  <<<SQL
    SELECT
      *
    FROM
      posts AS p
    INNER JOIN
      metadata AS m ON p.id = m.item_id
    WHERE
      p.type = 'study-material'
    AND
      m.meta_key = 'class'
    AND
      m.meta_value = $class
  SQL
);

while ( $att = mysqli_fetch_object($query) )
{
  // $class_id     = get_metadata($att->id, 'class')[0]->meta_value;
  $class           = get_post(['id' => $class]);
  $subject_id      = get_metadata($att->item_id, 'subject')[0]->meta_value;
  $subject         = get_post(['id' => $subject_id]);
  $file_attachment = get_metadata($att->item_id, 'file_attachment')[0]->meta_value;

  $materials[] = [
    "count"         => $count++,
    "att_title"     => $att->title,
    "attachment"    => "$site_url/assets/uploads/$file_attachment",
    "class_title"   => $class->title,
    "subject_title" => $subject->title,
    "att_pubdate"   => $att->publish_date,
  ];
}
?>

<?php // Periods
$rows    = [];
$count   = 1;
$periods = get_posts(['type' => 'period', 'status' => 'publish']);

foreach ( $periods as $period )
{
  $from = get_metadata($period->id, 'from')[0]->meta_value;
  $to   = get_metadata($period->id, 'to')[0]->meta_value;

  $rows[] = [
    "count"  => $count++,
    "period" => $period->title,
    "from"   => date('h:i A', strtotime($from)),
    "to"     => date('h:i A', strtotime($to))
  ];
}
?>

<?php // Attendance
function attendance()
{
  global $std_id, $db_conn;

  $usermeta = get_user_metadata($std_id);
  $class    = get_post(['id' => $usermeta['class']]);

  $current_month = strtolower(date('F'));
  $current_year  = date('Y');
  $sql = <<<SQL
    SELECT
      *
    FROM
      attendance
    WHERE
      attendance_month = '$current_month'
    AND
      year(current_session) = 2023 -- $current_year
  SQL;

  $query = mysqli_query($db_conn, $sql);

  return mysqli_fetch_object($query);
}

$row = attendance();
?>

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
  <link rel="stylesheet" type="text/css" href="./index.css">

  <title>Student's Dashboard | School SysManager</title>
</head>
<body>
  <?php require_once __DIR__ . '/.components/header/index.php'; ?>

  <main>
    <div>
      <?php require_once __DIR__ . '/.components/home/index.php'; ?>

      <?php require_once __DIR__ . '/.components/study-materials/index.php'; ?>

      <?php require_once __DIR__ . '/.components/syllabus/courses.php'; ?>

      <?php require_once __DIR__ . '/.components/syllabus/lessons.php'; ?>

      <?php require_once __DIR__ . '/.components/syllabus/subjects.php'; ?>

      <?php require_once __DIR__ . '/.components/routines/periods.php'; ?>

      <?php require_once __DIR__ . '/.components/routines/timetable.php'; ?>

      <?php require_once __DIR__ . '/.components/attendance/attendance.php'; ?>

      <?php require_once __DIR__ . '/.components/attendance/leave.php'; ?>
    </div>
  </main>

  <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

  <?php require_once __DIR__ . '/.components/aside/index.php'; ?>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="./index.js"></script>
</body>
</html>