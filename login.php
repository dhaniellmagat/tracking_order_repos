<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      background-color: #ffffff;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #007bff;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    .form-group input:focus {
      transform: scale(1.05);
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    .btn-login {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      border: none;
    }
    .btn-login:hover {
      background-color: #0056b3;
    }
    .text-center {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-login">Login</button>
    </form>
    <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
  </div>
</body>
</html>
