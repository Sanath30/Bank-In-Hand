<!DOCTYPE html>
<html lang="en">

<head>
  <title>WELCOME USER</title>
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
      <a href="MENU.php">Back</a>
      <a href="BW.php">Logout</a>
    </div>
  </div>

  <?php
  $tempbranchID = $_SESSION['branchID'];
  $_SESSION['tempbranchID'] = $tempbranchID;
  ?>

  <center>
    <h1 id="heading"></h1>
  </center>

  <CENTER><a href="CUSTOMERDETAILS.php"><button class="option options">VIEW DETAILS</button></CENTER>
  <CENTER><a href="UPDATEDETAILS.php"><button class="option options">UPDATE DETAILS</button></CENTER>
  <CENTER><a href="BRANCHCHANGE.php"><button class="option options">CHANGE BRANCH</button></CENTER>
  <CENTER><a href="CONFIRMATION.php"><button class="option options">CLOSE ACCOUNT</button></CENTER>

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