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
    <link rel="stylesheet" href="../css/aboutus.css"/>
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
    <div class="blissful-bites-section">
        <h1 class="section-title">Discover the Passion Behind Blissful Bites</h1>
        <p class="section-content">
            At Blissful Bites, we believe that desserts are more than just food – they’re a celebration of life’s sweetest moments. 
            Our journey began with a deep love for creating happiness through baking. 
            Inspired by the magic of shared laughter over a slice of cake, the joy of discovering a new flavor, and the comfort of a familiar treat, we knew we wanted to craft desserts that bring people closer together.
        </p>
        <div class="image-placeholder"><img src="../images/about2.jpg" alt=""></div>
        <h2 class="section-subtitle">Our Story: From Dream to Reality</h2>
        <p class="section-content">
            Blissful Bites started as a small kitchen experiment fueled by endless curiosity and an adventurous palate. 
            The founders, passionate food enthusiasts with a global mindset, wanted to bring the world’s most beloved desserts under one roof. 
            From the elegant sophistication of French macarons to the warmth of Japanese mochi cakes, the boldness of Nordic cardamom buns, and the tropical allure of Brazilian brigadeiros, Blissful Bites was born to unite flavors from every corner of the world.
        </p>
        <div class="image-placeholder"><img src="../images/about1.jpg" alt=""></div>
        <h2 class="section-subtitle">Our Philosophy: Quality in Every Step</h2>
        <ul class="section-content">
            <li>We source <em><strong>premium ingredients</strong></em> from trusted suppliers worldwide, ensuring freshness and authenticity.</li>
            <li>Each dessert is <em><strong>handcrafted in small batches</strong></em> to maintain quality and deliver perfection in every bite.</li>
            <li>Our kitchen is a fusion of cultures and creativity, constantly innovating while respecting the roots of classic desserts.</li>
        </ul>
        <div class="image-placeholder"><img src="../images/about3.jpg" alt=""></div>
        <h2 class="section-subtitle">An Unparalleled Selection of Desserts</h2>
        <p class="section-content">
            - <em><strong>Western Desserts:</strong></em> Indulge in rich New York cheesecakes, airy Italian tiramisu, and buttery Danish pastries.<br>
            - <em><strong>Asian Desserts:</strong></em> Discover delicate matcha crepe cakes, creamy mango sticky rice puddings, and chewy taiyaki filled with sweet surprises.<br>
            - <em><strong>Nordic Desserts:</strong></em> Savor the rustic charm of Finnish pulla, light-as-air Swedish princess cakes, and hearty Norwegian kransekake.<br>
            - <em><strong>South American Desserts:</strong></em> Experience the vibrant flavors of Argentine alfajores, luscious Peruvian tres leches, and caramel-filled churros.
        </p>
        <div class="image-placeholder"><img src="../images/about5.jpg" alt=""></div>
        <h2 class="section-subtitle">Crafted with Love, Shared with Joy</h2>
        <p class="section-content">
            At Blissful Bites, our process is driven by passion and precision. 
            From kneading the dough to decorating the final layer of frosting, every step is guided by our mission: to bring you desserts that are as beautiful as they are delicious. 
            Whether you’re celebrating a milestone, savoring a quiet afternoon, or gifting someone special, Blissful Bites is here to make every moment sweeter.
        </p>
        <div class="image-placeholder"><img src="../images/about4.jpg" alt=""></div>
        <h2 class="section-subtitle">Let Us Sweeten Your Story</h2>
        <p class="section-content">
            Explore the world of Blissful Bites and find your new favorite dessert. 
            Every bite is a journey, every flavor a memory. Come taste the passion, the care, and the magic that go into creating desserts from around the globe.
        </p>
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