<!DOCTYPE html>
<html lang="en">

<head>
  <title>ADMIN PAGE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="forms.css" rel="stylesheet">
  <?php
  session_start();
  ?>
</head>

<body background="fim.png">
  <?php
  if (isset($_POST['branchDetailsID'])) {
    $branchDetailsID = $_POST['branchDetailsID'];

    $_SESSION['branchDetailsID'] = $branchDetailsID;
  }
  ?>

  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="MENU.php">Back</a>
    </div>
  </div>

  <center>
    <h1 id="heading"></h1>
  </center>
  <div class="dropdown">
    <button class="choice choices">USERS</button>
    <div class="dropdown-content">
      <a href="#">Manager</a>
      <a href="#">Staff</a>
      <a href="#">Customers</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="choice choices">BRANCH</button>
    <div class="dropdown-content">
      <a href="ADBRANCHPAGE.php" id="b1" onclick="firstBranch()"></a>
      <a href="ADBRANCHPAGE.php" id="b2" onclick="secondBranch()"></a>
      <a href="ADBRANCHPAGE.php" id="b3" onclick="thirdBranch()"></a>
    </div>
  </div>

  <script>
    const bankID = localStorage.getItem('bankID');

    const branchOneValue = localStorage.getItem('branchOne');
    const branchTwoValue = localStorage.getItem('branchTwo');
    const branchThreeValue = localStorage.getItem('branchThree');

    document.getElementById(id = "b1").innerHTML = branchOneValue;
    document.getElementById(id = "b2").innerHTML = branchTwoValue;
    document.getElementById(id = "b3").innerHTML = branchThreeValue;

    var branch;

    function firstBranch() {
      branch = ((bankID - 1) * 3) + 1;
      var branchDetailsID = branch;

      $.ajax({
        type: 'POST',
        url: 'ADMINPAGE.php',
        data: { branchDetailsID: branchDetailsID },
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
      var branchDetailsID = branch;

      $.ajax({
        type: 'POST',
        url: 'ADMINPAGE.php',
        data: { branchDetailsID: branchDetailsID },
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
      var branchDetailsID = branch;

      $.ajax({
        type: 'POST',
        url: 'ADMINPAGE.php',
        data: { branchDetailsID: branchDetailsID },
        success: function (data) {
          console.log(data);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

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
  </script>
</body>

</html>