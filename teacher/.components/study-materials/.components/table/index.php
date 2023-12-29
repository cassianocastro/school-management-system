<!-- Info boxes -->
<div class="card">
  <div class="card-header py-2">
    <h3 class="card-title">Study Materials</h3>

    <div class="card-tools">
      <a href="?action=add-new" class="btn btn-success btn-xs">
        <i class="fa fa-plus mr-2"></i>

        Add New
      </a>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive bg-white">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Title</th>
            <th>Attachment</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count = 1;
          $query = mysqli_query($db_conn, "SELECT * FROM `posts` WHERE `type` = 'study-material' AND author = 1");

          while ( $att = mysqli_fetch_object($query) ) :
            $class_id        = get_metadata($att->id, 'class')[0]->meta_value;
            $class           = get_post(['id' => $class_id]);
            $subject_id      = get_metadata($att->id, 'subject')[0]->meta_value;
            $subject         = get_post(['id' => $subject_id]);
            $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

            // $file_attachment = get_post(['id' => $file_attachment]);
            // echo '<pre>', print_r($class), '</pre>';
          ?>
            <tr>
              <td><?= $count++ ?></td>
              <td><?= $att->title ?></td>
              <td><a href="<?= "$site_url/assets/uploads/$file_attachment" ?>">Download File</a></td>
              <td><?= $class->title ?></td>
              <td><?= $subject->title ?></td>
              <td><?= $att->publish_date ?></td>
            </tr>
          <?php endwhile; ?>
        </toby>
      </table>
    </div>
  </div>
</div>