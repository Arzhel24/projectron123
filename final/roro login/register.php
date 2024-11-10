<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
      body, html {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f2f5; /* Light background for a soft look */
        font-family: Arial, sans-serif;
      }

      

.card {
  height: 440px;
  width: 380px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
  overflow: hidden;
  margin: 10px;
}

.card-header {
  background-color: blue;
  padding: 16px;
  text-align: center;
}

.card-header .text-header {
  margin: 0;
  font-size: 18px;
  color: rgb(255, 255, 255);
}

.card-body {
  padding: 16px;
}

.form-group {
  margin-bottom: 12px;
}

.form-group label {
  display: block;
  font-size: 14px;
  color: #333;
  font-weight: bold;
  margin-bottom: 1px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
  width: 100%;
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn {
  padding: 12px 24px;
  margin-left: 13px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  background-color: blue;
  color: #fff;
  text-transform: uppercase;
  transition: background-color 0.2s ease-in-out;
  cursor: pointer
}

.btn:hover {
  background-color: #ccc;
  color: #333;
}
    </style>
  </head>
  <body>
  <div class="card">
  <div class="card-header">
    <div class="text-header">Register</div>
  </div>
  <div class="card-body">
    <form action="register_acc.php"method="post">
      <div class="form-group">
        <label for="username">Firstname:</label>
        <input required="" class="form-control" name="firstname"  type="text">
      </div>
      
      <div class="form-group">
        <label for="text">Lastname:</label>
        <input required="" class="form-control" name="lastname"  type="text">
      </div>
      <div class="form-group">
        <label for="text">Username:</label>
        <input required="" class="form-control" name="username"  type="text">
      </div>
      <div class="form-group">
        <label for="password"> Password:</label>
        <input required="" class="form-control" name="password"" type="password">
      </div>
     <input type="submit" class="btn" name="register" value="Register">    </form>
  </div>
  <div class="text-center">
        Already have an account? <a href="index.php">Login here</a>
      </div>
</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
