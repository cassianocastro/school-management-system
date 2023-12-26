<?php require_once __DIR__ . '/header.php'; ?>

<section class="bg-light vh-100 d-flex">
  <div class="col-3 m-auto">

    <div class="card">
      <div class="card-body">
        <div class="border rounded-circle mx-auto d-flex" style="height: 100px; width: 100px;">
          <i class="fa fa-user text-light fa-3x m-auto"></i>
        </div>

        <form action="actions/login.php" method="post">
          <!-- Material input -->
          <div class="md-form">
            <input type="email" id="email" name="email" class="form-control">

            <label for="email">Your Email</label>
          </div>
          <!-- Material input -->
          <div class="md-form">
            <input type="password" id="password" name="password" class="form-control">

            <label for="password">Your Password</label>
          </div>

          <div class="text-center">
            <button type="submit" name="login" class="btn btn-secondary">Login</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>