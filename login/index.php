<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="preload" as="style" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">
  <link rel="preload" as="style" href="./index.css">

  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
  <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">

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
  <link rel="stylesheet" type="text/css" href="./index.css">

  <base href="http://<?= $_SERVER['SERVER_NAME'] ?>">

  <title>Login | School SysManager</title>
</head>
<body>
  <section class="bg-light vh-100 d-flex">
    <div class="col-3 m-auto">
      <div class="card">
        <div class="card-body">
          <div class="border rounded-circle mx-auto d-flex" style="width: 100px;height:100px">
            <i class="fa fa-user text-light fa-3x m-auto"></i>
          </div>

          <form action="actions/login.php" method="post">
            <!-- Material input -->
            <div class="md-form">
              <input type="text" id="email" name="email" class="form-control">

              <label for="email">Your Email</label>
            </div>

            <!-- Material input -->
            <div class="md-form">
              <input type="password" id="password" name="password" class="form-control">

              <label for="password">Your Password</label>
            </div>

            <div class="text-center">
              <button class="btn btn-secondary" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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