<?php
$usermeta = get_user_metadata($std_id);
$class    = get_post(['id' => $usermeta['class']]);

$sql = <<<SQL
  SELECT
    m.meta_value AS month
  FROM
    posts AS p
  JOIN
    metadata AS m ON p.id = m.item_id
  WHERE
    p.type = 'payment'
  AND
    p.author = $user_id
  AND
    m.meta_key = 'month'
  AND
    year(p.publish_date) = 2023
SQL;

$query = mysqli_query($db_conn, $sql);
$paid_fees = [];

while ( $row = mysqli_fetch_object($query) )
{
  $paid_fees[] = strtolower($row->month);
}

// echo '<pre>', print_r($paid_fees), '</pre>';

$months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
$tr = [];

foreach ( $months as $key => $value )
{
  $highlight = '';

  $paid = false;

  if ( in_array($value, $paid_fees) )
  {
    $paid = true;
    $highlight = 'class="bg-success"';
  }

  // if ( date('F') == ucwords($value) )
  // {
  //   $highlight = 'class="bg-success"';
  // }

  $tr[] = sprintf(
    <<<HTML
      <tr>
        <td>%d</td>
        <td>%s</td>
        <td class="%s">%s</td>
        <td>%s</td>
      </tr>
    HTML,
    ++$key,
    ucwords($value),
    $highlight,
    ( $paid ) ? "Paid" : "Pending",
    (function() use ($paid, $value, $std_id): string {
      if ( $paid )
      {
        return <<<HTML
          <button type="button" title="View" onclick="location.assign('?action=view-invoice&month={$value}&std_id={$std_id}')">
            <span class="fa fa-eye fa-fw"></span>

            <span>View</span>
          </button>
        HTML;
      }

      $value = ucwords($value);

      return <<<HTML
        <button type="button" title="Pay now" data-month="{$value}">
          <span class="fa fa-money-check-alt fa-fw"></span>

          <span>Pay</span>
        </button>
      HTML;
    })()
  );
}
?>

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