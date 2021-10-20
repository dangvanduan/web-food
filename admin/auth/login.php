<?php
require_once '../../util/dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upvex - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="index.html">
                                    <span><img src="assets\images\logo-light.png" alt="" height="26"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                            </div>

                            <h5 class="auth-title">Sign In</h5>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $user_name = $_POST['user_name'];
                                    $password = md5($_POST['password']);
                                    $query = "SELECT * FROM admin WHERE user_name='{$user_name}' AND password='{$password}'";
                                    $result = $mysqli->query($query);
                                    $infoUser = mysqli_fetch_assoc($result);
                                    if ($infoUser) {
                                        $_SESSION['admin'] = $infoUser;
                                        echo '<script language="javascript">';
                                        echo 'alert("Đăng nhập thành công")';
                                        echo '</script>';
                                        header('Location: ../index.php');
                                    } else {
                                        echo "Tài khoản hoặc mật khẩu không chính xác!";
                                    }
                                }
                                ?>

                            <form  method="POST">

                                <div class="form-group mb-3">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="user_name" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-danger btn-block" type="submit"  name="submit"> Log In </button>
                                </div>

                            </form>

                            

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-muted ml-1"><b class="font-weight-semibold">Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="assets\js\vendor.min.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>