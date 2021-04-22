<?php

    session_start();

    require_once "connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);

        if(empty($username)) {
            $empty_username_error = "Please enter username.";
            $_SESSION["username"] = $username;
            $_SESSION["username-error"] = $empty_username_error;

            header("Location: ../login-page.php");
        } else {
            $_SESSION["username"] = $username;
        }

        if (empty($password)) {
            $password_err = "Please enter password.";
            $_SESSION["password-error"] = $password_err;
            header("Location: ../login-page.php");
        }

        $query  = "SELECT * FROM `users` WHERE username='$username' AND password='" . $password . "'";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['loggedIn'] = true;
            $_SESSION['userId'] = $row['id'];

            header("location: ../main.php");

        }
        else {
            $_SESSION['login-error'] = 'Wrong username or password';
            header("Location: ../login-page.php");
            echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='loginn.php'>Login</a> again.</p>
                  </div>";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

?>
