<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

function sendPasswordResetMail($link_to_passwordreset){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'warpnotifier.fvlib@hotmail.com';                 // SMTP username
        $mail->Password = 'penia3217';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('warpnotifier.fvlib@hotmail.com', 'Fellowship Village Library Catalog Mailer Service');
        $mail->addAddress('yellowstar107@gmail.com');     // Add a recipient     // Name is optional


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Fellowship Village Library Catalog Password Reset';
        $mail->Body    = 'Hello '.getFirstnameFromEmail($_POST['emailaddr']).",<br>Please click <a href='".$link_to_passwordreset."'>here</a> to reset your password.";
        $mail->AltBody = 'Go to '.$link_to_passwordreset." to reset your password.";

        $mail->send();
        //echo 'Message has been sent';

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}

$username_from_email = getUsernameFromEmail($_POST['emailaddr']);

function getUsernameFromEmail($email){

    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    $result = $conn->query("SELECT username FROM Users WHERE email=\"".$email."\"");
    if($result->num_rows == 0){return false;}
    while ($row = $result->fetch_assoc()){
        return $row['username'];
    }
}
function getFirstnameFromEmail($email){

    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    $result = $conn->query("SELECT firstname FROM Users WHERE email=\"".$email."\"");
    if($result->num_rows == 0){return false;}
    while ($row = $result->fetch_assoc()){
        return $row['firstname'];
    }
}
function getHashedPasswordFromEmail($email){
    $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
    $result = $conn->query("SELECT password FROM Users WHERE email=\"".$email."\"");
    if($result->num_rows == 0){return false;}
    while ($row = $result->fetch_assoc()){
        return $row['password'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="uifixes">
        <?php
            if ($username_from_email == false){
                $_SESSION['msg'] = "<p style='color:red' class='title'>The email address you entered: ".$_POST['emailaddr']." does not match any account in the database. Please try again.</p>";
                header("Location: /FVLibraryWebClient/UserUtils/ResetPasswordForm.php");
            }
            //echo $username_from_email."<br> ";
            //echo getPasswordResetLink($username_from_email);
            sendPasswordResetMail(getPasswordResetLink($username_from_email));
            echo "We have sent you a password reset link. Please check your email.";

            function getPasswordResetLink($username_from_email){
                $token_metadata = getHashedPasswordFromEmail($_POST['emailaddr']).getUsernameFromEmail($_POST['emailaddr']).date("Ymd.h");
                $token_metadata = hash('sha256', $token_metadata);
                $token = $_POST['emailaddr']."_".$token_metadata;
                $reset_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/FVLibraryWebClient/UserUtils/ResetPassword.php?token=".$token;
                return $reset_url;
            }
        ?>
    </div>
</body>
</html>
