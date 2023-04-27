<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message  = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bars.iot181104@gmail.com';
        $mail->Password = 'fdwkvsevgynmunvu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('bars.iot181104@gmail.com');
        $mail->addAddress('ainsleycardozo11@gmail.com');
        $mail->addCC('bhaveshmore1899@gmail.com');
        $mail->addCC('ravi.vish4@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message for BARS_IOT received from contact:';
        $mail->Body = "Name: $name <br> Phone: $phone <br> Email: $email <br> Subject: $subject <br> Message:$message";

        $mail->send();
        $alert= "<div class='alert-success'><span>Message Sent!! Thanks for Contacting Us.</span</div>";
    
    } catch (Exception $e){
        $alert = "<div class='alert-error'><span>'.$e->getMessage().'</span</div>";
    }
}
echo "<script>
alert('Message has been delivered');
window.location.href='https://nbri.in/Portfolio/contact.html';
</script>";
?>