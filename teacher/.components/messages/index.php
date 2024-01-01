<?php
$users = [
  [
    "name"    => "Brad Diesel",
    "photo"   => "user1-128x128.jpg",
    "message" => [
      "content" => "Call me whenever you can...",
      "time"    => "4 Hours Ago"
    ]
  ],
  [
    "name"    => "John Pierce",
    "photo"   => "user8-128x128.jpg",
    "message" => [
      "content" => "I got your message bro",
      "time"    => "4 Hours Ago"
    ]
  ],
  [
    "name"    => "Nora Silvester",
    "photo"   => "user3-128x128.jpg",
    "message" => [
      "content" => "The subject goes here",
      "time"    => "4 Hours Ago"
    ]
  ]
];

?>

<aside id="messages">
  <div>

    <header>
      <div>
        <h3>Messages</h3>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <?php foreach ( $users as $user ) : ?>
            <li>
              <a title="Chat with <?= $user["name"] ?>" type="text/html" hreflang="en" href="#">
                <article class="msg">
                  <div>
                    <header>
                      <div>
                        <figure>
                          <img
                            src="<?= SITE_URL ?>/assets/img/<?= $user["photo"] ?>"
                            alt="User Avatar"
                            height="50"
                            width="50"
                          >

                          <figcaption>
                            <h4>
                              <span><?= $user["name"] ?></span>

                              <span class="fas fa-star"></span>
                            </h4>
                          </figcaption>
                        </figure>
                      </div>
                    </header>

                    <p>
                      <?= $user["message"]["content"] ?>
                    </p>

                    <footer>
                      <div>
                        <p>
                          <span class="far fa-clock"></span>

                          <?= $user["message"]["time"] ?>
                        </p>
                      </div>
                    </footer>
                  </div>
                </article>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <footer>
      <div>
        <button type="button" title="See all messages">See All</button>
      </div>
    </footer>

  </div>
</aside>