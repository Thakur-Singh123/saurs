<?php
   session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration</title>
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
            flex-direction: column;
            align-items: center;
         }
         .form-group {
            margin-bottom: 15px;
            width: 100%;
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
         .btn-primary {
            background: linear-gradient(90deg, #fd267d, #081b66c7);
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            height: 42px;
         }
         .btn-primary:hover {
            background: linear-gradient(90deg, #ff6036, #fd267d);
         }
         .input-group {
            display: flex;
            position: relative;
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
         }
         @media (max-width: 768px) {
            .container {
               padding: 20px;
            }
         }
         .success-msg {
            color: green;
            padding-left: 10px;
            font-size: 20px;
         }
         .error-msg {
            color: red;
            padding-left: 10px;
            font-size: 20px;
         }
      </style>
   </head>
   <body>
      <section>
         <?php
            if (isset($_SESSION['SUCCESS_MSG'])) {
               echo '<div class="success-msg">' . $_SESSION['SUCCESS_MSG'] . '</div>';
               unset($_SESSION['SUCCESS_MSG']);
               echo '<script>setTimeout(function(){ location.reload(); }, 3000);</script>';
            } elseif (isset($_SESSION['ERROR_MSG'])) {
               echo '<div class="error-msg">' . $_SESSION['ERROR_MSG'] . '</div>';
               unset($_SESSION['ERROR_MSG']);
               echo '<script>setTimeout(function(){ location.reload(); }, 1000);</script>';
            }
            ?>
         <div class="container">
            <h2>Registration</h2>
            <form action="submit-register.php" Method="POST">
               <div class="form-group">
                  <input type="text" class="form-control" name="name" required autocomplete="off" placeholder="Enter UserName">
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_username'): ?>
                  <span class="invalid-feedback">Invalid Username</span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <input type="email" class="form-control" name="email" required autocomplete="off" placeholder="Enter Email">
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_email'): ?>
                  <span class="invalid-feedback">Invalid Email</span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="mobile" required autocomplete="off" placeholder="Enter Mobile">
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_mobile'): ?>
                  <span class="invalid-feedback">Invalid Mobile</span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="address" required autocomplete="off" placeholder="Enter Address">
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_address'): ?>
                  <span class="invalid-feedback">Invalid Address</span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <input id="password" type="password" class="form-control" name="password" required placeholder="Enter Password">
                     <div class="input-group-append" onclick="togglePassword('password', 'eye-icon1')">
                        <span class="input-group-text">
                        <i class="fas fa-eye" id="eye-icon1"></i>
                        </span>
                     </div>
                  </div>
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_password'): ?>
                  <span class="invalid-feedback">Incorrect Password</span>
                  <?php endif; ?>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <input id="confirm-password" type="password" class="form-control" name="confirm_password" required placeholder="Confirm Password">
                     <div class="input-group-append" onclick="togglePassword('confirm-password', 'eye-icon2')">
                        <span class="input-group-text">
                        <i class="fas fa-eye" id="eye-icon2"></i>
                        </span>
                     </div>
                  </div>
                  <?php if (isset($_GET['error']) && $_GET['error'] == 'password_mismatch'): ?>
                  <span class="invalid-feedback">Passwords do not match</span>
                  <?php endif; ?>
               </div>
               <div class="instragram-growth-form-div-2 top">
                  <div class="right">
                     <div class="div-for-contact-button">
                        <button type="submit" name="submit" class="btn btn-primary">
                        Register <i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                        </button>
                     </div>
                     <br>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <script>
         function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
      
            if (passwordInput.type === 'password') {
               passwordInput.type = 'text';
               eyeIcon.classList.remove('fa-eye');
               eyeIcon.classList.add('fa-eye-slash');
            } else {
               passwordInput.type = 'password';
               eyeIcon.classList.remove('fa-eye-slash');
               eyeIcon.classList.add('fa-eye');
            }
         }
      </script>
   </body>
</html>