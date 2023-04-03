<?php

?>
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
                <h1 class="text-center display-1 pb-5">Registration</h1>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="" method="get">
                            <?php
                            if (isset($_GET['singUp'])) {
                                $name = $_GET['name'];
                                $email = $_GET['email'];
                                if (isset($_GET['gender'])) {

                                    $gender = $_GET['gender'];
                                }
                                $password = $_GET['password'];
                                $confirmPassword = $_GET['cpassword'];


                                $host = 'localhost:8111';
                                $username = 'root';
                                $DBpassword = '';
                                $dbname = 'loginpage';

                                // Create a database connection
                                $conn = mysqli_connect($host, $username, $DBpassword, $dbname);
                                $sqlEmail = "SELECT * FROM singup WHERE email = '$email'";
                                $query = mysqli_query( $conn, $sqlEmail);
                                $num_rows = mysqli_num_rows($query);
                                // Check if the connection is successful
                                if (!$conn) {
                                    die('Connection failed: ' . mysqli_connect_error());
                                }

                                if ($num_rows > 0) {
                                    echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">This email already register</h3>';
                                }
                                elseif ((empty($name)) || (($name) == null)) {
                                    echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Name fill is empty</h3>';
                                } elseif ((empty($email)) || (($email) == null)) {
                                    echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Email can\'t be empty</h3>';
                                } elseif ((empty($password && $confirmPassword)) || (($password && $confirmPassword) == null)) {
                                    echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Password can\'t be empty</h3>';
                                } elseif ((empty($gender)) || (($gender) == null)) {
                                    echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Gender can\'t be empty</h3>';
                                } else {
                                    if ($name && $email && $password && $gender) {

                                        if ((!preg_match('/@/', $email)) || (!preg_match('/./', $email))) {
                                            echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Input a valid email</h3>';
                                        } elseif ($password !== $confirmPassword) {
                                            echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Password don\'t match</h3>';
                                        } elseif (!preg_match('/\d/', $password)) {
                                            echo '<h3 class="text-center bg-dark rounded-5 p-2 text-danger">Password need at lest one number</h3>';
                                        }
                                         else {


                                            if ($conn) {
                                                $sql = "INSERT INTO singup VALUES(NULL,'$name', '$email', '$password', '$gender');";
                                                mysqli_query($conn, $sql);
                                                echo 'Data Submit';
                                                header('Location: index.php');
                                                mysqli_close($conn);
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?php echo (isset($_GET['name']) ? $_GET['name'] : '') ?>" />
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" value="<?php echo (isset($_GET['email']) ? $_GET['email'] : '') ?>" />
                                <label class="form-label" for="form1Example13">Email address</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" value="<?php echo (isset($_GET['password']) ? $_GET['password'] : '') ?>" />
                                <label class="form-label" for="form1Example23">Password</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="cpassword" id="form1Example24" class="form-control form-control-lg" value="<?php echo (isset($_GET['cpassword']) ? $_GET['cpassword'] : '') ?>" />
                                <label class="form-label" for="form1Example24">Confirm Password</label>
                            </div>
                            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                <h6 class="mb-0 me-4">Gender: </h6>

                                <div class="form-check form-check-inline mb-0 me-4">
                                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="option1" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'option1') echo 'checked'; ?> />
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>
                                <div class="form-check form-check-inline mb-0 me-4">
                                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="option2" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'option2') echo 'checked'; ?> />
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>


                                <div class="form-check form-check-inline mb-0">
                                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="option3" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'option3') echo 'checked'; ?> />
                                    <label class="form-check-label" for="otherGender">Other</label>
                                </div>

                            </div>



                            <div class="d-flex justify-content-start align-items-center mb-4">

                                <!-- Submit button -->
                                <button type="submit" name="singUp" class="btn btn-primary btn-lg btn-block me-5">Sign Up</button>
                                <a class="btn btn-secondary btn-lg btn-block" href="index.php">Already have an account, Login?</a>
                            </div>


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