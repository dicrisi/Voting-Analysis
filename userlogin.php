<?php
include('header.php');
include('style.php');
include('config.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');

error_reporting(0);
session_start();
// Function to generate OTP
function generateOTP($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// Function to send OTP email
function sendOTP($to, $otp) {
    global $configVars; // Access global configuration variables

    $email = new Email();
    $email->set_from($configVars['my_email']);
    $email->set_from_name('OTP');
    $email->set_subject("OTP Details");
    $email->set_message("Hi, your OTP is: $otp");
    $email->add_to($to);
    $sent_flag = $email->send();
    return $sent_flag;
}

if(isset($_POST['generate_otp'])) {
    $email = $_POST['name'];
	 
	// Assuming user enters email instead of username
    
    // Check if the email exists in the database
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysql_query($query);

    if(mysql_num_rows($result)) {
        // Email exists, generate and send OTP
        $otp = generateOTP();
        $_SESSION['otp'] = $otp; // Store OTP in session
       
        $sent = sendOTP($email, $otp); // Send OTP to user's email

        if($sent) {
            // Redirect to the same page with email prefilled in OTP field
            $query = "UPDATE `user` SET otp = '" . $_SESSION['otp'] . "' WHERE email = '$email'";
            mysql_query($query);
        } else {
            // Failed to send OTP
            echo '<script> alert("Failed to send OTP. Please try again later."); </script>';
        }
    } else {
        // Email not found
        echo '<script> alert("Email not found. Please enter a valid email."); </script>';
    }
}

// Check if login button is clicked
if(isset($_POST['login'])) {
   // $enteredOTP = $_POST['otp'];

    // Check if entered OTP matches the stored OTP in the session
    //if($enteredOTP == $_SESSION['otp']) {
        // OTP matched, proceed to login

		// Assuming user enters email instead of username


$query ="select * from  user where email='".$_POST['name']."' and otp ='".$_POST['otp']."' and login='no'";
	$result = mysql_query($query);
	if(mysql_num_rows($result))
		{
	$row = mysql_fetch_assoc($result);
	        $email = $_POST['name'];
		   $_SESSION['login_user'] = $username;
           $_SESSION['email'] = $_POST['name']; 
	  $_SESSION['id'] = $id;
	

		echo '<script> alert("Login success"); window.location.href = "viewcandidate.php" </script>';
		}

 else {
        // Incorrect OTP entered
        echo '<script> alert("Incorrect OTP. Please try again."); </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            background-image: url('vote.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-top: 50px;
        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>User Login</h2>
    <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="name" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" >
        <br>
        <input type="submit" name="generate_otp" value="Generate OTP" style="color: #000000" />
        <br>
        <label for="otp"><b>OTP</b></label>
        <input type="text" id="otp" placeholder="Enter OTP" name="otp" >
        <br>
        <input type="submit" name="login" value="Login" style="color: #000000" />
        <br>
        <br>
        <input type="button" value="New Register" onclick="location.href='register.php'" style="color: #000000;" />
    </form>
</body>

</html>
