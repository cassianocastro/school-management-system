<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../actions/teacher.php';
?>

<?php // Study Materials

if ( isset($_POST['submit']) )
{
  $title       = $_POST['title'];
  $description = $_POST['description'];
  $class       = $_POST['class'];
  $subject     = $_POST['subject'];
  $file        = $_FILES["attachment"]["name"];
  $today       = date('Y-m-d');

  $target_dir  = SITE_URL . "/assets/uploads/";
  $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
  // $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check if file already exists
  if ( file_exists($target_file) )
  {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ( $_FILES["attachment"]["size"] > 500000 )
  {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  // if ( $imageFileType != "jpg"
  // && $imageFileType != "png"
  // && $imageFileType != "jpeg"
  // && $imageFileType != "gif" )
  // {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   $uploadOk = 0;
  // }

  // Check if $uploadOk is set to 0 by an error
  if ( $uploadOk == 0 )
  {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
  else
  {
    if ( move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file) )
    {
      // mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));

      $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `description`, `type`, `status`, `parent`, `author`) VALUES ('$title', '$description', 'study-material', 'publish', 0, 1)");

      if ( $query )
      {
        $item_id = mysqli_insert_id($db_conn);
      }

      $metadata = [
        'class' => $class,
        'subject' => $subject,
        'file_attachment' => $file
      ];

      foreach ( $metadata as $key => $value )
      {
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
      }

      $_SESSION['success_msg'] = 'Course has been uploaded successfuly';

      header('Location: study-materials.php');

      exit;
    }
    else
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  // ob_start();
  // ob_end_flush();
}

$classes  = get_posts(['type' => 'class', 'status' => 'publish']);
$subjects = get_posts(['type' => 'subject', 'status' => 'publish']);


$materials = [];
$count     = 1;
$query     = mysqli_query(
  $db_conn,
  <<<SQL
    SELECT
      *
    FROM
      posts
    WHERE
      type = 'study-material'
    AND
      author = 1
  SQL
);

while ( $att = mysqli_fetch_object($query) )
{
  $class_id        = get_metadata($att->id, 'class')[0]->meta_value;
  $class           = get_post(['id' => $class_id]);
  $subject_id      = get_metadata($att->id, 'subject')[0]->meta_value;
  $subject         = get_post(['id' => $subject_id]);
  $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

  // $file_attachment = get_post(['id' => $file_attachment]);
  // echo '<pre>', print_r($class), '</pre>';

  $materials[] = [
    "count"         => $count++,
    "att_title"     => $att->title,
    "att_pubdate"   => $att->publish_date,
    "class_title"   => $class->title,
    "subject_title" => $subject->title,
    "attachment"    => SITE_URL . "/assets/uploads/$file_attachment"
  ];
}
?>

<?php // Routines: Periods
$rows    = [];
$count   = 1;
$args    = ['type' => 'period', 'status' => 'publish'];
$periods = get_posts($args);

foreach ( $periods as $period )
{
  $from = get_metadata($period->id, 'from')[0]->meta_value;
  $to   = get_metadata($period->id, 'to')[0]->meta_value;

  $rows[] = [
    "count" => $count++ ,
    "title" => $period->title,
    "from"  => date('h:i A', strtotime($from)),
    "to"    => date('h:i A', strtotime($to))
  ];
}
?>

<?php // Timetable
// error_reporting(E_ALL);
// ini_set("display_errors", true);

function query($day, $id)
{
  global $db_conn;

  return mysqli_query(
    $db_conn,
    <<<SQL
      SELECT * FROM
        posts as p
      INNER JOIN
        metadata as mc ON (mc.item_id = p.id)
      INNER JOIN
        metadata as md ON (md.item_id = p.id)
      INNER JOIN
        metadata as mp ON (mp.item_id = p.id)
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
        mp.meta_value = $id
      AND
        mc.meta_key = 'class_id'
      AND
        mc.meta_value = 1
    SQL
  );
}

function getTiming($from, $to): string
{
  $from = date('h:i A', strtotime($from));
  $to   = date('h:i A', strtotime($to));

  return "<td>$from - $to</td>";
}

function getDay($day, $period)
{
  $query = query($day, $period->id);

  if ( mysqli_num_rows($query) > 0 )
  {
    while ( $timetable = mysqli_fetch_object($query) )
    {
      $teacher_id = get_metadata($timetable->item_id, 'teacher_id')[0]->meta_value;
      $subject_id = get_metadata($timetable->item_id, 'subject_id')[0]->meta_value;

      echo sprintf(
        <<<HTML
          <td>
            <p>
              <b>Teacher:</b> %s
              <br>
              <b>Subject:</b> %s
            </p>
          </td>
        HTML,
        get_user_data($teacher_id)->name, // get_user_data($teacher_id)[0]->name;
        get_post(['id' => $subject_id])->title
      );
    }

    return;
  }

  echo "<td>Unscheduled</td>";
}

function generateTableRows()
{
  $periods = get_posts(['type' => 'period', 'status' => 'publish']);
  $days    = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday','sunday'];

  foreach ( $periods as $period )
  {
    $from = get_metadata($period->id, 'from')[0]->meta_value;
    $to   = get_metadata($period->id, 'to')[0]->meta_value;

    echo "<tr>";

    echo getTiming($from, $to);

    foreach ( $days as $day )
    {
      getDay($day, $period);
    }

    echo "</tr>";
  }
}
?>

<?php // Home
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

<?php // Messages
$users = [
  [
    "name"    => "Brad Diesel",
    "photo"   => "photo1.png",
    "message" => [
      "content" => "Call me whenever you can...",
      "time"    => "4 Hours Ago"
    ]
  ],
  [
    "name"    => "John Pierce",
    "photo"   => "photo2.png",
    "message" => [
      "content" => "I got your message bro",
      "time"    => "4 Hours Ago"
    ]
  ],
  [
    "name"    => "Nora Silvester",
    "photo"   => "photo3.jpg",
    "message" => [
      "content" => "The subject goes here",
      "time"    => "4 Hours Ago"
    ]
  ]
];

?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="./index.css">

  <title>Teacher's Dashboard | School SysManager</title>
</head>
<body>
  <?php require_once __DIR__ . '/.components/header/index.php'; ?>

  <main>
    <div>
      <?php require_once __DIR__ . '/.components/study-materials/index.php'; ?>

      <?php require_once __DIR__ . '/.components/routines/index.php'; ?>

      <?php require_once __DIR__ . '/.components/home/index.php'; ?>
    </div>
  </main>

  <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

  <?php require_once __DIR__ . '/.components/aside/index.php'; ?>

  <?php require_once __DIR__ . '/.components/messages/index.php'; ?>

  <?php require_once __DIR__ . '/.components/notifications/index.php'; ?>

  <script defer type="module" src="/plugins/jquery/jquery.min.js"></script>
  <script defer type="module" src="./index.js"></script>
</body>
</html>