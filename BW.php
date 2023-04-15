<!DOCTYPE html>
<html lang="en">

<head>
    <title>WELCOME TO THE BANK WORLD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="CSS\NEW.css" rel="stylesheet">
    <link href="CSS\st.css" rel="stylesheet">
    <link href="formcss.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(35, 35, 35);
            cursor: pointer;
            border: 20px;
            border-color: yellowgreen;
            border-spacing: 5px;
        }

        .ani {
            color: blueviolet;
            font-size: 30px;
            font-weight: italic;
            animation-name: animation;
            animation-duration: 25s;
        }

        @keyframes animation {
            form {
                color: rgb(8, 204, 248);
            }

            to {
                color: rgb(37, 19, 235);
            }
        }

        .ani1 {
            color: blueviolet;
            font-size: 30px;
            font-weight: italic;
            animation-name: animation1;
            animation-duration: 25s;
        }

        @keyframes animation1 {
            form {
                background-image: linear-gradient(to left, aquamarine, lightgreen);
            }

            to {
                background-image: linear-gradient(to right, rgb(10, 12, 127), rgb(31, 3, 43));
            }
        }

        img {
            box-sizing: border-box;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: .5cm;
            border-color: rgb(17, 17, 16);
            border-radius: 1cm;
            float: center;
            box-sizing: border-box;

        }

        p.e:hover {
            text-decoration: wavy;
        }

        .box img {
            width: 100%;
            height: 100%;
        }

        .box1 img {
            object-fit: cover;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-gap: 10px;
            background-color: #1b1b17;
            padding: 10px;
        }

        .grid-container>div {
            border: 20px;
            animation-name: animation1;
            animation-duration: 15s;
            background-image: linear-gradient(to left, aquamarine, lightgreen);
            padding-left: 10px;
            padding-top: 15px;
            padding-bottom: 15px;
            padding-right: 10px;
            border-radius: 5px;
            border: rgb(224, 71, 255);
            border-style: ridge;

        }
    </style>

    <?php
    session_start();
    ?>
</head>

<body background="fim.png">
    <?php
    if (isset($_POST['bankID'])) {
        $bankID = $_POST['bankID'];

        $_SESSION['bankID'] = $bankID;
    }
    ?>

    <div class="topnav" id="myTopnav">
        <a href="BW.php">Home</a>
        <a href="ABOUT.php">About</a>
    </div>
    </div>

    <h1 class="ani"
        style="color: rgb(206, 244, 251); border-color: black;border-radius: 0ch;border: aliceblue;font-size: 300%;font-weight: bolder;font-style: italic;color: black;">
        <center> BANK IN HAND</center>
    </h1>

    <h1
        style="background-color: rgb(14, 12, 127);font-size: 200%;color: rgb(231, 244, 255);;font-weight: bolder;font-style: italic;color: rgb(35, 35, 35);">
        <center> CHOOSE THE BANK</center>
    </h1>
    <center><sub>
            <p class="e" style="color: rgb(143, 205, 240);font-size: 200%;font-weight: 200;color: rgb(21, 217, 50);">
                HERE IS THE LIST OF REGISTERED BANKS</p>
        </sub></center>
    <hr />

    <div class="grid-container">


        <div class="img1">
            <p><a href="BRANCH.php" onclick="sbiBranch()"><img src="sbi.png" width="300" height="300"></a></p>
        </div>
        <div class="img2">
            <p><a href="BRANCH.php" onclick="sibBranch()"><img src="sib.png" width="300" height="300"></a></p>
        </div>
        <div class="img4">
            <p><a href="BRANCH.php" onclick="hdfcBranch()"><img src="hdfc.png" width="300" height="300"></a></p>
        </div>
        <div class="img6">
            <p><a href="BRANCH.php" onclick="iciciBranch()"><img src="icici.png" width="300" height="300"></a></p>
        </div>
        <div class="img5">
            <p><a href="BRANCH.php" onclick="inbBranch()"><img src="ib.png" width="300" height="300"></a></p>
        </div>
        <div class="img6">
            <p><a href="BRANCH.php" onclick="cbBranch()"><img src="canara.png" width="300" height="300"></a></p>
        </div>


    </div>

    <script>

        function sbiBranch() {
            localStorage.setItem('bankID', '1');
            localStorage.setItem('branchOne', 'Hosur Road Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "1";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function sibBranch() {
            localStorage.setItem('bankID', '2');
            localStorage.setItem('branchOne', 'Hosur Road Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "2";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function hdfcBranch() {
            localStorage.setItem('bankID', '3');
            localStorage.setItem('branchOne', 'Hosur Road Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "3";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function iciciBranch() {
            localStorage.setItem('bankID', '4');
            localStorage.setItem('branchOne', 'Hosur Road Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "4";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function inbBranch() {
            localStorage.setItem('bankID', '5');
            localStorage.setItem('branchOne', 'MG Road Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "5";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function cbBranch() {
            localStorage.setItem('bankID', '6');
            localStorage.setItem('branchOne', 'BTM Layout Branch');
            localStorage.setItem('branchTwo', 'Koramangala Branch');
            localStorage.setItem('branchThree', 'Jayanagar Branch');

            var bankID = "6";

            $.ajax({
                type: 'POST',
                url: 'BW.php',
                data: { bankID: bankID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
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