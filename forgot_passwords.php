<?php
include("connections.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

// Check if the Recover form is submitted
if(isset($_POST['Recover']))
{
    // Get the user's email address
    $recover_email = $_POST['email_log'];

    // Connect to the database and execute the query to get user information
    $query = "SELECT * FROM client WHERE clint_email = '".$recover_email."'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    $row1 = mysqli_fetch_array($result);

    // If the email is valid, send the recovery email
    if($rows > 0)
    {
        $send_password = $row1['clint_pass'];
        $send_email = $row1['clint_email'];

        $mail = new PHPMailer(true);
        try {
            // Configure SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'aschaurasia10@hotmail.com'; // Your Hotmail email address
            $mail->Password = 'Ashu4047:)'; // Your Hotmail password
            $mail->Port = 587; // SMTP port

            // Sender and recipient email address
            $mail->setFrom('aschaurasia10@hotmail.com', 'GMART');
            $mail->addAddress($send_email, 'User');

            // Email subject and body
            $mail->Subject = 'Your Password';
            $mail->Body    = 'Thank you for reaching out to us. I understand that you have forgotten your password and your password is :'.$send_password.'

For security reasons, you should change your password.We can assist you in resetting your password so that you can regain access to your account. To reset your password, please follow the instructions login with this password.(Go to- My Profile - Change password).

Please note that it is important to create a strong and unique password that is difficult for others to guess. This will ensure the security of your account and your personal information.

If you have any further questions or concerns, please do not hesitate to contact us. We are available 24/7 to assist you.

Thank you for your understanding.

Best regards,


GMART GROCERY';
            // Send email
            $mail->send();
            echo "<script type=\"text/javascript\">
                    alert('Please check your ".$send_email." mail account !! Your Password Has Being Sent to Your Mail Box. Thank You !!');
                    window.location = 'login.php'; // Redirect to login page
                </script>";
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    else // If the email is invalid, show an error message
    {
        echo "<script type=\"text/javascript\">
                alert('@-Mail id is not Valid !!');
            </script>";
    }
}
?>
