<!DOCTYPE html>
<html lang="en">

<head>
  <title>WELCOME USER</title>
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

    $cus_id = $_POST['cus_id'];
    $pass = $_POST['pass'];

    if (empty($cus_id) || empty($pass)) {

      $error = "Please enter both Customer ID and Password";
    } else {

      $query = "SELECT * FROM customer WHERE cus_id='$cus_id' AND password='$pass' AND bank_id='$bid'";

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
      <a href="SBIFORM.php">Back</a>
    </div>
  </div>

  <h1>
    <CENTER> ENTER YOUR USERNAME AND PASSWORD</CENTER>
  </h1>

  <CENTER><label for="Name">CUSTOMER ID:</label></CENTER>
  <CENTER><input type="text" id="cus_id" name="cus_id" required></CENTER>
  <br>
  <CENTER><label for="Name">PASSWORD:</label></CENTER>
  <CENTER> <input type="password" id="pass" name="pass" required></CENTER>
  <br>
  <CENTER><button FOR="SUBMIT" onclick="login()">SUBMIT</button></CENTER>
  </form>
</body>

</html>