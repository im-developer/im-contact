<?php
/*
Hello, My friend have account on paypal and i so when i put my visa card to my account worked well but when i removed it so and when my friend used it did not work i linked the visa card after reading https://www.paypal.com/qa/selfhelp/article/can-i-link-the-same-card-to-more-than-one-paypal-account-faq1757 and this https://www.paypal.com/qa/selfhelp/article/How-do-I-remove-a-credit-or-debit-card-from-my-PayPal-account-FAQ1862 All i need now to remove visa card that ends with 8160 so my friend can use it to his account !

My friends account is dev.co0der@gmail.com


ec2-35-160-30-78.us-west-2.compute.amazonaws.com
Administrator
LSc-ujB;up
 */
header('Content-Type: application/json');
function sendMail($to, $subject, $message, $from) {
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
//    $headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    return mail($to, $subject, $message, $headers);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $info = isset($_POST['info']) ? $_POST['info'] : null;

    if( !$name || !$email || !$price || !$info ) {
        echo json_encode([
            "message"   => "جميع الحقول مطلوبة",
            "success"   => false
        ]);
        exit;
    } else {
        echo json_encode([
            "success"   => true,
            "message"   => "تم ارسال الرسالة بنجاح سيتم الرد عليك قريبا."
        ]);
        exit;
    }

} else {
    http_response_code(404);
}