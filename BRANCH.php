<!doctype <!DOCTYPE html>
<html lang="en">

<head>
    <title>PLEASE SELECT YOUR BRANCH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="pc.css" rel="stylesheet">
    <link href="nav1.css" rel="stylesheet">
    <style>
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 1cm;
            border-color: rgb(131, 208, 243);
            border-radius: 1cm;
            box-sizing: border-box;
        }

        button {
            display: ruby-base-container;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>

    <?php
    session_start();
    ?>
</head>

<body background="imm1.png">
    <?php
    if (isset($_POST['branchID'])) {
        $branchID = $_POST['branchID'];

        $_SESSION['branchID'] = $branchID;
    }
    ?>

    <div class="topnav" id="myTopnav">
        <a href="BW.php">Home</a>
        <a href="ABOUT.php">About</a>
        
        <div class="topnav-right" id="myTopnav">
            <a href="BW.php">Back</a>
        </div>
    </div>
    <center>
        <h1 style="color:rgb(237, 242, 243);  font-size: 300%;">CHOOSE THE BRANCH</h1>
    </center>
    <p><a href=""></a></p>
    <div class="tb">
        <ol type="i" style="color: aliceblue; margin-left: 40%;">
            <li><button style="background-color: rgb(255, 0, 0);" class="button button4 "><strong><i><a href="MENU.php"
                                id="b1" onclick="firstBranch()"></a></i></strong></button></li>
            <li><button style="background-color: rgb(0, 255, 26);" class="button button4 "><strong><i><a href="MENU.php"
                                id="b2" onclick="secondBranch()"></a></i></strong></button></li>
            <li><button style="background-color: rgb(208, 255, 0);" class="button button4 "><strong><i><a
                                href="MENU.php" id="b3" onclick="thirdBranch()"></a></i></strong></button></li>
        </ol>
        <sub><b>
                <center>
                    <marquee direction="right">
                        <p style="color: rgb(233, 238, 215);">Select the circles below the location pointer to view the
                            direction to the bank depending on the respective button colour</p>
                    </marquee>
                </center>
            </b></sub>

    </div>
    <img src="mo3.png" alt="MAP" usemap="#IM" class="center"
        style="border: 2%;border-radius: 5cm;border-color: burlywood;">
    <map name="IM">
        <area shape="rect" coords="117,303,282,505" alt="branch1"
            href="https://www.google.com/maps/dir/12.9344792,77.6190993/State+Bank+of+India,+No+1,+Off+Hosur+Road,+Tavarekere+Main+Rd,+Chikka+Adugodi,+Bengaluru,+Karnataka+560029/@12.933366,77.6100689,16z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3bae1453665cd6bf:0x55e2e696d87091ab!2m2!1d77.6096908!2d12.9343852">
        <area shape="rect" coords="524,303,690,505" alt="branch2"
            href="https://www.google.com/maps/dir/12.9344792,77.6190993/State+Bank+of+India,+No+117,+Koramangala+Industrial+Layout,+7th+Block,+Koramangala,+Bengaluru,+Karnataka+560095/@12.9356151,77.6115843,16z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3bae144e0bf1e6f9:0x665acb1f3c1e20fc!2m2!1d77.6128241!2d12.9364079">
        <area shape="rect" coords="923,303,1094,505" alt="branch3"
            href="https://www.google.com/maps/dir/12.9344792,77.6190993/State+Bank+of+India+JAYANAGAR+II+BLOCK+(BENGALURU),+40%2F2,+Pattalamma+Temple+Rd,+opp.+A+V+HOSPITAL,+near+SOUTH+END+CIRCLE,+Basavanagudi,+Bengaluru,+Karnataka+560011/@12.9429736,77.5816356,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3bae15818d42e509:0xdb776d4d17c0b837!2m2!1d77.5791912!2d12.9374274">

    </map>

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
            localStorage.setItem('branchID', branch);

            var branchID = branch;

            $.ajax({
                type: 'POST',
                url: 'BRANCH.php',
                data: { branchID: branchID },
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
            localStorage.setItem('branchID', branch);

            var branchID = branch;

            $.ajax({
                type: 'POST',
                url: 'BRANCH.php',
                data: { branchID: branchID },
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
            localStorage.setItem('branchID', branch);

            var branchID = branch;

            $.ajax({
                type: 'POST',
                url: 'BRANCH.php',
                data: { branchID: branchID },
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

</body>

</html>