<!DOCTYPE html>
<html lang="en">

<head>
  <title>STAFF PAGE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="forms.css" rel="stylesheet">
</head>

<body background="fim.png">
  <div class="topnav" id="myTopnav">
    <a href="BW.php">Home</a>
    
    <div class="topnav-right" id="myTopnav">
      <a href="FORM.php">Back</a>
    </div>

  </div>

  <center>
    <h1 id="heading"></h1>
  </center>
  <div class="dropdown">
    <button class="choice choices">CUSTOMERS</button>
    <div class="dropdown-content">
    </div>
  </div>

  <div class="dropdown">
    <a href="SBRANCHPAGE.php"><button class="choice choices">BRANCH</button></a>
    <div class="dropdown-content">
    </div>
  </div>

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