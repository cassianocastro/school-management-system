<aside>
  <div>

    <header>
      <div>
        <figure>
          <img
            src="<?= SITE_URL ?>/assets/img/AdminLTELogo.png"
            alt="User profile picture"
            height="100"
            width="100"
          >

          <figcaption>
            <h3><?= $student->name ?></h3>
          </figcaption>
        </figure>

        <p>
          <?= $stdmeta['address'] ?>,
          <?= $stdmeta['state'] ?>,
          <?= $stdmeta['country'] ?>
          (<?= $stdmeta['zip'] ?>)
        </p>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <li>
            <p>
              <strong>
                <span class="fa-fw fas fa-chalkboard"></span>

                <span>Class</span>
              </strong>

              <span><?= $class->title ?> (<?= is_null($section) ? "" : $section->title ?>)</span>
            </p>
          </li>

          <li>
            <p>
              <strong>
                <span class="fa-fw fas fa-calendar-alt"></span>

                <span>DOB</span>
              </strong>

              <span><?= $stdmeta['dob'] ?></span>
            </p>
          </li>

          <li>
            <p>
              <strong>
                <span class="fa-fw fas fa-phone-square"></span>

                <span>Mobile</span>
              </strong>

              <span><?= $stdmeta['mobile'] ?></span>
            </p>
          </li>
        </ul>
      </div>
    </nav>

  </div>
</aside>