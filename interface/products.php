<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'blissful_bites';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;
$brand_id = isset($_GET['brand_id']) ? (int)$_GET['brand_id'] : null;
$search = isset($_GET['search']) ? trim(htmlspecialchars($conn->real_escape_string($_GET['search']))) : null;
$whereClause = [];
if ($search) {
    $whereClause[] = "product_name LIKE '%$search%'";
}
if ($category_id) {
    $whereClause[] = "category_id = $category_id";
}
if ($brand_id) {
    $whereClause[] = "brand_id = $brand_id";
}
$whereSql = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';
$sql = "SELECT * FROM tbl_product $whereSql";
$result_id = $conn->query($sql);
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
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'default';
$order_by = '';
if ($sort_order == 'low-to-high') {
    $order_by = 'ORDER BY product_price ASC'; 
} elseif ($sort_order == 'high-to-low') {
    $order_by = 'ORDER BY product_price DESC'; 
}
$sql = "SELECT * FROM tbl_product $whereSql $order_by";
$result_id = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blissful Bites</title>
    <link rel="icon" href="../images/logo.png" type="logo/png">
    <link rel="stylesheet" href="../css/products.css"/>
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
                <form method="GET" action="../interface/products.php" class="search-form">
                    <input 
                        placeholder="Search" 
                    type="text" 
                    id="search-input" 
                    name="search" 
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </form>
                <li><a class="fas fa-user" href="../admin/loginadmin.php"></a></li>
                <li><a class="fas fa-shopping-bag" href="../interface/cart.php"></a></li>
            </ul>
        </div>
    </header>
    <div class="category">
        <div class="container">
            <div class="row">
                <div class="category-left">
                    <ul>
                        <?php foreach ($menu_data as $category_id => $category): ?>
                            <li class="category-left-li">
                                <a href="../interface/products.php?category_id=<?php echo $category_id; ?>">
                                    <?php echo $category['category_name']; ?>
                                </a>
                                <?php if (!empty($category['brands'])): ?>
                                    <ul>
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
                </div>
                <div class="category-right row">
                    <div class="category-right-top">
                        <p>Products</p>
                        <form method="GET" action="../interface/products.php">
                            <select name="sort_order" id="sort-price" onchange="this.form.submit()">
                                <option value="default" <?php echo ($sort_order == 'default' ? 'selected' : ''); ?>>Default Sorting</option>
                                <option value="low-to-high" <?php echo ($sort_order == 'low-to-high' ? 'selected' : ''); ?>>Sort by price: low to high</option>
                                <option value="high-to-low" <?php echo ($sort_order == 'high-to-low' ? 'selected' : ''); ?>>Sort by price: high to low</option>
                            </select>
                        </form>
                    </div>
                    <div class="search-results">
                        <?php if ($search): ?>
                            <p>Results for "<strong><?php echo htmlspecialchars($search); ?></strong>": <?php echo $result_id->num_rows; ?> product(s) found.</p>
                        <?php endif; ?>
                    </div>
                    <div class="category-right-content row">
                        <?php
                        if ($result_id && $result_id->num_rows > 0) {
                            while ($row = $result_id->fetch_assoc()) {
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $product_img = $row['product_img'];
                                $product_id = $row['product_id'];
                                $product_price_float = (float)$product_price;
                        ?>
                        <div class="category-right-content-item">
                            <a href="../interface/product_detail.php?product_id=<?php echo $product_id; ?>">
                                <img src="../images/<?php echo $product_img; ?>" alt="<?php echo $product_name; ?>">
                            </a>
                            <h1><?php echo $product_name; ?></h1>
                            <p>$<?php echo number_format($product_price_float, 2); ?></p>
                        </div>
                        <?php
                        }
                        } else {
                            echo "<p>No products found.</p>";
                        }
                        ?>
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
    <script src="../js/product.js"></script>
</body>
</html>