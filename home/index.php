<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--
    1. Font Awesome
    2. Google Fonts
    3. Bootstrap core CSS
    4. Material Design Bootstrap
  -->
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">

  <style>
    .btn
    {
      margin: 0;
    }

    .course-image
    {
      object-fit: cover;
      object-position: center;

      height: 170px !important;
      width: 100%;
    }
  </style>

  <title>School Management System</title>
</head>
<body>
  <?php require_once __DIR__ . '/../includes/config.php'; ?>

  <?php require_once __DIR__ . '/header.php';?>

  <div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
    <div class="container-fluid my-2">
      <div class="row">

        <div class="col-lg-6 my-auto">
          <h1 class="display-3 font-weight-bold">Addmission Open for 2021-2022</h1>
          <p class="py-lg-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro aperiam similique error, <br> iste molestiae dignissimos odit voluptat</p>
          <a href="" class="btn btn-lg btn-primary">Call to Action</a>
        </div>

        <div class="col-lg-6">
          <div class="col-lg-8 mx-auto card shadow-lg">
            <div class="card-body py-5">
              <h3>Inquiry Form</h3>

              <form action="" method="post" class="">
                <!-- Material input -->
                <div class="md-form">
                  <input type="text" id="form1" class="form-control">

                  <label for="form1">Your Name</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                  <input type="email" id="email" class="form-control">

                  <label for="email">Your Email</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                  <input type="text" id="mobile" class="form-control">

                  <label for="mobile">Your Mobile</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                  <!-- <input type="text" id="class" class="form-control"> -->
                  <textarea name="" id="message" class="form-control md-textarea" rows="3"></textarea>

                  <label for="message">Your Query</label>
                </div>

                <button class="btn btn-primary btn-block">Submit Form</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- About us -->
  <section class="py-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 py-5 ">
          <h2 class="font-weight-bold">
            About
            <br>
            School Management System
          </h2>

          <div class="pr-5">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque quidem id ad dolores iusto nobis sunt, atque, eligendi nesciunt ipsa aliquam mollitia nemo magnam quae adipisci libero voluptatum omnis vel. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo dicta ipsum ea sint quisquam sit dignissimos numquam. Velit aliquid necessitatibus id adipisci officiis nobis voluptates maiores consectetur, sunt nisi? Commodi.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quos ab, recusandae repellendus cum quasi totam saepe sit earum tenetur modi vitae explicabo, neque, consequatur aut ipsam dolore magni laudantium?</p>
          </div>

          <a href="about-us.php" class="btn btn-secondary">Know More</a>
        </div>

        <div class="col-lg-6" style="background:url(./assets/images/still-life-851328_1280.jpg)">

        </div>

      </div>
    </div>
  </section>

  <!-- Our Courses -->
  <section class="py-5 bg-light">
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
              <img src="./dist/uploads/<?= $course->image ?>" alt="" class="img-fluid rounded-top course-image">
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

  <!-- Teachers -->
  <section class="py-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Our Teachers</h2>

      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>

    <div class="container">
      <div class="row">
        <?php for ( $i = 0; $i < 6; ++$i ) { ?>
        <div class="col-lg-4 my-5">
          <div class="card">

            <div class="col-5 position-absolute" style="top:-50px">
              <img src="./assets/images/placeholder.jpg" alt="" class="mw-100 border rounded-circle">
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
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Acheivements -->
  <section class="py-5 text-white" style="background:#3923a7">
    <div>
      <div class="container">
        <div class="row">

          <div class="col-lg-6 pr-5">
            <h2>Acheivements</h2>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, commodi laboriosam. Ullam aliquam dicta officiis accusamus.</p>

            <img src="./assets/images/still-life-851328_1280.jpg" alt="" class="img-fluid rounded">
          </div>

          <div class="col-lg-6 my-auto">
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">What Pepole Says</h2>

      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="border rounded position-relative">
            <div class="p-4 text-center">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
            </div>

            <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
          </div>

          <div class="text-center mt-n2">
            <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">

            <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>

            <p><i>Designation</i></p>
          </div>
        </div>

        <div class="col-6">
          <div class="border rounded position-relative">
            <div class="p-4 text-center">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
            </div>

            <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
          </div>

          <div class="text-center mt-n2">
            <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">

            <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>

            <p><i>Designation</i></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require_once __DIR__ . '/footer.php'; ?>

  <!--
    1. JQuery
    2. Bootstrap tooltips
    3. Bootstrap core JavaScript
    4. MDB core JavaScript
  -->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>
</html>