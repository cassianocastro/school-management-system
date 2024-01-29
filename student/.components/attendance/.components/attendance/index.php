<section id="student-attendance">
  <div>

    <header>
      <div>
        <h1>Manage Student Attendance</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Attendance</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table>
      <thead>
        <tr>
          <th colspan="4">Student Details</th>
        </tr>
        <tr>
          <th colspan="3">Name: <?= get_users(['id' => $std_id])[0]->name ?></th>
          <th>Class: <?= get_post(['id' => get_user_metadata($std_id)['class']])->title; ?></th>
        </tr>
        <tr>
          <td>Date</td>
          <td>Status</td>
          <td>Sing In Time</td>
          <td>Sing Out Time</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( unserialize($att->attendance_value) as $date => $value ) : ?>
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