
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body>
    
    <div class="signForm">
        <h1 class="heading">Sign up</h1>
        <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <div class="input-box">
                <input type="text" placeholder="Firstname" id="Firstname" name="Firstname" required>
                <i class="fa-solid fa-user "></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Lastname" id="Lastname" name="Lastname" required>
                <i class="fa-solid fa-user user"></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" id="Email" name="Email" required>
                <i class="fa-solid fa-envelope envelop"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="Password" name="Password" required>
                <i class="fa-solid fa-lock loc2"></i>
            </div>
            <div class="fgtpass"><a href="">Forget password?</a></div>
            <div class="input-box">
                <input type="submit" value="SIGN UP">
            </div> 
            <p class="log">Already a member?<a href="login.php" class="login">Login now</a></p>   
        </form>
    
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $firstname = $_POST["Firstname"];
    $lastname = $_POST["Lastname"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    // Hash
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    try {
        
        $stmt = $conn->prepare("INSERT INTO login_data (first_name, last_name, email, pass) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
    
        if ($stmt->execute()) {
            echo "Registration successful!";
            header("location: login.php");
        } else {
            throw new Exception("Email already exists");
        }
    } catch (Exception $e) {
        echo "<script type='text/javascript'>
                if(window.alert('This email already exists, try another email.')){
                    loaction.reload();
                };
              </script>";
    }
    
    
    

    $stmt->close();
    $conn->close();
}
?>