<?php
session_start();
$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$db = 'blissful_bites'; 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['login'])) {
    $admin_name = trim($_POST['admin_name']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE admin_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $admin_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['admin_name'];
            header("Location: slider.php");
            exit();
        } else {
            echo "<script>alert('Wrong password!');</script>";
        }
    } else {
        echo "<script>alert('Account does not exist!');</script>";
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="../images/logo.png" type="logo/png">
    <link rel="stylesheet" href="../css/admin.css"/>
    <link rel="stylesheet" href="../css/regular.min.css"/>
    <link rel="stylesheet" href="../css/fontawesome.min.css"/>
    <link rel="stylesheet" href="../css/solid.min.css"/>
    <link rel="stylesheet" href="../css/brands.min.css"/>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../images/brand.png" alt="Blissful Bites">
        </div>
    </header>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="loginadmin.php" method="POST">
            <label for="admin_name">Admin Name:</label>
            <input type="text" id="admin_name" name="admin_name" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <p>Only administrators can log in</p>
    <footer>
        <div class="footer-container">
            <div class="footer-socials">
                <ul>
                    <li><i class="fab fa-facebook"></i> <a href="#" target="_blank">Facebook</a></li>
                    <li><i class="fab fa-instagram"></i> <a href="#" target="_blank">Instagram</a></li>
                    <li><i class="fab fa-youtube"></i> <a href="#" target="_blank">YouTube</a></li>
                </ul>
            </div>
            <div class="footer-logo">
                <img src="../images/brand.png" alt="Blissful Bites">
            </div>
            <div class="footer-contact">
                <ul>
                    <li><i class="fas fa-phone"></i> <a href="#" target="_blank">028 7105 9999</a></li>
                    <li><i class="fas fa-map-marker-alt"></i>69/68 Dang Thuy Tram, 13, Binh Thanh, Ho Chi Minh</li>
                    <li><i class="fas fa-envelope"></i> <a href="#" target="_blank">info@blissfulbites.com</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>