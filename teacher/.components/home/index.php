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

$totals = [
  ["Students" , 2000, "photo1.png"],
  ["Teachers" , 50  , "photo2.png"],
  ["Courses"  , 100 , "photo3.jpg"],
  ["Inquiries", 10  , "photo4.jpg"]
];
?>

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

    <nav>
      <div>
        <ul>
          <?php foreach ( $totals as $total ) : ?>
            <li>
              <figure class="info-box">
                <img
                  src="/assets/img/<?= $total[2] ?>"
                  alt="Photo"
                  height="70"
                  width="70"
                >

                <figcaption>
                  <span><?= $total[0] ?></span>
                  <span><?= $total[1] ?></span>
                </figcaption>
              </figure>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <footer>
      <div>

        <p>
          Sign in Info
        </p>

        <form action="./" method="post">
          <div>
            <?php if ( empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at'] ) : ?>
              <button type="submit" name="sign-in">Sign in</button>
            <?php else: ?>
              <button type="submit" name="sign-out">Sign Out</button>
            <?php endif; ?>
          </div>
        </form>

      </div>
    </footer>

  </div>
</section>