<header>
  <div>

    <nav>
      <div>
        <ul>
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button" href="#">
              <span class="fas fa-bars"></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              Home
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              Contact
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <form action="./" method="post" autocomplete="off">
      <div>
        <label>
          <span>Search</span>

          <input type="search" placeholder="Search" aria-label="Search">
        </label>

        <button type="submit" title="Search">
          <span class="fas fa-search"></span>
        </button>
      </div>
    </form>

    <menu>
      <!-- Messages Dropdown Menu -->
      <li class="dropdown">
        <button type="button" title="Comments" data-toggle="dropdown">
          <span class="far fa-comments"></span>

          <span>3</span>
        </button>

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
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
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
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
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
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
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
      <li class="dropdown">
        <button type="button" title="Notifications" data-toggle="dropdown">
          <span class="far fa-bell"></span>

          <span>15</span>
        </button>

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

      <li>
        <button type="button" title="Logout">
          <span class="fa fa-sign-out-alt"></span>

          <span>Logout</span>
        </button>
      </li>
    </menu>

  </div>
</header>