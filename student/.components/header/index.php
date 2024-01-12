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

  </div>
</header>