<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: loginadmin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Catalog</title>
    <link rel="icon" href="../images/logo.png" type="logo/png">
    <link rel="stylesheet" href="../css/style.css"/>
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
    <div class="admin-content">
        <div class="admin-content-left">
            <h2>Welcome, <?php echo $_SESSION['admin_name']; ?>!</h2>
            <ul>
                <li><a href="#">Category</a>
                    <ul>
                        <li><a href="./categoryadd.php">Add Category</a></li>
                        <li><a href="./categorylist.php">Category List</a></li>
                    </ul>
                </li>
                <li><a href="#">Product Type</a>
                    <ul>
                        <li><a href="./brandadd.php">Add Product Type</a></li>
                        <li><a href="./brandlist.php">Product Type List</a></li>
                    </ul>
                </li>
                <li><a href="#">Product</a>
                    <ul>
                        <li><a href="./productadd.php">Add Product</a></li>
                        <li><a href="./productlist.php">Product List</a></li>
                    </ul>
                </li>
            </ul>
            <button><a href="./logout.php">Logout</a></button>
        </div>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lora', serif;
}
body {
    margin-top: 100px;
}
header {
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 50px;
    box-shadow: 0 1px 5px #696967;
    width: 100%;
    z-index: 1000; 
    background-color: #000;
}
header .logo img {
    width: 200px;
}
a {
    text-decoration: none;
}
ul {
    list-style: none;
}
.admin-content {
    display: flex;
    padding-top: 20px;
}
.admin-content-left {
    background-color: #c9c6c6;
    width: 20%;
    height: 100vh;
    padding: 30px 0 0 15px;
}
.admin-content-left a {
    color: #000;
}
.admin-content-left > ul > li > a{
    font-weight: bold;
}
.admin-content-left ul li {
    margin: 10px 0;
}
.admin-content-left ul ul {
    margin-left: 20px;
}
.admin-content-right {
    width: 80%;
    padding: 30px 0 0 15px;
}
.admin-content-right-category-add input {
    height: 30px;
    width: 200px;
    padding-left: 12px;
    margin-top: 20px;
}
.admin-content-right-category-add button {
    display: block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    background-color: #cba95c;
    border: none;
    color: #fff;
}
.admin-content-right-category-add button:hover {
    background-color: transparent;
    border: 1px solid #cba95c;
    color: #cba95c;
}
.admin-content-left button {
    display: block;
    margin: 10px 0 50px;
    height: 30px;
    width: 220px;
    cursor: pointer;
    background-color: #cba95c;
    border: none;
}
.admin-content-left button:hover {
    background-color: transparent;
    border: 1px solid #cba95c;
}
</style>