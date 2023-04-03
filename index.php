<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <h1 class="text-center display-1 pb-5">LOGIN</h1>

        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <?php
            if (isset($_GET['login'])) {
              $email = $_GET['email'];
              $password = $_GET['password'];
              $host = 'localhost:8111';
              $username = 'root';
              $DBpassword = '';
              $dbname = 'loginpage';

              // Create a database connection
              $conn = mysqli_connect($host, $username, $DBpassword, $dbname);

              // Check if the connection is successful
              if (!$conn) {
                die('Connection failed: ' . mysqli_connect_error());
              } elseif ($conn) {
                $sql = "SELECT * FROM singup  WHERE email = '$email' AND password = '$password'";
                $adminEmail = 'admin@admin';
                $adminPass = 'admin';

                $query = mysqli_query($conn, $sql);
                $num_row = mysqli_num_rows($query);
                if ($email == $adminEmail && $password == $adminPass) {
                  header('Location: ./admin');
                } elseif ($num_row > 0) {
                  header('Location: https://github.com/saidurrahmanmisket');
                } else {
                  echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Password or email is wrong</h3>';
                }

                mysqli_close($conn);
              }
            }
            ?>
            <form action="" method="get">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form1Example13" class="form-control form-control-lg"  value="<?php echo (isset($_GET['email']) ? $_GET['email'] : '') ?>" />
                <label class="form-label" for="form1Example13">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example23">Password</label>
              </div>

              <div class="d-flex justify-content-around align-items-center mb-4">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                  <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
                <a href="#!">Forgot password?</a>
              </div>

              <!-- Submit button -->
              <button type="submit" name="login" class="btn me-5 btn-primary btn-lg btn-block">Sign in</button>
              <a class="btn btn-info ms-5 btn-lg btn-block" href="singup.php">Sing up</a>

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
              </div>

              <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
                <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
              </a>
              <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
                <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>