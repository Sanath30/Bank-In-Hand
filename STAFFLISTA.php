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

  $name = $dob = $age = $contact = $address = $gender = $aadhar = $pan = "";

  $flag = 0;

  $brid = $_SESSION['branchID'];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $staffid = $_POST['staffid'];

    $query = "SELECT * FROM staff WHERE st_id ='$staffid' AND br_id='$brid'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $contact = $row["contact"];
        $gender = $row["gender"];
        $dob = $row["dob"];
        $address = $row["address"];
        $aadhar = $row["aadhar_no"];
        $pan = $row["pancard"];
      }
    }

  }

  ?>
</head>

<body background="fim.png">
  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="ADMINPAGE.php">Back</a>
    </div>
  </div>
  
  <h1>
    <center>BANK IN HAND</center>
  </h1>

  <CENTER><button class="box boxes">
      <CENTER>
        <h4>Staff Details</h4>
      </CENTER>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Staff ID<input style="float: right; background: transparent; background: transparent;" type="text"
            id="staffid" name="staffid" required></p>
        <br>
        <p>Staff Name<input style="float: right; background: transparent;" type="text" id="name" name="name"
            value="<?php echo $name; ?>" readonly></p>
        <p>Contact<input style="float: right; background: transparent;" type="text" id="Contact" name="Contact"
            value="<?php echo $contact; ?>" readonly></p>
        <p>Gender<input style="float: right; background: transparent;" type="text" id="Gender" name="Gender"
            value="<?php echo $gender; ?>" readonly> </p>
        <p>DOB<input style="float: right; background: transparent;" type="text" id="dob" name="dob"
            value="<?php echo $dob; ?>" readonly> </p>
        <p>Address<input style="float: right; background: transparent;" type="text" id="Address" name="Address"
            value="<?php echo $address; ?>" readonly></p>
        <p>Aadhar<input style="float: right; background: transparent;" type="text" id="aadhar" name="aadhar"
            value="<?php echo $aadhar; ?>" readonly></p>
        <p>Pancard<input style="float: right; background: transparent;" type="text" id="pancard" name="pancard"
            value="<?php echo $pan; ?>" readonly> </p>
    </button></CENTER>

  <CENTER><input class="option options" id="bt" type="submit"></CENTER>
  </form>

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