<section id="timetable">
  <div>

    <header>
      <div>
        <h1>Time Table</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Time Table</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table">
      <thead>
        <tr>
          <th>Timing</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
          <th>Sunday</th>
        </tr>
      </thead>
      <tbody>
        <?php generateTableRows(); ?>
      </tbody>
    </table>

  </div>
</section>