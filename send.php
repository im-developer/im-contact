<?php

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