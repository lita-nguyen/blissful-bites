<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'blissful_bites';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql_products = "SELECT * FROM tbl_product";
$result_products = $conn->query($sql_products);
$sql_categories = "SELECT c.category_id, c.category_name, b.brand_id, b.brand_name 
                   FROM tbl_category c 
                   LEFT JOIN tbl_brand b 
                   ON c.category_id = b.category_id 
                   ORDER BY c.category_id, b.brand_name";
$result_categories = $conn->query($sql_categories);
$menu_data = [];
if ($result_categories && $result_categories->num_rows > 0) {
    while ($row = $result_categories->fetch_assoc()) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $brand_id = $row['brand_id'];
        $brand_name = $row['brand_name'];
        if (!isset($menu_data[$category_id])) {
            $menu_data[$category_id] = [
                'category_name' => $category_name,
                'brands' => []
            ];
        }
        if ($brand_id) {
            $menu_data[$category_id]['brands'][] = [
                'brand_id' => $brand_id,
                'brand_name' => $brand_name
            ];
        }
    }
}
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;
$brand_id = isset($_GET['brand_id']) ? (int)$_GET['brand_id'] : null;
$whereClause = "";
if ($category_id) {
    $whereClause = "WHERE category_id = $category_id";
} elseif ($brand_id) {
    $whereClause = "WHERE brand_id = $brand_id";
}
$sql = "SELECT * FROM tbl_product $whereClause";
$result_id = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blissful Bites</title>
    <link rel="icon" href="../images/logo.png" type="logo/png">
    <link rel="stylesheet" href="../css/cart.css"/>
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
        <nav class="menu">
            <ul>
                <li><a href="../interface/home.php">Home</a></li>
                <li><a href="../interface/aboutus.php">About Us</a></li>
                <li><a href="../interface/products.php">Products</a>
                    <ul class="sub-menu">
                        <?php foreach ($menu_data as $category_id => $category): ?>
                            <li>
                            <a href="../interface/products.php?category_id=<?php echo $category_id; ?>">
                                <?php echo $category['category_name']; ?>
                            </a>
                            <?php if (!empty($category['brands'])): ?>
                                <ul class="sub-menu-1">
                                    <?php foreach ($category['brands'] as $brand): ?>
                                        <li>
                                            <a href="../interface/products.php?brand_id=<?php echo $brand['brand_id']; ?>">
                                                <?php echo $brand['brand_name']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="../interface/contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="others">
            <ul>
                <li>
                    <input placeholder="Search" type="text" id="search-input">
                </li>
                <li><a class="fas fa-user" href="../admin/loginadmin.php"></a></li>
                <li><a class="fas fa-shopping-bag" href="../interface/cart.php"></a></li>
            </ul>
        </div>
    </header>
    <div class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="cart-top-address cart-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cart content row">
                <div class="cart-content-left">
                    <table>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            <td><img src="../images/bestseller1.png" alt=""></td>
                            <td><p>Cromboloni Cake</p></td>
                            <td><p>$10.00</p></td>
                            <td><input type="number" value="1" min="1" class="quantity"></td>
                            <td><p>$10.00</p></td>
                            <td><span>x</span></td>
                        </tr>
                    </table>
                </div>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">Cart totals</th>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>$10.00</td>
                        </tr>
                        <tr>
                            <td>Total Shipping</td>
                            <td>$10.00</td>
                        </tr>
                        <tr>
                            <td>Total Payment</td>
                            <td>$20.00</td>
                        </tr>
                    </table>
                    <div class="cart-content-right-button">
                        <a href="../interface/products.php">
                            <button>Continue Shopping</button>
                        </a>
                        <a href="../interface/delivery.php">
                            <button>Purchase</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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