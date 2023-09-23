<?php
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/SMTP.php');

require_once('common.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

submit_init();
validation();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
</head>
<body>    
<?php
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = HOST;
$mail->Username = USER_NAME;
$mail->Password = PASSWORD;
$mail->Encoding = '7bit';
$mail->CharSet = 'UTF-8';
// $mail->SMTPSecure = 'tls';
// $mail->Port = 587;

$mail->setFrom(FROM_ADDRESS, FROM_NAME);
$mail->addAddress($sanitize['email'], $sanitize['name']);
$mail->Subject = $sanitize['title'];
$mail->Body = $sanitize['message'];

/**
 * 送信時セッションを削除
 */
unset($_SESSION['flash']);
unset($_SESSION['before']);

if($mail->send()){
    echo "送信完了";
}else{
    echo "送信失敗<br>";
    echo $mail->ErrorInfo;
}
?>
</body>
</html>