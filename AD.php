<!DOCTYPE html>
<html lang="en">

<head>
  <title>WELCOME ADMIN</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="formcss.css" rel="stylesheet">

  <?php
  session_start();
  include "formcss.php";
  include_once "connection.php";

  $flag = 0;

  $bid = $_SESSION['bankID'];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email) || empty($pass)) {

      $error = "Please enter both username and password";
    } else {

      $query = "SELECT * FROM admin WHERE email='$email' AND password='$pass' AND bank_id='$bid'";

      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $redirect_url = "ADMINPAGE.php";
        $flag++;
      } else {
        $error = "Invalid username or password";
      }
    }
  }
  ?>
</head>

<body background="fim.png">

  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="MENU.php">Back</a>
      <a href="BW.php">Logout</a>
    </div>
  </div>

  <h1>
    <center> ENTER YOUR EMAIL ID AND PASSWORD</center>
  </h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <CENTER><label style="background-image: linear-gradient(to left,aquamarine,lightgreen);" for="Name">EMAIL
        ID:</label></CENTER>
    <CENTER><input type="text" id="email" name="email" required></CENTER>
    <br>
    <CENTER><label style="background-image: linear-gradient(to left,aquamarine,lightgreen);"
        for="Name">PASSWORD:</label></CENTER>
    <CENTER> <input type="password" id="pass" name="pass" required></CENTER>
    <br>
    <CENTER><button FOR="SUBMIT">SUBMIT</button></CENTER>
  </form>

  <?php if ($flag > 0) { ?>

    <script>
      window.location.href = "<?php echo $redirect_url; ?>";
    </script>

  <?php } ?>

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>