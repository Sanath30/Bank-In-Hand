<!DOCTYPE html>
<html lang="en">

<head>
  <title>WELCOME USER</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body {
      background-image: url("./img/fim.png");
    }
  </style>

  <?php
  session_start();
  ?>
</head>

<body>

  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>

    <div class="topnav-right" id="myTopnav">
      <a href="MENU.php">Back</a>
    </div>
  </div>

  <center>
    <h1 id="heading"></h1>
  </center>

  <script type="text/javascript">

    const bankID = localStorage.getItem('bankID');
    const branchID = localStorage.getItem('branchID');

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

  <?php
  include "formcss.php";
  include_once "connection.php";
  $firstname = $lastname = $dob = $age = $phone = $address = $gender = $aadhar = $pan = $name = $acc = "";
  $firstnamer = $lastnamer = $dobr = $ager = $phoner = $addressr = $genderr = $aadharr = $panr = $password = $bid = $brid = $accr = "";

  $flag = 0;
  $age = 18;

  $id = $aid = 0;
  $state = "Open";
  $curdate = date("Y-m-d");

  $number_validation_regex = "/^\\+?[1-9][0-9]{9}$/";
  $email_validation_regex = "/^\\S+@\\S+\\.\\S+$/";
  $aadhar_validation_regex = "/^\\+?[1-9][0-9]{11}$/";
  $pan_validation_regex = "/^\\+?[1-9][0-9]{9}$/";

  $sql = "SELECT cus_id FROM customer";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["cus_id"] > $id || $row["cus_id"] == $id)
        $id = $row["cus_id"] + 1;
    }
  } else {
    $id = 1;
  }

  $sql = "SELECT acc_no FROM account";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["acc_no"] > $aid || $row["acc_no"] == $aid)
        $aid = $row["acc_no"] + 1;
    }
  } else {
    $aid = 1;
  }

  function randomPassword()
  {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass);
  }

  $password = randomPassword();

  $bid = $_SESSION['bankID'];
  $brid = $_SESSION['branchID'];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $birthday = test_input($_POST["dob"]);

    if (empty($_POST["firstname"])) {
      $firstnamer = "First Name is required";
    } else {
      if (!ctype_alpha($_POST["firstname"])) {
        $firstnamer = "Only letters are allowed";
      } else {
        $firstname = test_input($_POST["firstname"]);
        $flag++;
      }
    }

    if (empty($_POST["lastname"])) {
      $lastnamer = "Last Name is required";
    } else {
      if (!ctype_alpha($_POST["lastname"])) {
        $lastnamer = "Only letters are allowed";
      } else {
        $lastname = test_input($_POST["lastname"]);
        $flag++;
      }
    }

    $name = $firstname . " " . $lastname;

    if (empty($_POST["dob"])) {
      $dobr = "DOB is required";
    } else {
      if (is_string($birthday)) {
        $birthday = strtotime($birthday);
      }
      if (time() - $birthday < $age * 31556926) {
        $dobr = "Please Enter a Valid Age";
      } else {
        $dob = test_input($_POST["dob"]);
        $flag++;
      }
    }

    if (empty($_POST["phone"])) {
      $phoner = "Phone Number is required";
    } else {
      $phone = $_POST["phone"];
      if (!preg_match($number_validation_regex, $phone)) {
        $phoner = "Invalid Phone Number";
      } else {
        $phone = test_input($_POST["phone"]);
        $flag++;
      }
    }

    if (empty($_POST["address"])) {
      $addressr = "Address is required";
    } else {
      $address = test_input($_POST["address"]);
      $flag++;
    }

    if (empty($_POST["gender"])) {
      $genderr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
      $flag++;
    }

    if (empty($_POST["acc"])) {
      $accr = "Account Type is required";
    } else {
      $acc = test_input($_POST["acc"]);
      $flag++;
    }

    if (empty($_POST["aadhar"])) {
      $aadharr = "Aadhar ID is required";
    } else {
      if (preg_match($aadhar_validation_regex, $aadhar)) {
        $aadharr = "Invalid Aadhar ID";
      } else {
        $aadhar = test_input($_POST["aadhar"]);
        $flag++;
      }
    }

    if (empty($_POST["pan"])) {
      $panr = "PAN ID is required";
    } else {
      $pan = test_input($_POST["pan"]);
      $flag++;
    }

    if ($flag == 9) {

      $sql = "INSERT INTO customer values($id,'$name',$phone,'$gender','$dob','$address','$aadhar','$pan','$password',$bid,$brid);";

      if (mysqli_query($conn, $sql)) {
        $redirect_url = "CREATION.php";
        $flag++;
        
        $_SESSION['cus_id'] = $id;
      } else {
        echo "Error: " . $sql . ": " . mysqli_error($conn);
      }

      $sql = "INSERT INTO account values($aid,'$state','$acc','$curdate',null,$brid,$id);";

      if (mysqli_query($conn, $sql)) {
        $flag++;
      } else {
        echo "Error: " . $sql . ": " . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }
  ?>

  <CENTER><button class="box boxes">
      <CENTER>
        <h4>Customer Details</h4>
      </CENTER>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>First Name<input style="background: transparent; width: 500px; margin-left:300px" type="text"
            name="firstname" required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $firstnamer; ?>
          </span></p>
        <p>Last Name<input style="background: transparent; width: 500px; margin-left:306px" type="text" name="lastname"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $lastnamer; ?>
          </span></p>
        <p>Date of Birth<input style="background: transparent; width: 500px; margin-left:279px" type="date" name="dob"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $dobr; ?>
          </span></p>
        <p>Phone Number<input style="background: transparent; width: 500px; margin-left:252px" type="text" name="phone"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $phoner; ?>
          </span></p>
        <p>Address<input style="background: transparent; width: 500px; margin-left:334px" type="text" name="address"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $addressr; ?>
          </span></p>
        <p>Gender<input style="background: transparent; margin-left:344px" type="radio" name="gender"
            value="Male">Male<input style="background: transparent; margin-left:175px" type="radio" name="gender"
            value="Female">Female<span style="font-size: 16px; color: red; margin-left:155px" class="error">*
            <?php echo $genderr; ?>
          </span></p>
        <p>Aadhar No<input style="background: transparent; width: 500px; margin-left:304px" type="text" name="aadhar"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $aadharr; ?>
          </span></p>
        <p>PAN ID<input style="background: transparent; width: 500px; margin-left:343px" type="text" name="pan"
            required><span style="font-size: 16px; color: red" class="error">*
            <?php echo $panr; ?>
          </span></p>
        <p>Account Type<input style="background: transparent; margin-left:270px" type="radio" name="acc" value="Savings"
            required>Savings<input style="background: transparent; margin-left:144px" type="radio" name="acc"
            value="Current">Current<span style="font-size: 16px; color: red; margin-left:148px" class="error">*
            <?php echo $accr; ?>
          </span></p>
    </button></CENTER>

  <CENTER><input class="option options" id="bt" type="submit"></CENTER>
  </form>

  <?php if ($flag > 10) { ?>

    <script>
      window.location.href = "<?php echo $redirect_url; ?>";
    </script>

  <?php } ?>
</body>

</html>