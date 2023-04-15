<!DOCTYPE html>
<html lang="en">

<head>
  <title>PLEASE SELECT YOUR PORTAL</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="formcss.css" rel="stylesheet">
</head>

<body background="fim.png">
  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="BRANCH.php">Back</a>
    </div>
  </div>

  <center>
    <h1 id="heading"></h1>
  </center>
  <HR />
  <h3>
    <center>CHOOSE FROM THE CATEGORY</center>
  </h3>
  <div class="panel">
    <p><strong><i>
          <center><a href="AD.php">ADMIN</a><sub></center>
        </i></strong>></p>
    <p><strong><i>
          <center><a href="MANAGER.php">MANAGER</a><sub></center>
        </i></strong>></p>
    <p><strong><i>
          <center><a href="STAFF.php">STAFF</a><sub></center>
        </i></strong>></p>
    <p><strong><i>
          <center><a href="USER.php">USERS</a><sub></center>
        </i></strong>></p>
    <p><strong><i>
          <center><a href="NEW.php">NEW USERS</a><sub></center>
        </i></strong>></p>
  </div>
  <script>
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
</body>

</html>