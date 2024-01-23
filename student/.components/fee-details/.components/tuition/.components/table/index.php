<section class="content">
  <div class="container-fluid">

    <?php if ($success_msg) : ?>
      <div class="alert alert-success" role="alert">
        Payment has been completed, Thank You!
      </div>
    <?php endif; ?>

    <header>
      <div>
        <h1>Manage Student Fee Details</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Student Fee Details</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table table-bordered">
      <caption>
        Tution Fee
      </caption>
      <thead>
        <tr>
          <th colspan="4">Student Detail</th>
        </tr>
        <tr>
          <th colspan="3">
            <strong>Name: </strong>

            <?= get_users(['id' => $std_id])[0]->name ?>
          </th>
          <th>
            <strong>Class: </strong>

            <?= $class->title ?>
          </th>
        </tr>
        <tr>
          <th>S. No.</th>
          <th>Month</th>
          <th>Fee Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $tr as &$r ): ?>
          <?= $r ?>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</section>