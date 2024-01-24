<section id="profile">
  <div>

    <header>
      <div>
        <h1>Profile</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Profile</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <section>
      <div>

        <header>
          <div>
            <h3>Parent's Information</h3>
          </div>
        </header>

        <div>
          <ul>
            <li>
              <div>
                <strong>
                  <span class="fas fa-book"></span>

                  <span>Education</span>
                </strong>

                <p>
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="fas fa-map-marker-alt"></span>

                  <span>Location</span>
                </strong>

                <p>
                  Malibu, California
                </p>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="fas fa-pencil-alt"></span>

                  <span>Skills</span>
                </strong>

                <ul>
                  <li>UI Design</li>
                  <li>Coding</li>
                  <li>Javascript</li>
                  <li>PHP</li>
                  <li>Node.js</li>
                </ul>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="far fa-file-alt"></span>

                  <span>Notes</span>
                </strong>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                </p>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </section>

    <section>
      <div>

        <header>
          <div>
            <h3>Parent's Information</h3>
          </div>
        </header>

        <div>
          <ul>
            <li>
              <div>
                <strong>
                  <span class="fas fa-book"></span>

                  <span>Education</span>
                </strong>

                <p>
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="fas fa-map-marker-alt"></span>

                  <span>Location</span>
                </strong>

                <p>
                  Malibu, California
                </p>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="fas fa-pencil-alt"></span>

                  <span>Skills</span>
                </strong>

                <ul>
                  <li>UI Design</li>
                  <li>Coding</li>
                  <li>Javascript</li>
                  <li>PHP</li>
                  <li>Node.js</li>
                </ul>
              </div>
            </li>

            <li>
              <div>
                <strong>
                  <span class="far fa-file-alt"></span>

                  <span>Notes</span>
                </strong>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                </p>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </section>

    <aside>
      <div>

        <header>
          <div>
            <figure>
              <img src="<?= SITE_URL ?>/assets/img/AdminLTELogo.png" alt="User profile picture" class="profile-user-img img-fluid img-circle">

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

  </div>
</section>