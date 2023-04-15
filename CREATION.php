<!DOCTYPE html>
<html lang="en">

<head>
    <title>WELCOME USER</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="formcss.css" rel="stylesheet">
</head>

<body background="fim.png">
    <div class="topnav" id="myTopnav">
        <a href="BW.php">Home</a>

        <div class="topnav-right" id="myTopnav">
        </div>
    </div>

    <?php
    session_start();
    include "formcss.php";
    include_once "connection.php";
    $pass = "";

    $cus_id = $_SESSION['cus_id'];

    $sql = "SELECT * FROM customer where cus_id = '$cus_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $pass = $row["password"];
        }
    }
    ?>
    <center>
        <h1 id="heading"></h1>
    </center>

    <CENTER><button class="box boxes">
            <p>Dear valued customer,</p>

            <p>Thank you for banking with us, We have generated a new user id and password for your account.</p>
            <p>Your User ID is displayed below:</p>
            <br>
            <input style="background: transparent; width: auto; text-align: center; " type="text" name="User ID"
                value="<?php echo $cus_id; ?>" readonly></p>
            <p>Your Password is displayed below:</p>
            <br>
            <input style="background: transparent; width: auto; text-align: center; " type="text" name="password"
                value="<?php echo $pass; ?>" readonly></p>
            <p>Please copy this password down carefully as it will be required for future access to your account. We
                advise that you keep this password secure and not share it with anyone.</p>

            <p>If you have any questions or concerns regarding your account, please do not hesitate to contact us.</p>

            <p>Thank you for choosing our bank for your financial needs.</p>

            <p>Best regards,</p>
            <p id="regards">[Bank Name]</p>
        </button></CENTER>

    <CENTER><a href="BW.php"><button class="option options">PROCEED</button></CENTER>

    <script>

        const bankID = localStorage.getItem('bankID');
        const branchID = localStorage.getItem('branchID');

        if (bankID == 1) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO STATE BANK OF INDIA";
            document.getElementById(id = "regards").innerHTML = "STATE BANK OF INDIA";
        }
        else if (bankID == 2) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO SOUTH INDIAN BANK";
            document.getElementById(id = "regards").innerHTML = "SOUTH INDIAN INDIA";
        }
        else if (bankID == 3) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO HDFC BANK";
            document.getElementById(id = "regards").innerHTML = "HDFC BANK";
        }
        else if (bankID == 4) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO ICICI BANK";
            document.getElementById(id = "regards").innerHTML = "ICICI BANK";
        }
        else if (bankID == 5) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO INDIAN BANK";
            document.getElementById(id = "regards").innerHTML = "INDIAN BANK";
        }
        else if (bankID == 6) {
            document.getElementById(id = "heading").innerHTML = "WELCOME TO CANARA BANK";
            document.getElementById(id = "regards").innerHTML = "CANARA BANK";
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