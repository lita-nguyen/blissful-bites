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
    <link rel="stylesheet" href="../css/home.css"/>
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
                    <form action="search_results.php" method="GET">
                        <input placeholder="Search" type="text" name="search" id="search-input">
                        <button type="submit" style="display:none;">Search</button>
                    </form>
                </li>
                <li><a class="fas fa-user" href="../admin/loginadmin.php"></a></li>
                <li><a class="fas fa-shopping-bag" href="../interface/cart.php"></a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="myslides">
            <img src="../images/chocolatecake.jpg" alt="Chocolate Cake">
            <div class="text-overlay text-header">Welcome to Blissful Bites!</div>
            <div class="text-overlay text-subheader">Where Every Bite Tells a Sweet Story</div>
        </div>
        <div class="myslides">
            <img src="../images/tiramisucake.jpg" alt="Tiramisu Cake">
            <div class="text-overlay text-header">Welcome to Blissful Bites!</div>
            <div class="text-overlay text-subheader">Where Every Bite Tells a Sweet Story</div>
        </div>
        <div class="myslides">
            <img src="../images/cheesecake.jpg" alt="Cheesecake">
            <div class="text-overlay text-header">Welcome to Blissful Bites!</div>
            <div class="text-overlay text-subheader">Where Every Bite Tells a Sweet Story</div>
        </div>
        <div class="myslides">
            <img src="../images/strawberrycake.jpg" alt="Strawberry Cake">
            <div class="text-overlay text-header">Welcome to Blissful Bites!</div>
            <div class="text-overlay text-subheader">Where Every Bite Tells a Sweet Story</div>
        </div>
        <div class="myslides">
            <img src="../images/macarons.jpg" alt="Macarons">
            <div class="text-overlay text-header">Welcome to Blissful Bites!</div>
            <div class="text-overlay text-subheader">Where Every Bite Tells a Sweet Story</div>
        </div>
        <a class="prev" id="prev">&#10094;</a>
        <a class="next" id="next">&#10095;</a>
    </div>
    <div class="introduction">
        <div class="text-content">
            <p>Imagine a serene morning, sunlight streaming through the window, and on your table sits a delicate cake, its velvety layers melting with every bite. At Blissful Bites, we turn those moments into reality!</p>
            <p>Here, we do not just bake cakes; we craft delightful joy into every flavor. From dainty cupcakes and luscious mousse cakes to custom-designed celebration masterpieces – every creation is handmade with passion and the finest ingredients.</p>
            <p>Are you ready to immerse yourself in a world of irresistible sweetness, where every sense is awakened? Let Blissful Bites brighten your day with unforgettable treats crafted just for you.</p>
            <p>Discover the magic and indulge in the blissful taste of every bite today!</p>
        </div>
        <div class="image-container">
            <img src="../images/chocolatecake1.jpg" alt="Chocolate Cake1">
            <img src="../images/blueberriescake.jpg" alt="Blueberries Cake">
        </div>
    </div>
    <div class="intro-section">
        <div class="text-center">
            <h1>Our patisserie produces unique sweets for lovers of yummy</h1>
        </div>
        <div class="image-container-1">
            <div class="image-wrapper">
                <img src="../images/stollen.png" alt="Patisserie Image">
                <div class="overlay-text">
                    <div class="left-text">
                        <p>At Blissful Bites, we are committed to delivering the highest quality baked goods made with the finest ingredients, ensuring every bite brings joy and satisfaction.</p>
                    </div>
                    <div class="right-text">
                        <p><i class="fas fa-cogs"></i> Premium ingredients</p>
                        <p><i class="fas fa-hand-holding-heart"></i> Handcrafted in small batches</p>
                        <p><i class="fas fa-globe"></i> Fusion of cultures</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="delicious">
        <div class="text-center">
            <h1>Discover Sweet Delicious</h1>
        </div>
        <div class="image-best-seller">
            <div class="product">
                <a href="#">
                    <img src="../images/bestseller1.png" alt="Product 1">
                </a>
                <div class="info">
                    <p><a href="#">Cromboloni Cake</a></p>
                    <p>$10.00</p>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <a href="#">
                    <img src="../images/bestseller2.png" alt="Product 2">
                </a>
                <div class="info">
                    <p><a href="#">Chocolate Cake</a></p>
                    <p>$12.00</p>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <a href="#">
                    <img src="../images/bestseller3.png" alt="Product 3">
                </a>
                <div class="info">
                    <p><a href="#">Strawberry Cake</a></p>
                    <p>$19.00</p>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <a href="#">
                    <img src="../images/bestseller4.png" alt="Product 4">
                </a>
                <div class="info">
                    <p><a href="#">Strudel Cake</a></p>
                    <p>$20.00</p>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <a href="#">
                    <img src="../images/bestseller5.png" alt="Product 5">
                </a>
                <div class="info">
                    <p><a href="#">Blueberry Cheesecake</a></p>
                    <p>$21.00</p>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    <div class="video">
        <div class="text-center">
            <h1>Watch Our Video</h1>
        </div>
        <video src="../images/video.mp4" controls width="100%"></video>
    </div>
    <div class="statistics">
        <div class="section">
            <p class="title">Pastry Shops</p>
            <p class="line">10</p>
        </div>
        <div class="separator"></div>
        <div class="section">
            <p class="title">Cakes Collections</p>
            <p class="line">30</p>
        </div>
        <div class="separator"></div>
        <div class="section">
            <p class="title">Years of Experience</p>
            <p class="line">5</p>
        </div>
        <div class="separator"></div>
        <div class="section">
            <p class="title">Creative Pastry Chefs</p>
            <p class="line">25</p>
        </div>
    </div>
    <div class="evaluate">
        <div class="text-center">
            <h1>What Our Buyers Say</h1>
        </div>
        <div class="slider">
            <div class="slide">
                <img src="../images/avatar1.jpg" alt="Emily Nguyen" class="avatar">
                <h3>Emily Nguyen</h3>
                <p>"Blissful Bites truly lives up to its name! 
                    The atmosphere of the shop is so cozy and inviting, with its pastel yellow tones creating a warm and relaxing vibe. 
                    I tried their tiramisu, and it was absolutely divine. 
                    The layers of coffee-soaked sponge and creamy mascarpone were perfectly balanced – not overly sweet but rich and satisfying. 
                    This is definitely a place I will keep coming back to!"</p>
            </div>
            <div class="slide">
                <img src="../images/avatar2.jpg" alt="Daniel Tran" class="avatar">
                <h3>Daniel Tran</h3>
                <p>"I had the chance to visit Blissful Bites last weekend, and I was blown away by their salted egg sponge cake. 
                    The texture of the cake was so soft and fluffy, while the salted egg yolk and creamy sauce complemented it perfectly without being too heavy. 
                    The staff was incredibly friendly and attentive, making the experience even better. 
                    Highly recommend this hidden gem to anyone with a sweet tooth!"</p>
            </div>
            <div class="slide">
                <img src="../images/avatar3.jpg" alt="Sophia Le" class="avatar">
                <h3>Sophia Le</h3>
                <p>"Blissful Bites has quickly become my favorite bakery in town! 
                    I came across it through a friend's recommendation, and I am so glad I gave it a try. 
                    The macarons are absolutely delightful, especially the passion fruit flavor – tangy, sweet, and just the right amount of chewiness. 
                    The attention to detail in both the decor and the desserts is amazing. 
                    It is a wonderful spot to relax and indulge in something sweet."</p>
            </div>
            <div class="slide">
                <img src="../images/avatar4.jpg" alt="James Hoang" class="avatar">
                <h3>James Hoang</h3>
                <p>"One of the things that impressed me most about Blissful Bites is the variety on their menu. 
                    They have something for everyone, from light and airy mousse cakes to decadent chocolate treats. 
                    I personally loved the strawberry mousse cake – it had such a fresh and natural fruit flavor, paired with a silky smooth texture. 
                    The prices are very reasonable for the quality, and the overall experience is just exceptional."</p>
            </div>
            <div class="slide">
                <img src="../images/avatar5.jpg" alt="Lita Pham" class="avatar">
                <h3>Lita Pham</h3>
                <p>"If you are a dessert lover, Blissful Bites is an absolute must-visit! 
                    Their cream puffs are out of this world – the choux pastry is perfectly baked, and the cream filling is so rich and flavorful. 
                    What I admire most about this bakery is how much care they put into every detail, from the beautifully designed packaging to their top-notch customer service. 
                    This place deserves all the praise and more. A solid 10/10!"</p>
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
    <script src="../js/home.js"></script>
</body>
</html>