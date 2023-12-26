<?php
// session_start();

$site_url = "http://{$_SERVER['SERVER_NAME']}/";

if ( isset($_SESSION['login']) )
{
  if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'parent' )
  {
    $user_type = $_SESSION['user_type'];

    header("Location: /sms-project/$user_type/dashboard.php");
  }
}
else
{
  header("Location: ../login.php");
}

$std_id = $_SESSION['user_id'];
$parent = get_user_data($std_id);
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="#" data-widget="pushmenu" role="button" class="nav-link">
        <i class="fas fa-bars"></i>
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="profile.php" class="nav-link">
        Profile
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a href="#" class="nav-link" data-toggle="dropdown">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel

                <span class="float-right text-sm text-danger">
                  <i class="fas fa-star"></i>
                </span>
              </h3>

              <p class="text-sm">
                Call me whenever you can...
              </p>

              <p class="text-sm text-muted">
                <i class="far fa-clock mr-1"></i> 4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce

                <span class="float-right text-sm text-muted">
                  <i class="fas fa-star"></i>
                </span>
              </h3>

              <p class="text-sm">
                I got your message bro
              </p>

              <p class="text-sm text-muted">
                <i class="far fa-clock mr-1"></i> 4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester

                <span class="float-right text-sm text-warning">
                  <i class="fas fa-star"></i>
                </span>
              </h3>

              <p class="text-sm">
                The subject goes here
              </p>

              <p class="text-sm text-muted">
                <i class="far fa-clock mr-1"></i> 4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item dropdown-footer">
          See All Messages
        </a>
      </div>
    </li>

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link">
        <i class="far fa-bell"></i>

        <span class="badge badge-warning navbar-badge">15</span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages

          <span class="float-right text-muted text-sm">3 mins</span>
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests

          <span class="float-right text-muted text-sm">12 hours</span>
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports

          <span class="float-right text-muted text-sm">2 days</span>
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item dropdown-footer">
          See All Notifications
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a title="Logout" href="../actions/logout.php" class="nav-link">
        Logout

        <i class="fa fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>