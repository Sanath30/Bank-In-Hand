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
            <a href="CUSTOMER.php">Back</a>
        </div>
    </div>

    <?php
    session_start();
    include "formcss.php";
    include_once "connection.php";
    $pass = "";
    $state = "Close";

    $flag = 0;

    $cus_id = $_SESSION['cus_id'];

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["password"])) {
            $pass = test_input($_POST["password"]);
        }

        $sql = "SELECT * FROM customer where cus_id = '$cus_id' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            $sql = "Update account set state = '$state' where cus_id = '$cus_id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_query($conn, $sql)) {
                $redirect_url = "BW.php";
                $flag++;
            } else {
                echo "Error: " . $sql . ": " . mysqli_error($conn);
            }
        }
    }
    ?>
    <center>
        <h1 id="heading"></h1>
    </center>

    <CENTER><button class="box boxes">
            <CENTER>
                <h4>Account Closure</h4>
            </CENTER>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p>Dear customer,

                <p>We noticed that you have requested to close your account with our bank. We value your patronage and
                    would
                    like to confirm if this is your final decision. Closing your account will result in the permanent
                    closure of your account.</p>

                <p>If you are certain that you wish to proceed with the account closure, please enter your account
                    password
                    below to confirm the closure process.</p>
                <p>Password<input style="float: right; width: 500px; background: transparent;" type="password" id="password"
                        name="password" required></p>

        </button></CENTER>
    <CENTER><input class="option options" id="bt" type="submit"></CENTER>

    </form>

    <?php if ($flag > 0) { ?>

        <script>
            window.location.href = "<?php echo $redirect_url; ?>";
        </script>

    <?php } ?>


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