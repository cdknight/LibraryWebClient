
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="/FVLibraryWebClient/Assets/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/FVLibraryWebClient/Assets/jquery.min.js"></script>
</head>

<body>
        <script src="/FVLibraryWebClient/Assets/sweetalert.min.js"></script>
        <div class="vertnav">
            <a href="/FVLibraryWebClient/index.php" class="nonlink"><b style="font-family: "Verdana">Fellowship Village Library Catalog</b></a><br><br>
            <a href="/FVLibraryWebClient/Search/Search.php"><button class='rounded navbtn'><span>Search </span></button></a><br><br>
            <?php
            session_start();
            if (!isset($_SESSION['username'])){
                if ($_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/Login.php" || $_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/UserUtils/DoResetPassword.php" || $_SERVER['REQUEST_URI'] != "/FVLibraryWebClient/index.php" || $_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/Login.php"){
                    $_SESSION['next'] = $_SERVER["REQUEST_URI"];
                }
                echo "<a href=\"/FVLibraryWebClient/Login.php\"><button class='rounded navbtn'><span>Login </span></button></a><br><br>";
            }
            elseif(isset($_SESSION['username'])){
                echo "<a href='/FVLibraryWebClient/UserAccount/Overview.php'><button class='rounded navbtn'><span>Account Overview </span></button></a><br><br>";
                echo "<a href='/FVLibraryWebClient/UserAccount/Requests.php'><button class='rounded navbtn'><span>Requests </span></button></a><br><br>";
                echo "<a href='/FVLibraryWebClient/UserAccount/ItemsOut.php'><button class='rounded navbtn'><span>Items Out </span></button></a><br><br>";
                echo "<button onclick='ajax_logout()' class='rounded navbtn'><span>Log Out </span></button><br><br>";
                echo "<a class='title' style='float: left'>Welcome, ".$_SESSION['username']."!</a>";

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
                            swal("Logout", "You have been logged out successfully!", "success").then(function(confirmVar){
                                if (window.location.pathname.includes("/FVLibraryWebClient/UserAccount")){
                                    location.href = "/FVLibraryWebClient/Login.php";
                                }
                                else{
                                    window.location.reload();
                                }
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