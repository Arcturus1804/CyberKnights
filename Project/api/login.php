<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginform</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="loginForm">
        <h1 class="heading">Login</h1>
        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">
            <div class="input-box">
                <input type="email" placeholder="Username" id="email" name="email" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required>
                <i class="fa-solid fa-lock lock"></i>
            </div>
            <div class="fgtpass"><a href="">Forget password?</a></div>
            <div class="input-box">
                <input type="submit" value="LOGIN">
            </div> 
            <p class="sig">Not a member?<a  href="signup.php" class="sign">Signup now</a></p>   
        </form>
    </div>
    
    
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

  
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT First_name,email , pass FROM login_data WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_name,$user_email, $user_password);
    $stmt->fetch();

    if (password_verify($password, $user_password)) {
        $_SESSION["user_id"] = $user_email;
        $_SESSION["user_name"]=$user_name;
        echo "Login successful!";
        header("Location: navbar.php"); 
    } else {
        echo "Login failed. Please check your username and password.";
        header("Location: login.php");
    }

    $stmt->close();
    $conn->close();
}
?>
