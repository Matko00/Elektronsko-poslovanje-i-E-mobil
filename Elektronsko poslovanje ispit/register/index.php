<?php
require_once 'config.php';

echo '<script> sessionStorage.removeItem("id");</script>';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Register / login</title>
</head>
<body>
<div class="header" style="margin-top:40px;">
    <a href="../index.php" style="color: #000; font-size:25px;">REAL ESTATE</a>
</div>
<div class="container">
    <div class="row m-2">
        <div class="col p-3" style="border-right: 1px solid;">
            <h1>REGISTER</h1>
            <form action="web.php" method="post">

                <div class="form-group">
                    <input type="text" class="form-control" id="registerFirstname"
                           placeholder="Enter firstname" name="firstname">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="registerLastname"
                           placeholder="Enter lastname" name="lastname">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="registerEmail"
                           placeholder="Enter valid e-mail address" name="email">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="registerPhone"
                           placeholder="Enter valid phone number" name="phone">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="registerPassword" placeholder="Password (min 8 characters)">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="passwordConfirm" id="registerPasswordConfirm" placeholder="Password again">
                </div>

                <input type="hidden" name="action" value="register">
                <button type="submit" class="btn btn-secondary">Register</button>
            </form>

            <?php
            $r = 0;

            if (isset($_GET["r"]) and is_numeric($_GET['r'])) {
                $r = (int)$_GET["r"];

                if (array_key_exists($r, $messages)) {
                    echo '
                    <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
                        '.$messages[$r].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ';
                }
            }
            ?>
        </div>

        <div class="col p-3">
            <h1>LOGIN</h1>
            <form action="web.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="loginUsername"
                           placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="loginPassword" placeholder="Password"
                           name="password">
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="btn btn-secondary">Login</button>
            </form>


            <?php

            $l = 0;

            if (isset($_GET["l"]) and is_numeric($_GET['l'])) {
                $l = (int)$_GET["l"];

                if (array_key_exists($l, $messages)) {
                    echo '
                    <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
                        '.$messages[$l].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ';
                }
            }
            ?>
            <br>
            <a href="#" id="fl" style="color: black;">Forgot your password?</a>
            <form action="web.php" method="post" name="forget" id="forget" style="display:none; margin-top:5px;">
                <div class="form-group">
                    <input type="email" class="form-control" id="forgetEmail" placeholder="Enter your e-mail address"
                           name="email">
                </div>
                <input type="hidden" name="action" value="forget">
                <button type="submit" class="btn btn-secondary">Reset password</button>
            </form>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

<script src="js/script.js"></script>
</body>
</html>