<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

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

<section id="timetable">
  <div>

    <header>
      <div>
        <h1>Time Table</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Time Table</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table">
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
        <?php generateTableRows(); ?>
      </tbody>
    </table>

  </div>
</section>