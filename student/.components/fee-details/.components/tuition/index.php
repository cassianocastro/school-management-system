<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/../../../../../includes/config.php';
require_once __DIR__ . '/../../../../../actions/student.php';

$success_msg =  false;
$user_id     = $_SESSION['user_id'] ?? "";

if ( isset($_POST['form_submitted']) )
{
  $status    = $_POST["status"] ?? 'success';
  $firstname = $_POST["firstname"] ?? '';
  $amount    = $_POST["amount"] ?? '';
  $email     = $_POST["email"] ?? '';
  $month     = $_POST["month"] ?? '';
  $title     = "$month - Fee";

  $query = mysqli_query($db_conn, "INSERT INTO posts (title, type, description, status, author, parent) VALUES ('$title', 'payment','', '$status', $user_id, 0)");

  if ( $query )
  {
    $item_id = mysqli_insert_id($db_conn);
  }

  $payment_data = [
    'amount'     => $amount,
    'status'     => $status,
    'student_id' => $user_id,
    'month'      => $month
  ];

  foreach ( $payment_data as $key => $value )
  {
    mysqli_query($db_conn, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ('$item_id', '$key', '$value')");
  }

  $success_msg = true;
}
?>

<?php // Table
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
        // onclick="location.assign('?action=view-invoice&month={$value}&std_id={$std_id}')"
        return <<<HTML
          <button type="button" title="View">
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

<?php // Modal
// $student = new class("Cassiano Castro", "example@example.com")
// {
//   public $name;
//   public $email;

//   public function __construct(string $name, string $email)
//   {
//     $this->name = $name;
//     $this->email = $email;
//   }
// };
?>

<?php
// if ( isset($_GET['action']) and $_GET['action'] == 'view-invoice' )
// {}
// else
// {}
require_once __DIR__ . '/.components/table/index.php';

require_once __DIR__ . '/.components/invoice/index.php';

require_once __DIR__ . '/.components/modal/index.php';