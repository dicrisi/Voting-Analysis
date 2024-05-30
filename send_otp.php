<?php
include('config.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    // Debugging: Output the email received
    echo "Received email: " . $email . "<br>";

    // Generate OTP
    $otp = generateOTP(); // Assuming generateOTP() function is defined in config.php
    // Debugging: Output the generated OTP
    echo "Generated OTP: " . $otp . "<br>";

    // Send OTP
    $sent = sendOTP($email, $otp); // Assuming sendOTP() function is defined in config.php
    if($sent) {
        // Debugging: Output success message
        echo "OTP sent successfully<br>";
        echo json_encode(array("success" => true));
    } else {
        // Debugging: Output failure message
        echo "Failed to send OTP<br>";
        echo json_encode(array("success" => false));
    }
} else {
    // Debugging: Output error message if email is not received
    echo "Email not received<br>";
    echo json_encode(array("success" => false));
}
?>
