<!DOCTYPE html>
<html>
<head>
  <title>Remote Control</title>
  <style>
    body {
      text-align: center;
      font-family: Arial, sans-serif;
    }
    
    .remote {
      margin: 100px auto;
      width: 500px;
      background-color: #f2f2f2;
      border-radius: 10px;
      padding: 20px;
    }
    
    .button {
      display: inline-block;
      width: 100px;
      height: 50px;
      margin: 10px;
      background-color: #ffffff;
      border-radius: 10%;
      border: 1px solid #cccccc;
      cursor: pointer;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
      text-align: center;
      line-height: 50px;
    }
  </style>
</head>
<body>
  <div class="remote">
    <h2>Remote Control</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <button type="submit" class="button" name="direction" value="Forward">Forward</button>
      <br />
      <button type="submit" class="button" name="direction" value="Left">Left</button>
      <button type="submit" class="button" name="direction" value="Stop">Stop</button>
      <button type="submit" class="button" name="direction" value="Right">Right</button>
      <br />
      <button type="submit" class="button" name="direction" value="Backward">Backward</button>
    </form>

    <?php
    // Database connection credintials to insert in table
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "dir_data";

    // Check if a button is pressed
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["direction"])) {
      $direction = $_POST["direction"];

      // Create a new MySQLi instance for the insert
      $mysqli = new mysqli($host, $username, $password, $database);

      // Check if the connection successful for the insert
      if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
      }

      // Insert the direction into the database
      $sql = "INSERT INTO data (direction) VALUES ('$direction');";

      if ($mysqli->query($sql) === TRUE) {
          echo "";
      } else {
          echo "Error: " . $sql . "<br>" . $mysqli->error;
      }

      // Close the database connection for the insert
      $mysqli->close();
    }
    ?>
	
  </div>
</body>
</html>
