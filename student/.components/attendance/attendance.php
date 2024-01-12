<?php
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
$row   = mysqli_fetch_object($query);
?>

<section>
  <div>

    <header>
      <div>
        <h1>Manage Student Attendance</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li><a href="#">Attendance</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table">
      <thead>
        <tr>
          <th colspan="4">Student Details</th>
        </tr>
        <tr>
          <th colspan="3">Name: <?= get_users(['id' => $std_id])[0]->name ?></th>
          <th>Class: <?= $class->title ?></th>
        </tr>
        <tr>
          <td>Date</td>
          <td>Status</td>
          <td>Sing In Time</td>
          <td>Sing Out Time</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( unserialize($row->attendance_value) as $date => $value ) : ?>
          <tr>
            <td><?= $date ?></td>
            <td><?= ($value['signin_at']) ? 'Present' : 'Absent' ?></td>
            <td><?= ($value['signin_at']) ? date('d-m-yyy h:i:s', $value['signin_at']) : '' ?></td>
            <td><?= ($value['signout_at']) ? date('d-m-yyy h:i:s', $value['signout_at']) : '' ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</section>