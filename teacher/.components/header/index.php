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
      <li class="dropdown">
        <button type="button" title="Comments" data-toggle="dropdown">
          <span class="far fa-comments"></span>

          <span>3</span>
        </button>
      </li>

      <li class="dropdown">
        <button type="button" title="Notifications" data-toggle="dropdown">
          <span class="far fa-bell"></span>

          <span>15</span>
        </button>

        <!-- Notifications Dropdown Menu -->
        <?php require_once __DIR__ . '/../notifications/index.php'; ?>
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