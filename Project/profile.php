<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userEmail = $_SESSION["user_id"];

// Fetch user data from the database
$stmt = $conn->prepare("SELECT first_name, last_name, email FROM login_data WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$stmt->bind_result($userFirstName, $userLastName, $userEmail);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f0f0f0;
            color: #777;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        #header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 40px;
        background: #136450;
        box-shadow: 0 20px 15px rgba(2,3,0.6,0.06);
        }
        #navbar {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #navbar li {
            list-style: none;
            padding: 0 20px;
        }
        #navbar li a {
            text-decoration: none;
            font-size: 17px;
            font-weight: 590;
            color: white;
            transition-duration:0.4s;
        }
        #navbar li a:hover {
            color: rgb(108, 231, 108);
        
        }
    </style>
</head>
<body>
    <section id="header">
    <ul id="navbar">
                <li><a href="navbar.php">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#Testimonials">Testimonial</a></li>
                <li><a href="clone.html">Cart</a></li>
                <?php
                if (isset($_SESSION["user_id"])) {

                echo '<li><a href="logout.php">Logout</a></li>';
                echo '<li><a href="profile.php">Logged in as ' . $_SESSION["user_name"] . '</a></li>';
                } else {
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="signup.php">Signup</a></li>';
                }
            ?>
    </section>
    <h1>User Profile</h1>

    <form action="update_profile.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo $userFirstName; ?>" required>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $userLastName; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $userEmail; ?>" required readonly>

        <label for="password">New Password:</label>
        <input type="password" name="password">

        <input type="submit" value="Save Changes">
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
