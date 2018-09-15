<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../vendor/autoload.php';
require 'EncryptLib.php';
require '../SQLUtils/GetConnection.php';
//require '../Configuration/config.php';
include_once '../Configuration/config.php';


function sendPasswordResetMail($emailaddr, $link_to_passwordreset)
{
    //var_dump();
    //die();

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("warpnotifier.fvlib@sendgrid.net", "Fellowship Village Library Catalog Notifier");
    $email->setSubject("Fellowship Village Library Catalog Password Reset");
    $email->addTo($emailaddr);
    $email->addContent('text/plain', 'Go to ' . $link_to_passwordreset . " to reset your password.");
    $email->addContent("text/html", 'Hello ' . getFirstnameFromEmail($_POST['emailaddr']) . ",<br>Please click <a href='" . $link_to_passwordreset . "'>here</a> to reset your password.");
    if (getenv("SG_API_KEY")){
        $sendgrid = new \SendGrid(getenv("SG_API_KEY"));
    }
    else {
        $sendgrid = new \SendGrid($GLOBALS['_lcc']['lc.mail.api_key']);
    }

    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";

    } catch (Exception $e) {
        $_SESSION['msg'] = '<p style="color:red" class="title">Sorry, we couldn\'t send the email to you. Check if your email is valid, and please ask the librarian to change it if it isn\'t.</p>';
        header("Location: /FVLibraryWebClient/UserUtils/ResetPasswordForm.php");
        die();
    }

}



function getUsernameFromEmail($email){

    $conn = getDefaultConnection();
    $result = $conn->query("SELECT username FROM Users WHERE email=\"".$email."\"");
    if($result->num_rows == 0){return false;}
    while ($row = $result->fetch_assoc()){
        return $row['username'];
    }
}
function getFirstnameFromEmail($email){

    $conn = getDefaultConnection();
    $result = $conn->query("SELECT firstname FROM Users WHERE email=\"".$email."\"");
    if($result->num_rows == 0){return false;}
    while ($row = $result->fetch_assoc()){
        return $row['firstname'];
    }
}
function getHashedPasswordFromEmail($email){
    $conn = getDefaultConnection();
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
            $username_from_email = getUsernameFromEmail($_POST['emailaddr']);
            //echo var_export($username_from_email, true);
            //die();
            if ($username_from_email == false){
                $_SESSION['msg'] = "<p style='color:green' class='title'>We have sent you a password reset link. Please check your email.<br>If you don't see the email, check your spam folder as some domains are known to blacklist the website this software usees to send this email.</p>";
                header("Location: /FVLibraryWebClient/UserUtils/ResetPasswordForm.php");
                die();
            }
            //echo $username_from_email."<br> ";
            //echo getPasswordResetLink($username_from_email);
            sendPasswordResetMail($_POST['emailaddr'], getPasswordResetLink($username_from_email));
            $_SESSION['msg']="<p style='color:green' class='title'>We have sent you a password reset link. Please check your email. If you don't see the email, check your spam folder as some domains are known to blacklist the website this software usees to send this email.</p>";
            header("Location: /FVLibraryWebClient/UserUtils/ResetPasswordForm.php");

            function getPasswordResetLink(){
                $token_metadata = getHashedPasswordFromEmail($_POST['emailaddr']).getUsernameFromEmail($_POST['emailaddr']).date("Ymd.h");
                $token_metadata = hash('sha256', $token_metadata);
                $token = encrypt($_POST['emailaddr'],'6bRoYBGlR2zjgYR4KcDD')."_".$token_metadata;
                $reset_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/FVLibraryWebClient/UserUtils/ResetPassword.php?token=".$token;
                return $reset_url;
            }
        ?>
    </div>
</body>
</html>
