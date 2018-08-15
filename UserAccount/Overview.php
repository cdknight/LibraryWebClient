<?php
    require("../Assets/Header.php");

    if (!isset($_SESSION['username'])){
        //not logged in, dump at Login page to log in <i>with</i> msg
        $_SESSION['msg'] = "<div class='uifixes'><p style='color=red'>You must log in first in order to view your account overview.</p></div>";
        header("Location: ../Login.php");
    }
    require("../SQLUtils/GetConnection.php");
?>



<!DOCTYPE html>

<html>
<head>
    <title>Overview</title>
    <link rel="stylesheet" type="text/css" href="../Assets/main.css">
    <link rel="stylesheet" type="text/css" href="../Assets/modal.css">

</head>
<body>
<div class="uifixes">
        <div class="content">
            <h2 class="title">Account Information</h2>
            <?php
            if (isset($_SESSION['msg'])){
                echo($_SESSION['msg']);
                unset($_SESSION['msg']);
            }
            $conn = getDefaultConnection();
            $query= "SELECT * FROM Users WHERE username=\"".$_SESSION['username']."\"";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $aptnum = $row['apt'];
            }
            echo "<p class='title'>First Name: ".$firstname . "</p>";
            echo "<p class='title'>Last Name: ". $lastname . "</p>";
            echo "<p class='title'>Email Address: ". $email . "</p>";
            echo "<p class='title'>Apartment Number: ". $aptnum . "</p>";

            ?>
            <button class="rounded navbtn" onclick="show_modal()">Change</button>
            <script>
                $("#passwd_label").hide();
                $("#passwd").hide();
                function show_modal(){
                    $('.modal').show();
                    $('.modal').animate({top: '15%'});
                    $('.uifixes').hide();
                }
                function close_modal(){
                    $("#info").hide();
                    $("#change_data").show();
                    $('.modal').animate({top: '0%'});
                    $('.modal').hide();
                    $('.uifixes').show();
                    if (dataHasChanged){
                        location.reload();
                    }
                }

            </script>

        </div>

    </div>
    <div class="wrapper">
        <div class="modal">
            <div id="modal_header">
                <h2 class="title modal-title">Change</h2>

            </div>
            <div class="modal-content">
                <form id='change_data' method="POST" action='javascript:void(0);' onsubmit="sendForm()">
                    <label id="change_value_label" class="title" for="to_change">Information: </label>
                    <select name="to_change" class="navselect rounded" id="to_change">
                        <option value="emailaddr">Email Address</option>
                        <option value="aptnum">Apartment Number</option>

                    </select><br><br>
                    <label id="change_value_label" class="title" for="change-val">New Value: </label>


                    <input name="change_val" class="defaultinp"><br><br>
                    <label id="passwd_label" class="title" for="passwd">You must enter your password to continue: </label>
                    <input name="passwd" id="passwd" type="password" class="defaultinp"><br><br>
                    <input type="submit" class="rounded navbtn" id="changesubmit" value="Change">
                </form>
                <div id="info"></div>
                <button class="rounded navbtn rightfloat" onclick="close_modal()">Close</button>
            </div>
        </div>
    </div>
    <script>
        $('#to_change').on('change', function(){
            if ($("#to_change").val() === "emailaddr"){
                $("#passwd_label").show();
                $("#passwd").show();
            }
            else if($("#to_change").val() === "aptnum") {
                $("#passwd_label").hide();
                $("#passwd").hide();
            }
        });

        var dataHasChanged = false;
        function sendForm(){
            var details = $('#change_data').serialize();
            console.log('here');

            $.post('/FVLibraryWebClient/UserUtils/ChangeUserInformation.php', details, function(data){
                dataHasChanged = true;
                console.log('got recieved data');
                $("#change_data").hide();
                $("#info").html(data);
            })
        }
    </script>


</div>


</body>
</html>