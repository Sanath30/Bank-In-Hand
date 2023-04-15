<!DOCTYPE html>
<html lang="en">

<head>
  <title>MANAGER BRANCH DETAILS</title>
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
      <a href="MANAGERPAGE.php">Back</a>
    </div>
  </div>

  <center>
    <h1 id="heading"></h1>
  </center>

  <?php
  include "formcss.php";
  include_once "connection.php";

  $brid = $_SESSION['branchID'];

  $sql = "SELECT * FROM branch WHERE br_id='$brid'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $addr = $row["address"];
    }
  }

  $sql = "SELECT count(*) FROM account WHERE state='Open' and br_id='$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $open = $row["count(*)"];
    }
  }

  $sql = "SELECT count(*) FROM account WHERE state='Closed' and br_id='$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $closed = $row["count(*)"];
    }
  }

  $sql = "SELECT count(*) FROM account WHERE br_id='$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $total = $row["count(*)"];
    }
  }

  $sql = "SELECT * FROM manager WHERE br_id='$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $mnid = $row["mn_id"];
    }
  }

  $sql = "SELECT * FROM manager WHERE br_id='$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $mnname = $row["name"];
    }
  }

  $sql = "SELECT count(*) FROM staff WHERE br_id = '$brid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $staffcount = $row["count(*)"];
    }
  }
  ?>

  <CENTER><button class="box boxes">
      <CENTER>
        <h4>Branch Details</h4>
      </CENTER>
      <p>Branch ID<input style="float: right; background: transparent; background: transparent;" type="text"
          id="branchid" name="branchid" value="<?php echo $brid; ?>" readonly></p>
      <p>Branch Location<input style="float: right; background: transparent;" type="text" id="address" name="address"
          value="<?php echo $addr; ?>" readonly></p>
      <p>No of Active Accounts<input style="float: right; background: transparent;" type="text" id="open" name="open"
          value="<?php echo $open; ?>" readonly></p>
      <p>No of Closed Accounts<input style="float: right; background: transparent;" type="text" id="closed"
          name="closed" value="<?php echo $closed; ?>" readonly> </p>
      <p>Total Accounts<input style="float: right; background: transparent;" type="text" id="total" name="total"
          value="<?php echo $total; ?>" readonly></p>
      <p>Manager ID<input style="float: right; background: transparent;" type="text" id="managerid" name="managerid"
          value="<?php echo $mnid; ?>" readonly></p>
      <p>Manager Name<input style="float: right; background: transparent;" type="text" id="managername"
          name="managername" value="<?php echo $mnname; ?>" readonly> </p>
      <p>No of Staff<input style="float: right; background: transparent;" type="text" id="staffcount" name="staffcount"
          value="<?php echo $staffcount; ?>" readonly> </p>
    </button></CENTER>

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