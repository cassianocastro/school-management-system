<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/sidebar.php';
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Periods</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-item active">Periods</li>
        </ol>
      </div>

    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Title</th>
            <th>From</th>
            <th>To</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count   = 1;
          $args    = ['type' => 'period', 'status' => 'publish'];
          $periods = get_posts($args);

          foreach ( $periods as $period ) :
            $from = get_metadata($period->id, 'from')[0]->meta_value;
            $to   = get_metadata($period->id, 'to')[0]->meta_value;
          ?>
          <tr>
            <td><?= $count++ ?></td>
            <td><?= $period->title ?></td>
            <td><?= date('h:i A', strtotime($from)) ?></td>
            <td><?= date('h:i A', strtotime($to)) ?></td>
          </tr>
          <?php endforeach; ?>
        </toby>
      </table>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>