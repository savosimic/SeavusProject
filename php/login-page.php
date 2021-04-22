<?php
    session_start();

    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == 1) {
        header("Location: main.php");
          exit;
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login page - Seavus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
<!--    <link rel="stylesheet" href="assets/css/styles.css">-->
    <link rel="stylesheet" href="./sstyles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>

<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="/includes/login.php" method="POST" name="login" id="login-form"  autocomplete="off">
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="username">User Name</label>
                        <?php
                            if (!is_null($_SESSION["username"])) {
                                echo '<input autofocus type="text" id="username" name="username" ' . 'value="' . $_SESSION["username"].'" autofocus'.'>';
                                unset($_SESSION["username"]);
                            } else {
                                echo '<input type="text" id="username" name="username">';
                            }
                        ?>
                        <i class="ti-user"></i>
                    </div>
                    <div class="" id="username-error">
                    </div>
                    <?php
                        if (isset($_SESSION["username-error"])) {
                            ?>
                            <span class="text-danger"><?php  echo $_SESSION["username-error"]; ?></span>
                            <?php
                            unset($_SESSION["username"]);
                            unset($_SESSION["username-error"]);
                        }
                    ?>

                    <div class="form-gp">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" >
                        <i class="ti-lock"></i>
                    </div>
                    <div class="" id="password-error">
                    </div>
                    <?php
                        if (isset($_SESSION["password-error"])) {
                            ?>
                            <span class="text-danger"><?php  echo $_SESSION["password-error"]; ?></span>
                            <?php
                            unset($_SESSION["password-error"]);
                        }
                    ?>
                    <?php
                        if (isset($_SESSION["login-error"])) {
                            ?>
                            <span class="text-danger"><?php  echo $_SESSION["login-error"]; ?></span>
                            <?php
                            unset($_SESSION["login-error"]);
                        }
                    ?>

                    <div class="row mb-4 rmber-area">
                        <div class="col-6">

                        </div>
                        <div class="col-6 text-right">
                            <a href="login.php">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" name="login">Login <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/app.js"></script>

<script>
    function clearForm() {
        // var form = document.getElementById("login");
        // form.onsubmit = function(){
        //     form.reset();
        // }
    }


    $(document).ready(function() {
        $('input').val('');
    });
    $(document).ready(function() {
        if($('#username').val() == ''){
            $('#username').focus();
        }
    });
</script>
</body>

</html>
