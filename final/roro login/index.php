<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN PAGE</title>
</head>
<body>
  <style>
    body {
      margin-top: 200px;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      background-color: #1c1c1c;
      color: #fff;
    }

    .container {
      max-width: 350px;
      background: #F8F9FD;
      background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
      border-radius: 40px;
      padding: 45px 55px;
      border: 5px solid rgb(255, 255, 255);
      box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
      margin: 20px;
    }

    .heading {
      text-align: center;
      font-weight: 900;
      font-size: 30px;
      color: rgb(16, 137, 211);
    }

    .form {
      margin-top: 20px;
    }

    .form .input {
      width: 100%;
      background: white;
      border: none;
      padding: 15px 20px;
      border-radius: 20px;
      margin-top: 15px;
      box-shadow: #cff0ff 0px 10px 10px -5px;
      border-inline: 2px solid transparent;
    }

    .form .input::placeholder {
      color: rgb(170, 170, 170);
    }

    .form .input:focus {
      outline: none;
      border-inline: 2px solid #12B1D1;
    }

    .form .forgot-password {
      display: block;
      margin-top: 10px;
      margin-left: 10px;
    }

    .form .forgot-password a {
      font-size: 11px;
      color: #0099ff;
      text-decoration: none;
    }

    .login-button {
      display: block;
      width: 100%;
      font-weight: bold;
      background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
      color: white;
      padding-block: 10px;
      border-radius: 20px;
      box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
      border: none;
      transition: all 0.2s ease-in-out;
    }

    .login-button:hover {
      transform: scale(1.03);
      box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
    }

    .login-button:active {
      transform: scale(0.95);
      box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
    }

    .blue {
      color: blue;
      font-size: 35px;
    }

    .overlay {
      color: blue;
    }
  </style>
  
  <div class="container1">
    <div class="title">
      <span class="blue">STUDENT MANAGEMENT SYSTEM</span>
    </div>
    <div class="container">
      <form action="authenticate.php" method="post">
        <div class="heading">
          <h2 style="text-align: center;">LOGIN</h2>  
        </div>
        <span style="color: red; font-style: italic;">
          <?php
          if (isset($_GET['incorrect'])) {
            echo "Incorrect username or password!";
          }
          ?>
        </span>
        <div class="form">
          <input type="text" name="username" placeholder="Enter Username:" class="input" required>
        </div>
        <div class="form">
          <input type="password" name="password" placeholder="Enter Password" class="input" required>
        </div>
        <div class="forgot-password">
          <p class="overlay">Don't have an account yet? <a href="register.php">Create an account</a></p>
        </div>
        <div class="login-button">
          <input class="login-button" type="submit" value="Login" name="login">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
