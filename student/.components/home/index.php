<section>
  <div>

    <header>
      <div>
        <h1>Dashboard</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <?php foreach ( $totals as $total ) : ?>
            <li>
              <figure class="info-box">
                <img
                  src="/assets/img/<?= $total[2] ?>"
                  alt="Photo"
                  height="70"
                  width="70"
                >

                <figcaption>
                  <span><?= $total[0] ?></span>
                  <span><?= $total[1] ?></span>
                </figcaption>
              </figure>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <footer>
      <div>
        <p>
          Sign in Info
        </p>

        <form action="./" method="post">
          <div>
            <?php if ( empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at']) : ?>
              <button name="sign-in" class="btn btn-primary">Sign in</button>
            <?php else: ?>
              <button name="sign-out" class="btn btn-primary">Sign Out</button>
            <?php endif; ?>
          </div>
        </form>
      </div>
    </footer>

  </div>
</section>