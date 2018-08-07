
<!DOCTYPE html>


<head>
    <link rel="stylesheet" type="text/css" href="/FVLibraryWebClient/Assets/main.css">
    <link rel="stylesheet" type="text/css" href="/FVLibraryWebClient/Assets/header.css"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/FVLibraryWebClient/Images/fvlogo.png">
    <script src="/FVLibraryWebClient/Assets/jquery.min.js"></script>
</head>

<body>
        <script src="/FVLibraryWebClient/Assets/sweetalert.min.js"></script>
        <script>

            $(document).ready(function(){
                    $( '#ajax_logout_btn' ).show();

            });
        </script>

        <div class="nav">
            <ul>
            <li><div class="dropdown" id="logodropdown">
                    <a href="/FVLibraryWebClient/index.php" class="nonlink"><button class="rounded navbtn"><img alt="Search" src="/FVLibraryWebClient/Images/fvlogo.png" class="fvlogo  "></button></a>
                    <div id="dropdown-options">

                        <a class="nohover">Home</a>
                    </div>
                </div></li>
            <li><div class="dropdown">
                    <button class='rounded navbtn'><img alt="Search" src="/FVLibraryWebClient/Images/search.svg" class="invert"></button>
                    <div id="dropdown-options">
                        <a href="/FVLibraryWebClient/Search/Search.php">Search</a>
                        <a href="/FVLibraryWebClient/Search/AdvancedSearch.php">Advanced Search</a>

                    </div>
                </div></li>
            <li><a href="/FVLibraryWebClient/Search/Search.php"></a></li>
            <?php
            session_start();
            if (!isset($_SESSION['username'])){
                if ($_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/Login.php" || $_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/UserUtils/DoResetPassword.php" || $_SERVER['REQUEST_URI'] != "/FVLibraryWebClient/index.php" || $_SERVER["REQUEST_URI"] != "/FVLibraryWebClient/Login.php"){
                    $_SESSION['next'] = $_SERVER["REQUEST_URI"];
                }
                echo "<li><div class='dropdown'>";
                echo "<a href=\"/FVLibraryWebClient/Login.php\"><button class='rounded navbtn'><img alt='Login' src='/FVLibraryWebClient/Images/login.svg' class='invert'></button></a>";
                echo "<div id='dropdown-options'><a class='nohover'>Log In</a></div>";
                echo "</div></li>";
            }
            elseif(isset($_SESSION['username'])){
                echo "<li><div class='dropdown'><a href='/FVLibraryWebClient/UserAccount/Overview.php'><button class='rounded navbtn'><img src='/FVLibraryWebClient/Images/overview.svg' class='invert' alt='Account Overview'></button></a><div id='dropdown-options'><a class='nohover'>Account Overview</a></div></div></li>";
                echo "<li><div class='dropdown'>";
                echo "<button class='rounded navbtn'><img src='/FVLibraryWebClient/Images/book.svg' class='invert' alt='Items Out/Requests'></button>";
                echo "<div id='dropdown-options'>";
                echo "<a href='/FVLibraryWebClient/UserAccount/Requests.php'>Requests</a>";
                echo "<a href='/FVLibraryWebClient/UserAccount/ItemsOut.php'>Items Out</a>";
                echo "</div></li>";
                echo "<li><div class='dropdown'>";

                echo "<button id='ajax_logout_btn' style='display:none' onclick='ajax_logout()' class='rounded navbtn'><img src='/FVLibraryWebClient/Images/logout.svg' class='invert' alt='Logout'> </button>";
                echo "<noscript><a href='/FVLibraryWebClient/UserUtils/Logout.php'><button class='rounded navbtn'><img src='/FVLibraryWebClient/Images/logout.svg' class='invert' alt='Logout'> </button></a></noscript>";
                //echo "<li><a class='title whitetext right'>Welcome, ".$_SESSION['username']."!</a></li>";
                echo "<div id='dropdown-options'>";
                echo "<a class='nohover'>Logout</a>";
                echo "</div>";
                echo "</div></li>";
            }

            ?>
            </ul>
        </div>

        <script>
            function ajax_logout(){
                console.log("hi?");
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState === 4 && this.status === 200){

                        if (xmlhttp.responseText === "success"){
                            swal({
                                title: "Logout",
                                text: "You have been logged out successfully!",
                                icon: "success",
                                button: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "rounded navbtn",
                                    closeModal: true
                                }
                            }).then(function(confirmVar){
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
                xmlhttp.open("GET", "/FVLibraryWebClient/UserUtils/Logout.php?ajax=true", true);
                xmlhttp.send();
            }
        </script>

</body>