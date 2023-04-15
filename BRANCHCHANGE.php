<!DOCTYPE html>
<html lang="en">

<head>
  <title>CHANGE PASSWORD</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="formcss.css" rel="stylesheet">


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

  $phone = $address = $tablebranch = $pass = "";

  $cus_id = $_SESSION['cus_id'];
  $bid = $_SESSION['bankID'];
  $tempbranchID = 3*$bid;

  $tempbranchID = $tempbranchID + 1;

  $flag = 0;

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
      $tablebranch = $row["br_id"];
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["password"])) {
      $pass = test_input($_POST["password"]);
    }

    if (empty($_POST["branch"])) {
      $branch = $tablebranch;
    } else {
      $tempbranchID = $tempbranchID - test_input($_POST["branch"]);

      $branch = $tempbranchID;
      $flag++;
    }

    $sql = "update customer set br_id = '$branch' where cus_id = '$cus_id' AND password='$pass'";

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
        <h4>Change Branch</h4>
      </CENTER>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Select Your New Branch:</p>
        <input style="background: transparent; margin-left:400px" type="radio" name="branch" value="3"><span
          id="b1"></span></p>
        <input style="background: transparent; margin-left:400px" type="radio" name="branch" value="2"><span
          id="b2"></span></p>
        <input style="background: transparent; margin-left:400px" type="radio" name="branch" value="1"><span
          id="b3"></span></p>
        <br>
        <p>Please Enter your current password to confirm the selection:</p>
        <p>Password<input style="float: right; width: 500px; background: transparent;" type="password" id="password"
            name="password" required></p>
    </button></CENTER>
  <CENTER><input class="option options" id="bt" type="submit"></CENTER>

  </form>

  <script>
    const bankID = localStorage.getItem('bankID');
    const branchOneValue = localStorage.getItem('branchOne');
    const branchTwoValue = localStorage.getItem('branchTwo');
    const branchThreeValue = localStorage.getItem('branchThree');

    document.getElementById(id = "b1").innerHTML = branchOneValue;
    document.getElementById(id = "b2").innerHTML = branchTwoValue;
    document.getElementById(id = "b3").innerHTML = branchThreeValue;

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

    var branch;

    function firstBranch() {
      branch = ((bankID - 1) * 3) + 1;
      localStorage.setItem('branchID', branch);

      var branchID = branch;

      $.ajax({
        type: 'POST',
        url: 'PIN.php',
        data: { branchID: branchID },
        success: function (data) {
          console.log(data);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    function secondBranch() {
      branch = ((bankID - 1) * 3) + 2;
      localStorage.setItem('branchID', branch);

      var branchID = branch;

      $.ajax({
        type: 'POST',
        url: 'PIN.php',
        data: { branchID: branchID },
        success: function (data) {
          console.log(data);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    function thirdBranch() {
      branch = ((bankID - 1) * 3) + 3;
      localStorage.setItem('branchID', branch);

      var branchID = branch;

      $.ajax({
        type: 'POST',
        url: 'PIN.php',
        data: { branchID: branchID },
        success: function (data) {
          console.log(data);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
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