<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="preload" as="style" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="preload" as="style" href="../assets/css/reset.css">
  <link rel="preload" as="style" href="./index.css">

  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
  <link rel="stylesheet" type="text/css" href="./index.css">

  <base href="http://<?= $_SERVER['SERVER_NAME'] ?>">

  <title>Login | School SysManager</title>
</head>
<body>
  <main>
    <div>

      <section>
        <div>

          <header>
            <div>
              <h1 class="fa fa-user"></h1>
            </div>
          </header>

          <form action="actions/login.php" method="post" autocomplete="off" spellcheck="false">
            <div>
              <fieldset>
                <div>
                  <label>
                    <span>Your Email</span>

                    <input type="email" name="email" placeholder="user@email.com" required>
                  </label>

                  <label>
                    <span>Your Password</span>

                    <input type="password" name="password" placeholder="p@55w0rd" required>
                  </label>
                </div>
              </fieldset>

              <menu>
                <li><button type="reset" name="reset" title="Clear fields">Reset</button></li>
                <li><button type="submit" name="login" title="Login">Submit</button></li>
              </menu>
            </div>
          </form>

        </div>
      </section>

    </div>
  </main>
</body>
</html>