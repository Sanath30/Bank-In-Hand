<!DOCTYPE html>
<html lang="en">

<head>
  <title>UPDATE DETAILS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  session_start();
  ?>
</head>

<body background="fim.png">
  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="CUSTOMER.php">Back</a>
    </div>
  </div>

  <?php
  include "formcss.php";
  include_once "connection.php";

  $phone = $address = "";
  $phoner = $addressr = "";

  $cus_id = $_SESSION['cus_id'];

  $flag = 0;

  $number_validation_regex = "/^\\+?[1-9][0-9]{9}$/";

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql = "SELECT * FROM customer where cus_id = '$cus_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $phone = $row["contact"];
      $address = $row["address"];
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["phone"])) {
      $phone = $phoner;
    } else {
      $phone = $_POST["phone"];
      if (!preg_match($number_validation_regex, $phone)) {
        $phone = $phoner;
        $phoner = "Invalid Phone Number";
      } else {
        $phone = test_input($_POST["phone"]);
        $flag++;
      }
    }

    if (empty($_POST["address"])) {
      $addressr = $address;
    } else {
      $address = test_input($_POST["address"]);
      $flag++;
    }

    $sql = "update customer set contact = '$phone',address = '$address' where cus_id = '$cus_id'";

    if (mysqli_query($conn, $sql)) {
      $redirect_url = "CUSTOMER.php";
      $flag++;
    } else {
      echo "Error: " . $sql . ": " . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
  ?>

  <center>
    <h1 id="heading"></h1>
  </center>

  <CENTER><button class="box boxes">
      <CENTER>
        <h4>Customer Details</h4>
      </CENTER>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Phone Number<input style="float: right; background: transparent;" type="text" id="phone" name="phone"></p>
        <p>Address<input style="float: right; background: transparent;" type="text" id="address" name="address"></p>
    </button></CENTER>
  <CENTER><input class="option options" id="bt" type="submit"></CENTER>
  </form>

  <?php if ($flag > 2) { ?>

    <script>
      window.location.href = "<?php echo $redirect_url; ?>";
    </script>

  <?php } ?>

  <script>
    const bankID = localStorage.getItem('bankID');

    if (bankID == 1) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO STATE BANK OF INDIA";
    }
    else if (bankID == 2) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO SOUTH INDIAN BANK";
    }
    else if (bankID == 3) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO HDFC BANK";
    }
    else if (bankID == 4) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO ICICI BANK";
    }
    else if (bankID == 5) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO INDIAN BANK";
    }
    else if (bankID == 6) {
      document.getElementById(id = "heading").innerHTML = "WELCOME TO CANARA BANK";
    }

    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }

  </script>
</body>

</html>