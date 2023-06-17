<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 30px;
      margin-right: 5px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      padding-right: 35px;
      border-radius: 5px;
      box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input{
        margin-right: 10px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 20px;
    }

    .form-group {
      text-align: center;
    }

    .error {
      color: red;
    }


    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .centered-button {
      text-align: center;
    }

    .centered-button input[type="submit"] {
      margin: 0 auto;
      display: block;
    }
  </style>


    <script>
    window.addEventListener('DOMContentLoaded', function() {
      var password = document.getElementById('password');
      var confirmPassword = document.getElementById('confirm-password');
      var submitBtn = document.getElementById('submit-btn');
      var errorLabel = document.getElementById('error-label');

      function validatePassword() {
        if (password.value !== confirmPassword.value) {
          errorLabel.textContent = 'Passwords do not match';
          submitBtn.disabled = true;
        } else {
          errorLabel.textContent = '';
          submitBtn.disabled = false;
        }
      }

      password.addEventListener('input', validatePassword);
      confirmPassword.addEventListener('input', validatePassword);
    });
  </script>
</head>
<body>

<?php


//in case it doesn't work

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blogging";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, first_name, last_name, password) VALUES ('$username', '$firstName', '$lastName', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo '<p class="registration-complete">Registration complete!</p>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>


<h2>Join me !</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="first-name">First Name:</label>
    <input type="text" id="first-name" name="first-name" required>

    <label for="last-name">Last Name:</label>
    <input type="text" id="last-name" name="last-name" required>

    <label for="password">Password:</label>
    <input minlength="8"  type="password" id="password" name="password" required>

    <label for="confirm-password">Confirm Password:</label>
    <input minlength="8" type="password" id="confirm-password" name="confirm-password" required>
    <span id="error-label" class="error"></span>

    <div class="centered-button">
      <input type="submit" id="submit-btn" value="Register" disabled>
    </div>
    <div style="display: flex; justify-content: center; align-items:center;"><p>Already have an account?  <a href="../index/login.html" style="text-decoration:none; color:blue;">Log in</a></p></div>
  </form>
</body>
</html>