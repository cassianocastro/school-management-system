<section>
  <div>

    <header>
      <div>
        <h1>Time Table</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
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
</section>