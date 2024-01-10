<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" role="button" href="#">
        <span class="fas fa-bars"></span>
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="<?= $site_url ?>/student/.components/profile">
        Profile
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="far fa-comments"></span>

        <span class="badge badge-danger navbar-badge">3</span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a class="dropdown-item" href="#">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

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
                <i class="far fa-clock mr-1"></i>

                4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

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
                <i class="far fa-clock mr-1"></i>

                4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#">
          <!-- Message Start -->
          <div class="media">
            <img src="<?= $site_url ?>/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

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
                <i class="far fa-clock mr-1"></i>

                4 Hours Ago
              </p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item dropdown-footer" href="#">
          See All Messages
        </a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="far fa-bell"></span>

        <span class="badge badge-warning navbar-badge">15</span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#">
          <span class="fas fa-envelope mr-2"></span>

          <span>4 new messages</span>

          <span class="float-right text-muted text-sm">3 mins</span>
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#">
          <span class="fas fa-users mr-2"></span>

          <span>8 friend requests</span>

          <span class="float-right text-muted text-sm">12 hours</span>
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#">
          <span class="fas fa-file mr-2"></span>

          <span>3 new reports</span>

          <span class="float-right text-muted text-sm">2 days</span>
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item dropdown-footer" href="#">
          See All Notifications
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" title="Logout" href="<?= $site_url ?>/actions/logout.php">
        <span>Logout</span>

        <span class="fa fa-sign-out-alt"></span>
      </a>
    </li>
  </ul>
</nav>