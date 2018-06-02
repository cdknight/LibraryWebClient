
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <div class="vertnav">
            <a href="/FVLibraryWebClient/index.php" class="nonlink"><b style="font-family: "Verdana">FVLibraryCatalog</b></a><br><br>
            <a href="/FVLibraryWebClient/Search.php"><button class='rounded navbtn'>Search</button> </a><br><br>
            <?php
            session_start();
            if (!isset($_SESSION['username'])){
                echo "<a href=\"/FVLibraryWebClient/Login.php\"><button class='rounded navbtn'>Login</button></a><br><br>";
            }
            elseif(isset($_SESSION['username'])){
                echo "<a href='/FVLibraryWebClient/UserAccount/Overview.php'><button class='rounded navbtn'>Account Overview</button></a><br><br>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/Requests.php'><button class='rounded navbtn'>Requests</button></a><br><br>";
                echo "<li><a href='/FVLibraryWebClient/UserAccount/ItemsOut.php'><button class='rounded navbtn'>Items Out</button></a><br><br>";
                echo "<button onclick='ajax_logout()' class='rounded navbtn'>Log Out</button><br><br>";
                echo "<li class='nonhover'><a  style='float: left'>Welcome, ".$_SESSION['username']."!</a></li>";

            }

            ?>
        </div>
        <script>
            function ajax_logout(){
                console.log("hi?");
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){

                        if (xmlhttp.responseText == "success"){
                            swal("Logout", "You have been logged out successfully! Click \"Ok\" to go home.", "success").then(function(confirmVar){
                                location.href = "/FVLibraryWebClient/index.php"
                            });

                        }
                        else if (xmlhttp.responseText = "fail"){
                            swal("Error: No user is logged in", "fail");
                        }
                    }
                };
                xmlhttp.open("GET", "/FVLibraryWebClient/UserUtils/Logout.php", true);
                xmlhttp.send();
            }
        </script>

</body>