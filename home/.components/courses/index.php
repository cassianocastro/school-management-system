<section id="courses" class="py-5 bg-light">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">Our Courses</h2>

    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
  </div>

  <div class="container">
    <div class="row">

      <?php
      $query = mysqli_query($db_conn, "SELECT * FROM courses ORDER BY id DESC LIMIT 0, 8");

      while ( $course = mysqli_fetch_object($query) ) :
      ?>
      <div class="col-lg-3 mb-4">
        <div class="card">
          <div>
            <img src="assets/uploads/<?= $course->image ?>" alt="" class="img-fluid rounded-top course-image">
          </div>

          <div class="card-body">
            <b><?= $course->name ?></b>

            <p class="card-text">
              <b>Duration:</b> <?= $course->duration ?>
              <br>
              <b>Price:</b> 4000/- Rs
            </p>

            <button class="btn btn-block btn-primary btn-sm">Enroll Now</button>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>