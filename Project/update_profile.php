<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $userEmail = $_POST["email"];
    $userFirstName = $_POST["firstname"];
    $userLastName = $_POST["lastname"];
    $userPassword = $_POST["password"];

  

    if (!empty($userPassword)) {
        $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }

   
    $stmt = $conn->prepare("UPDATE login_data SET first_name = ?, last_name = ?, pass = ? WHERE email = ?");
    $stmt->bind_param("ssss", $userFirstName, $userLastName, $userPassword, $userEmail);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
        header("Location:navbar.php");
    } else {
        echo "Profile update failed.";
    }

    $stmt->close();
    $conn->close();
}
?>
