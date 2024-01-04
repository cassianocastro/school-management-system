<?php

if ( isset($_POST['submit']) )
{
  $title       = $_POST['title'];
  $description = $_POST['description'];
  $class       = $_POST['class'];
  $subject     = $_POST['subject'];
  $file        = $_FILES["attachment"]["name"];
  $today       = date('Y-m-d');

  $target_dir  = SITE_URL . "/assets/uploads/";
  $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
  // $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check if file already exists
  if ( file_exists($target_file) )
  {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ( $_FILES["attachment"]["size"] > 500000 )
  {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  // if ( $imageFileType != "jpg"
  // && $imageFileType != "png"
  // && $imageFileType != "jpeg"
  // && $imageFileType != "gif" )
  // {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   $uploadOk = 0;
  // }

  // Check if $uploadOk is set to 0 by an error
  if ( $uploadOk == 0 )
  {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
  else
  {
    if ( move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file) )
    {
      // mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));

      $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `description`, `type`, `status`, `parent`, `author`) VALUES ('$title', '$description', 'study-material', 'publish', 0, 1)");

      if ( $query )
      {
        $item_id = mysqli_insert_id($db_conn);
      }

      $metadata = [
        'class' => $class,
        'subject' => $subject,
        'file_attachment' => $file
      ];

      foreach ( $metadata as $key => $value )
      {
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
      }

      $_SESSION['success_msg'] = 'Course has been uploaded successfuly';

      header('Location: study-materials.php');

      exit;
    }
    else
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  // ob_start();
  // ob_end_flush();
}

$classes  = get_posts(['type' => 'class', 'status' => 'publish']);
$subjects = get_posts(['type' => 'subject', 'status' => 'publish']);


$materials = [];
$count     = 1;
$query     = mysqli_query(
  $db_conn,
  <<<SQL
    SELECT
      *
    FROM
      posts
    WHERE
      type = 'study-material'
    AND
      author = 1
  SQL
);

while ( $att = mysqli_fetch_object($query) )
{
  $class_id        = get_metadata($att->id, 'class')[0]->meta_value;
  $class           = get_post(['id' => $class_id]);
  $subject_id      = get_metadata($att->id, 'subject')[0]->meta_value;
  $subject         = get_post(['id' => $subject_id]);
  $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

  // $file_attachment = get_post(['id' => $file_attachment]);
  // echo '<pre>', print_r($class), '</pre>';

  $materials[] = [
    "count"         => $count++,
    "att_title"     => $att->title,
    "att_pubdate"   => $att->publish_date,
    "class_title"   => $class->title,
    "subject_title" => $subject->title,
    "attachment"    => SITE_URL . "/assets/uploads/$file_attachment"
  ];
}
?>

<section id="sm">
  <div>

    <header>
      <div>
        <h1>Study Materials</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Study Materials</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <?php foreach ( $materials as $material ) : ?>
            <li>
              <?php require __DIR__ . '/.components/table/index.php'; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <footer>
      <div>
        <button type="button" title="Add new study material">
          <span class="fa fa-plus"></span>

          <span>Add New</span>
        </button>
      </div>
    </footer>

    <?php require_once __DIR__ . '/.components/form/index.php'; ?>
  </div>
</section>