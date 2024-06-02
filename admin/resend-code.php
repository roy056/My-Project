<?php
session_start();
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function resend_email_verify($name, $email, $password)
{
    include('config.php');

    $code = rand(111111,999999);
    $sql = "UPDATE users SET code='$code' WHERE email='$email'";
    mysqli_query($conn, $sql);
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dibakarroy0804@gmail.com';                     //SMTP username
    $mail->Password   = 'ujzphzeemjnsopoh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dibakarroy0804@gmail.com');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Resend OTP';
    $mail->Body    = "Welcome to 'Alu-potol' where veggies and non-veggies coexist Peacefully.. Here is your 6-digit verification code:" .$code;

    $mail->send();
}

if(isset($_POST['resend_email_verify_btn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $checkemail_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($conn, $checkemail_query);



        if(mysqli_num_rows($checkemail_query_run) > 0)
        {
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row['email'] == $_POST['email'])
            {
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];

                resend_email_verify($name,$email,$password);
                
                $_SESSION['status'] = "An OTP has been sent to your email address";
                header("Location: otp.php?email=$email");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Email already verified. Please Login";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Email is not registered. Please Register!";
            header("Location: register.php");
            exit(0);
        }


    }
    else
    {
        $_SESSION['status'] = "Please enter your email";
        header("Locatioin: resend-email-verification.php");
        exit(0);
    }
}

?>