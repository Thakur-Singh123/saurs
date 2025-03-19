<?php
   session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            /* General Reset */
            *, *::before, *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f2f5;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
            .container {
                max-width: 500px;
                padding: 20px;
                background-color: #3e89c199;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                height: 350px;
            }
                .left-colum-for-instragram-growth {
                text-align: center;
            }
            .left-colum-for-instragram-growth img {
                max-width: 40%;
                height: auto;
                margin-top: 20px;
            }
            .right-colum-for-instragram-growth {
                padding: 30px;
                flex: 1;
            }
            .form-group {
                margin-bottom: 20px;
                position: relative;
            }
            .form-group input {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: border-color 0.3s;
            }
            .form-group input:focus {
                border-color: #6c63ff;
                outline: none;
            }
            .invalid-feedback {
                color: red;
                font-size: 0.875em;
                margin-top: 5px;
            }
            .div-for-contact-button {
                margin-top: 10px;
            }
            .btn-primary {
                background: linear-gradient(90deg, #fd267d, #081b66c7);
                color: #ffffff;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                width: 400px;
                height: 42px;
            }
            .btn-primary:hover {
                background: linear-gradient(90deg, #ff6036, #fd267d);
            }
            .input-group {
                display: flex;
            }
            .input-group input {
                flex: 1;
                padding-right: 40px;
            }
            .input-group-append {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                background: transparent;
                border: none;
            }
            .input-group-text {
                background: none;
                border: none;
            }
            @media (max-width: 768px) {
                .container {
                    flex-direction: column;
                    padding: 20px;
                }
            }
            .success-msg {
                color: green;
                padding-left: 10px;
                font-size: 20px;
            }
            .error-msg {
                color: #eb0000;
                padding-left: 0px;
                font-size: 12px;
                margin: 7px  0px 0px;
                font-weight: initial;
                letter-spacing: 0.6px;
            }
            .error-msgs {
                color: #eb0000;
                padding-left: 0px;
                font-size: 12px;
                margin: 7px  0px 0px;
                font-weight: initial;
                letter-spacing: 0.6px;
            }
        </style>
    </head>
   <body>
        <section>
            <div class="container">
                <form action="submit-login" method="POST">
                <div class="row">
                    <div class="col-md-4 left-colum-for-instragram-growth">
                        <div class="main-div-for-intragram-image logoin">
                            <!-- <img src="asset/imges/logo.svg" alt="instagram-logo"> -->
                            <h2>Admin Login</h2>
                        </div>
                    </div>
                    <div class="col-md-8 right-colum-for-instragram-growth">
                        <div class="instragram-growth-form-div-1">
                            <div class="left">
                            <div class="form-group cusat">
                                <input id="login" type="email" class="form-control" name="email" required autocomplete="off" placeholder="Enter Email Address">
                                <?php
                                    if (isset($_SESSION['ERROR_MSG'])) {
                                        echo '<div class="error-msg">' . $_SESSION['ERROR_MSG'] . '</div>';
                                        unset($_SESSION['ERROR_MSG']);
                                    }
                                    ?>
                            </div>
                            <div class="form-group cusat">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Enter Password">
                                    <div class="input-group-append" id="toggle-password">
                                        <span class="input-group-text">
                                        <i class="fas fa-eye" id="eye-icon"></i>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                    if (isset($_SESSION['ERROR_MSGa'])) {
                                        echo '<div class="error-msgs">' . $_SESSION['ERROR_MSGa'] . '</div>';
                                        unset($_SESSION['ERROR_MSGa']);
                                    }
                                    ?>
                            </div>
                            </div>
                        </div>
                        <div class="instragram-growth-form-div-2 top">
                            <div class="right">
                            <div class="div-for-contact-button">
                                <button type="submit" name="submit" class="btn btn-primary">
                                Login <i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                                </button>
                            </div>
                            <br>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <script>
            //JavaScript to toggle password visibility
            document.getElementById('toggle-password').addEventListener('click', function () {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eye-icon');
            
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        </script>
   </body>
</html>