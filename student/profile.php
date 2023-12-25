<?php
require '../includes/config.php';
require 'header.php';
require 'sidebar.php';
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>

    </div>
  </div>
</div>

<?php
$class   = get_post(['id' => $stdmeta['class']]);
$section = get_post(['id' => $stdmeta['section']]);
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img src="../dist/img/AdminLTELogo.png" alt="User profile picture" class="profile-user-img img-fluid img-circle">
            </div>

            <h3 class="profile-username text-center"><?= $student->name; ?></h3>

            <p class="text-muted text-center">
              <?= $stdmeta['address']; ?>,
              <?= $stdmeta['state']; ?>,
              <?= $stdmeta['country']; ?>
              (<?= $stdmeta['zip']; ?>)
            </p>

            <hr>

            <p>
              <strong>
                <i class="fa-fw fas fa-chalkboard mr-1"></i>

                Class
              </strong>

              <span class="text-muted float-right">
                <?= $class->title; ?> (<?= $section->title; ?>)
              </span>
            </p>

            <hr>

            <p>
              <strong>
                <i class="fa-fw fas fa-calendar-alt mr-1"></i>

                DOB
              </strong>

              <span class="text-muted float-right">
                <?= $stdmeta['dob']; ?>
              </span>
            </p>

            <hr>

            <p>
              <strong>
                <i class="fa-fw fas fa-phone-square mr-1"></i>

                Mobile
              </strong>

              <span class="text-muted float-right">
                <?= $stdmeta['mobile']; ?>
              </span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Parent's Information</h3>
          </div>

          <div class="card-body">
            <strong>
              <i class="fas fa-book mr-1"></i>

              Education
            </strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong>
              <i class="fas fa-map-marker-alt mr-1"></i>

              Location
            </strong>

            <p class="text-muted">
              Malibu, California
            </p>

            <hr>

            <strong>
              <i class="fas fa-pencil-alt mr-1"></i>

              Skills
            </strong>

            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong>
              <i class="far fa-file-alt mr-1"></i>

              Notes
            </strong>

            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
            </p>
          </div>
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Parent's Information</h3>
          </div>

          <div class="card-body">
            <strong>
              <i class="fas fa-book mr-1"></i>

              Education
            </strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong>
              <i class="fas fa-map-marker-alt mr-1"></i>

              Location
            </strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong>
              <i class="fas fa-pencil-alt mr-1"></i>

              Skills
            </strong>

            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong>
              <i class="far fa-file-alt mr-1"></i>

              Notes
            </strong>

            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php require 'footer.php'; ?>