<!DOCTYPE html>
<html>
  <head>
    <title>Interactive Rainbow Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
      }
      #container {
        border: 5px solid;
        border-image: linear-gradient(to right, orange, yellow, green, cyan, blue, violet) 1;
        padding: 20px;
      }
      h1 {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <h1>Interactive Rainbow Page</h1>
      <?php
        if (isset($_POST['name']) && isset($_POST['color'])) {
          $name = htmlspecialchars($_POST['name']);
          $color = htmlspecialchars($_POST['color']);
          echo "<p>Hello, $name! Your favorite color is $color.</p>";
          echo "<script>document.body.style.backgroundColor = '$color';</script>";
        } else {
      ?>
      <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="color">Favorite Color:</label><br>
        <input type="text" id="color" name="color"><br><br>
        <input type="submit" value="Submit">
      </form>
      <?php
        }
      ?>
    </div>
  </body>
</html>
