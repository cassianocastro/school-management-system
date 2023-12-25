<nav class="navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" type="text/html" hreflang="en" href="http://<?= $_SERVER["SERVER_NAME"] ?>">
    <b>SMS</b>
  </a>

  <button type="button"
    data-target="#navbarSupportedContent-333"
    data-toggle="collapse"
    aria-controls="navbarSupportedContent-333"
    aria-expanded="false"
    aria-label="Toggle navigation"
    class="navbar-toggler">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" type="text/html" hreflang="en" href="http://<?= $_SERVER["SERVER_NAME"] ?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" type="text/html" hreflang="en" href="#about">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" type="text/html" hreflang="en" href="#courses">Courses</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" type="text/html" hreflang="en" href="#achievements">Achievements</a>
      </li>

      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>

        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      -->
    </ul>

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <?php if ( isset($_SESSION['login']) ) : ?>
          <a id="navbarDropdownMenuLink-333"
            aria-haspopup="true"
            aria-expanded="false"
            data-toggle="dropdown"
            class="nav-link dropdown-toggle">
            <i class="fas fa-user mr-2"></i>

            Account
          </a>

          <div aria-labelledby="navbarDropdownMenuLink-333" class="dropdown-menu dropdown-menu-right dropdown-default">
            <a class="dropdown-item" type="text/html" hreflang="en" href="/admin">Dashboard</a>
            <a class="dropdown-item" type="text/html" hreflang="en" href="#">Another action</a>
            <a class="dropdown-item" type="text/html" hreflang="en" href="/actions/logout.php">Logout</a>
          </div>
        <?php else: ?>
          <a href="/login" class="nav-link">
            <i class="fa fa-user mr-2"></i>

            User login
          </a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>