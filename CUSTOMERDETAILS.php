<!DOCTYPE html>
<html lang="en">

<head>
  <title>CUSTOMER DETAILS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="formcss.css" rel="stylesheet">
</head>

<body background="fim.png">
  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="CUSTOMER.php">Back</a>
    </div>
</div>

  <center>
    <h1 id="heading"></h1>
  </center>

  <?php
  session_start();
  include "formcss.php";
  include_once "connection.php";
  $firstname = $lastname = $dob = $age = $phone = $address = $gender = $aadhar = $pan = $name = $acc = $id = "";

  $cus_id = $_SESSION['cus_id'];

  $sql = "SELECT * FROM customer where cus_id = '$cus_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $name = $row["name"];
      $phone = $row["contact"];
      $gender = $row["gender"];
      $dob = $row["dob"];
      $address = $row["address"];
      $aadhar = $row["aadhar_no"];
      $pan = $row["pancard"];
      $id = $row["cus_id"];
    }
  }

  $arrayString = explode(" ", $name);

  $sql = "SELECT * FROM account";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["cus_id"] == $id)
        $acctype = $row["type"];
      $brid = $row["br_id"];
    }
  }

  $sql = "SELECT * FROM branch";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["br_id"] == $brid)
        $branchname = $row["address"];
    }
  }

  ?>

  <CENTER><button class="box boxes">
      <CENTER>
        <h4>Customer Details</h4>
      </CENTER>
      <p>First Name<input
          style="background: transparent; width: 500px; margin-left:300px width: 500px; margin-left:300px;" type="text"
          name="firstname" value="<?php echo $arrayString[0]; ?>" readonly></p>
      <p>Last Name<input
          style="background: transparent; width: 500px; margin-left:300px width: 500px; margin-left:306px;" type="text"
          name="lastname" value="<?php echo $arrayString[1]; ?>" readonly></p>
      <p>Date of Birth<input style="background: transparent; width: 500px; margin-left:279px" type="date" name="dob"
          value="<?php echo $dob; ?>" readonly></p>
      <p>Phone Number<input style="background: transparent; width: 500px; margin-left:252px" type="text" name="phone"
          value="<?php echo $phone; ?>" readonly></p>
      <p>Address<input style="background: transparent; width: 500px; margin-left:334px" type="text" name="address"
          value="<?php echo $address; ?>" readonly></p>
      <p>Gender<input style="background: transparent; width: 500px; margin-left:344px" type="text" name="gender"
          value="<?php echo $gender; ?>" readonly></p>
      <p>Aadhar No<input style="background: transparent; width: 500px; margin-left:304px" type="text" name="aadhar"
          value="<?php echo $aadhar; ?>" readonly></p>
      <p>PAN ID<input style="background: transparent; width: 500px; margin-left:343px" type="text" name="pan"
          value="<?php echo $pan; ?>" readonly></p>
      <p>Branch Name<input style="background: transparent; width: 500px; margin-left:269px" type="text" name="acc"
          value="<?php echo $branchname; ?>" readonly></p>
      <p>Account Type<input style="background: transparent; width: 500px; margin-left:271px" type="text" name="acc"
          value="<?php echo $acctype; ?>" readonly></p>
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