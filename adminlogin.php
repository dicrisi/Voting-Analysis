<?php
include('header.php');
include('style.php');

if (isset($_POST['login'])) {
    if ($_POST['uid'] == "admin" && $_POST['password'] == "admin") {
        echo '<script>alert("Login success");</script>';
        header("location:adminhome.php");
        exit();
    } else {
        echo '<script>alert("Login Failed");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
<br>
<br>
<br>
<br>
<br>
<br>

<body>

    <h2>Admin Login</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="uid"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid" required>

        <br>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <br>

        <input type="submit" name="login" value="Login" style="color: #000000" />
		<a href="index.php" style="color: black;">Back</a>

    </form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br
    <?php
    include('footer.php');
    ?>

</body>

</html>
