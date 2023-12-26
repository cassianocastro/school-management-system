<section class="py-5">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">Our Teachers</h2>

    <p class="text-muted">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla
    </p>
  </div>

  <div class="container">
    <div class="row">
      <?php for ( $i = 0; $i < 6; ++$i ) : ?>
      <div class="col-lg-4 my-5">
        <div class="card">

          <div class="col-5 position-absolute" style="top: -50px">
            <img src="assets/img/placeholder.jpg" alt="" class="mw-100 border rounded-circle">
          </div>

          <div class="card-body pt-5 mt-4">
            <h5 class="card-title mb-0">Teacher's Name</h5>

            <p>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
            </p>

            <p class="card-text">
              <b>Courses:</b> 5
              <br>
              <b>Ratings:</b>
            </p>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>