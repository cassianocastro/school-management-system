<header>
  <div>
    <menu>
      <li>
        <button type="button" title="Sidebar">
          <span class="fas fa-bars"></span>
        </button>
      </li>

      <li>
        <button type="button" title="Messages">
          <span class="far fa-comments"></span>

          <span>3</span>
        </button>
      </li>

      <li>
        <button type="button" title="Notifications">
          <span class="far fa-bell"></span>

          <span>15</span>
        </button>
      </li>

      <li>
        <button type="button" title="Profile" onclick="location.assign('<?= $site_url ?>/student/.components/profile')">
          Profile
        </button>
      </li>

      <li>
        <button type="button" title="Logout" onclick="location.assign('<?= $site_url ?>/actions/logout.php')">
          <span class="fa fa-sign-out-alt"></span>

          <span>Logout</span>
        </button>
      </li>
    </menu>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
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
    </ul>

  </div>
</header>