<section id="periods">
  <div>

    <header>
      <div>
        <h1>Periods</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Periods</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <div>
      <table class="table">
        <thead>
          <tr>
            <th>S. No.</th>
            <th>Title</th>
            <th>From</th>
            <th>To</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count   = 1;
          $args    = ['type' => 'period', 'status' => 'publish'];
          $periods = get_posts($args);

          foreach ( $periods as $period ) :
            $from = get_metadata($period->id, 'from')[0]->meta_value;
            $to   = get_metadata($period->id, 'to')[0]->meta_value;
          ?>
          <tr>
            <td><?= $count++ ?></td>
            <td><?= $period->title ?></td>
            <td><?= date('h:i A', strtotime($from)) ?></td>
            <td><?= date('h:i A', strtotime($to)) ?></td>
          </tr>
          <?php endforeach; ?>
        </toby>
      </table>
    </div>
  </div>
</section>