<!DOCTYPE html>
<html>
<head>
  <title>My Page</title>
</head>
<body>
  <h1>Welcome</h1>
  <?php
    echo '<p>This is PHP content.</p>';
  ?>

  <p>This is HTML content.</p>
  <p>Current date and time: <?php echo date('Y-m-d H:i:s'); ?></p>
  <p>Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
  <p>Client IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
  <p>Request Method: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
  <p>Request URI: <?php echo $_SERVER['REQUEST_URI']; ?></p>
  <p>Request Headers:</p>
  <ul>
    <?php
      $headers = function_exists('getallheaders') ? getallheaders() : array();
      foreach ($headers as $name => $value) {
        echo "<li>$name: $value</li>";
      }
    ?>
  </ul>
  <p>Request Body:</p>
  <pre>
    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo file_get_contents('php://input');
      } else {
        echo 'No request body available.';
      }
    ?>
  </pre>
  <p>Request Cookies:</p>
  <ul>
    <?php
      foreach ($_COOKIE as $name => $value) {
        echo "<li>$name: $value</li>";
      }
    ?>
  </ul>
  <p>Request Session:</p>
  <ul>
    <?php
      session_start();
      if (isset($_SESSION)) {
        foreach ($_SESSION as $name => $value) {
          echo "<li>$name: $value</li>";
        }
      } else {
        echo '<li>No session data available.</li>';
      }
    ?>
  </ul>
  <p>Request Files:</p>
  <ul>
    <?php
      if ($_FILES) {
        foreach ($_FILES as $name => $file) {
          echo "<li>$name: {$file['name']}</li>";
        }
      } else {
        echo '<li>No files uploaded.</li>';
      }
    ?>
  </ul>
  <p>Request Environment Variables:</p>
  <ul>
    <?php
      foreach ($_SERVER as $name => $value) {
        if (strpos($name, 'HTTP_') === 0) {
          echo "<li>$name: $value</li>";
        }
      }
    ?>
  </ul>
  
</body>
</html>
