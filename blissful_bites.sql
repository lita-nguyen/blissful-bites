-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blissful_bites`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'Nhat Linh', '$2y$10$TIxjoXJSOa7dLhfFgp8./O3Yh3xKq4bhhmTz/ld.o1IiLDbYoOruG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(1, 1, 'Italy'),
(2, 1, 'USA'),
(3, 1, 'France'),
(4, 1, 'Denmark'),
(5, 2, 'China'),
(6, 2, 'Japan'),
(7, 2, 'Vietnam'),
(8, 2, 'Indonesia'),
(9, 3, 'Sweden'),
(10, 3, 'Finland'),
(11, 4, 'Argentina'),
(12, 4, 'Mexico'),
(14, 7, 'Argentina'),
(15, 7, 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Western Desserts'),
(2, 'Asian Desserts'),
(3, 'Nordic Desserts'),
(7, 'South American Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_price`, `product_desc`, `product_img`) VALUES
(1, 'Cromboloni Cake', 1, 3, '10', 'At Blissful Bites, we are thrilled to introduce you to our irresistible Cromboloni – a treat designed to captivate your senses. With a golden, flaky crust that is perfectly crisp and infused with the rich aroma of fresh butter and a hint of vanilla, Cromboloni is love at first bite. Inside, you will find a luscious, velvety filling crafted from fresh cream, a drizzle of natural honey, and a secret touch that makes our recipe truly unique.\r\nMore than just a dessert, Cromboloni is an experience – a little moment of “Bliss” you can savor with every bite. We take pride in every detail, from the artful kneading of the dough to the precise baking time, ensuring that every Cromboloni reaches you at its finest.\r\nImagine a cozy afternoon, paired with a warm cup of tea or a freshly brewed coffee, and the sweet indulgence of Cromboloni. It’s the perfect way to treat yourself or share a special moment with loved ones.', 'bestseller1.png'),
(2, 'Chocolate Cake', 1, 2, '12', 'At Blissful Bites, our Chocolate Cake is more than just a dessert – it’s a celebration of rich, velvety indulgence. Made with the finest cocoa, each bite delivers a deep, luscious chocolate flavor that melts in your mouth. The moist, tender layers are perfectly complemented by a silky, smooth chocolate ganache that adds just the right amount of sweetness.\r\nWe’ve poured our passion into crafting a cake that’s perfect for any occasion – or simply to brighten your day. Whether you’re enjoying it with a cup of coffee in the morning, sharing it with friends at a party, or sneaking a late-night treat, our Chocolate Cake promises to satisfy every chocolate lover’s craving.\r\nTopped with a delicate drizzle of ganache and a sprinkle of chocolate shavings, it’s as beautiful as it is delicious. One slice is never enough – but don’t worry, we won’t tell if you go back for seconds!\r\nStop by Blissful Bites today and treat yourself to the ultimate chocolate experience with our irresistible Chocolate Cake!', 'bestseller2.png'),
(3, 'Strawberry Cake', 1, 1, '19', 'At Blissful Bites, our Strawberry Cake is a celebration of all things light, fruity, and utterly delightful. Baked to perfection, its soft and fluffy layers are infused with the natural sweetness of fresh strawberries, creating a cake that’s as refreshing as it is indulgent.\r\nEach layer is generously filled with our signature strawberry cream, whipped to perfection for a silky, melt-in-your-mouth texture. To top it off, we adorn the cake with a vibrant strawberry glaze and fresh, handpicked strawberries that add a burst of flavor in every bite.\r\nPerfect for any occasion – from birthdays and anniversaries to a simple pick-me-up on a busy day – our Strawberry Cake brings a touch of sweetness and joy to every moment. With its light, fruity profile, it’s the perfect dessert to enjoy with a cup of tea or as a stunning centerpiece at your next gathering.\r\nVisit Blissful Bites today and indulge in the fresh, fruity delight of our irresistible Strawberry Cake – a treat that’s always in season!', 'bestseller3.png'),
(4, 'Strudel Cake', 1, 4, '20', 'At Blissful Bites, our Strudel Cake is a masterpiece of flaky perfection and comforting flavors. Each bite of this golden-baked delight reveals layers of buttery pastry, delicately crisp on the outside yet tender within, lovingly wrapped around a luscious filling.\r\nChoose from our signature fillings: tart, juicy apples with a hint of cinnamon spice, or a rich and creamy custard that melts in your mouth. Every Strudel Cake is finished with a light dusting of powdered sugar, giving it a touch of elegance and sweetness that’s simply irresistible.\r\nPerfect for cozy mornings, afternoon tea, or a stunning dessert after dinner, our Strudel Cake is more than just a treat – it’s a warm embrace of nostalgic flavors, crafted to perfection. Serve it warm for the ultimate indulgence, or enjoy it as is with a dollop of whipped cream or a scoop of vanilla ice cream.\r\nStop by Blissful Bites and let our Strudel Cake bring a slice of joy to your day – flaky, flavorful, and utterly unforgettable!', 'bestseller4.png'),
(5, 'Blueberry Chessecake', 1, 1, '21', 'At Blissful Bites, our Blueberry Cheesecake is a dessert lover’s paradise. With its velvety smooth cream cheese filling resting on a buttery graham cracker crust, every bite offers a perfect balance of rich, creamy indulgence and light, tangy sweetness.\r\nCrowning this delightful treat is a generous layer of fresh, juicy blueberries glazed to perfection, adding a burst of fruity flavor that complements the cheesecake’s luscious texture. Each slice is as visually stunning as it is delicious, with vibrant blueberries stealing the show.\r\nPerfect for any occasion, from a cozy gathering to a grand celebration, our Blueberry Cheesecake is the ultimate crowd-pleaser. Pair it with a cup of coffee or a glass of chilled wine, and you have a match made in dessert heaven.\r\nVisit Blissful Bites today and treat yourself to a slice of pure joy with our irresistible Blueberry Cheesecake – creamy, fruity, and unforgettable!', 'bestseller5.png'),
(7, 'Vietnamese Baked Honeycomb Cake', 2, 7, '15', 'At Blissful Bites, our Vietnamese Baked Honeycomb Cake is a traditional treat with a modern twist. This cake is light, airy, and has a unique, sponge-like texture that melts in your mouth with every bite. Made from rice flour and coconut milk, the cake is subtly sweet, with a delicate fragrance that’s simply irresistible.\r\nThe secret to its name lies in the stunning honeycomb-like pattern created during the baking process, giving the cake an inviting appearance and a soft, spongy texture. Each piece is beautifully golden on the outside, while remaining light and moist on the inside, creating the perfect balance of flavors.\r\nWhether enjoyed as a snack or dessert, this cake pairs perfectly with a warm cup of tea or coffee. It\'s an ideal treat to share with friends or to enjoy in a quiet moment to yourself.\r\nCome visit Blissful Bites today and experience the sweet, airy delight of our Vietnamese Baked Honeycomb Cake – a traditional delicacy that’s sure to bring you comfort and joy!', 'pd6.png'),
(8, 'Knafeh Cake', 2, 8, '11', 'At Blissful Bites, we proudly bring you the decadent Knafeh Cake, a sweet, aromatic treat that combines the best of Middle Eastern flavors with a luxurious twist. This cake features delicate layers of crispy, buttery semolina dough, carefully baked to golden perfection. Each bite offers a satisfying crunch followed by the soft, creamy center that melts effortlessly in your mouth.\r\nThe rich filling is made from velvety cream cheese or sweetened ricotta, creating a luscious contrast to the crispy exterior. The cake is then generously soaked in fragrant rosewater or orange blossom syrup, infusing it with a subtle floral sweetness that enhances every flavor.\r\nTopped with a sprinkle of finely crushed pistachios, Knafeh Cake is a feast for both the eyes and the palate, with its vibrant colors and irresistible texture. It’s the perfect dessert to enjoy on special occasions, or whenever you crave something indulgent and unique.\r\nVisit Blissful Bites today and treat yourself to the exquisite taste of Knafeh Cake – a Middle Eastern masterpiece that’s sure to steal your heart!', 'pd7.png'),
(9, 'Dorayaki Cake', 2, 6, '17', 'At Blissful Bites, our Dorayaki Cake brings a beloved Japanese classic to life in a whole new way. Inspired by the traditional dorayaki, this cake features soft, fluffy sponge layers filled with a rich, velvety red bean paste. The cake is light and airy on the outside, while the sweet and creamy filling offers a satisfying contrast with every bite.\r\nWhat sets our Dorayaki Cake apart is its perfect balance of sweetness. The red bean paste, made from premium azuki beans, is naturally sweet with just the right amount of richness, making it an indulgence that never feels overwhelming. The light, moist sponge enhances the flavor of the filling, creating a harmonious and delightful treat.\r\nThis cake is a wonderful way to enjoy a taste of Japan, whether you\'re a fan of traditional Japanese desserts or just looking for something unique to try. It’s perfect for sharing with friends or as a special dessert to enjoy with a warm cup of tea.\r\nVisit Blissful Bites today and experience the irresistible sweetness of our Dorayaki Cake – a fusion of Japanese tradition and delightful flavor in every bite!', 'pd8.png'),
(12, 'Macaron', 1, 3, '05', 'At Blissful Bites, our Macarons are a symphony of flavor, texture, and beauty. These dainty, pastel-colored confections feature crisp, delicate shells that give way to soft, chewy centers filled with luscious cream or ganache. Each macaron is crafted with care, using premium almond flour and the finest ingredients to ensure every bite is pure bliss.\r\nAvailable in a rainbow of flavors, from classic vanilla and chocolate to fruity raspberry, zesty lemon, and indulgent salted caramel, there’s a macaron for every craving. Their light, airy texture and vibrant taste make them the perfect treat for any occasion – whether you’re enjoying them with a cup of tea, giving them as a gift, or simply indulging in a little luxury for yourself.\r\nNot only are they delicious, but their elegant appearance makes them a feast for the eyes, too – perfect for weddings, parties, or as a thoughtful token of sweetness.\r\nStop by Blissful Bites today and treat yourself to the irresistible charm of our handcrafted Macarons – little bites of happiness that will keep you coming back for more!', 'pd9.png'),
(13, 'Danish Pastry Cake', 1, 4, '07', 'At Blissful Bites, our Danish Pastry Cake is a perfect blend of European tradition and irresistible indulgence. Made with layers of buttery, flaky pastry, this cake is baked to golden perfection, offering a crisp exterior that melts into a soft, tender interior with every bite.\r\nEach cake is filled with your choice of decadent fillings, from creamy custard and rich chocolate to fruity delights like raspberry or apple. Topped with a drizzle of sweet icing and a sprinkle of nuts or powdered sugar, the Danish Pastry Cake is as beautiful as it is delicious.\r\nPerfect for breakfast, brunch, or dessert, this versatile treat pairs wonderfully with a cup of coffee or tea. Whether you’re sharing it with loved ones or treating yourself, the Danish Pastry Cake is a delightful way to add a touch of elegance to your day.\r\nVisit Blissful Bites today and savor the buttery, flaky perfection of our Danish Pastry Cake – a classic treat with timeless appeal!', '4d3cb2d5aafeaf62aa1a81076a62453c (1).jpg'),
(14, 'Apple Pie', 1, 2, '11', 'At Blissful Bites, our Apple Pie is crafted to perfection, bringing you the ultimate comfort dessert. Made with a golden, buttery crust that’s perfectly flaky and crisp, each slice encases a luscious filling of fresh, hand-picked apples. Tossed in a blend of cinnamon, nutmeg, and a touch of brown sugar, the apples are baked until tender, creating a rich, warm flavor that’s hard to resist.\r\nWhether served warm with a scoop of creamy vanilla ice cream or enjoyed on its own, our Apple Pie is the perfect companion for cozy gatherings, festive occasions, or simply when you’re craving something sweet and satisfying. The balance of tart apples, sweet spices, and melt-in-your-mouth crust makes it a treat that feels like home in every bite.\r\nStop by Blissful Bites today to enjoy our lovingly baked Apple Pie – a classic dessert that never goes out of style!', '2e51d229fb9cb8fbbff542eac54059ca (1).jpg'),
(15, 'Mooncake', 2, 5, '13', 'At Blissful Bites, our Mooncakes are a perfect blend of heritage and artistry, crafted to honor the timeless flavors of the Mid-Autumn Festival. These delicately baked treasures feature a thin, golden crust that encases a variety of rich, flavorful fillings. From traditional lotus seed paste and salted egg yolk to modern twists like matcha, red bean, or creamy custard, there’s a mooncake for every palate.\r\nBeautifully adorned with intricate patterns, each mooncake is as much a feast for the eyes as it is for the taste buds. Their smooth, velvety texture and perfectly balanced sweetness make them an ideal treat to share with family and friends during festive moments or to enjoy as a personal indulgence.\r\nPair them with a cup of warm tea for a truly delightful experience that connects you to the traditions of the past while savoring the present.\r\nVisit Blissful Bites today to discover our exquisite collection of Mooncakes – a celebration of flavor, tradition, and togetherness in every bite!', '9d65e10cc77249e1615a823b8c35c64c (1).jpg'),
(16, 'Swedish Cinnamon Bun', 3, 9, '18', 'At Blissful Bites, our Swedish Cinnamon Bun (Kanelbullar) is the ultimate comfort treat, inspired by Scandinavian tradition. These soft, pillowy buns are perfectly rolled with layers of fragrant cinnamon, cardamom, and brown sugar, creating a swirl of sweet, spiced goodness in every bite.\r\nLovingly baked to a golden brown, the buns are brushed with a light glaze for a subtle shine and sprinkled with pearl sugar for an authentic Swedish touch. Their irresistible aroma will transport you to a cozy Nordic kitchen, where every bite feels like a warm embrace.\r\nPerfect for breakfast, an afternoon pick-me-up, or a treat to share with loved ones, these buns pair beautifully with a hot cup of coffee or tea. Whether you’re indulging in a quiet moment or adding sweetness to your day, our Swedish Cinnamon Buns are guaranteed to make you smile.\r\nVisit Blissful Bites today and experience the cozy charm of our Swedish Cinnamon Buns – where tradition meets irresistible flavor!', '8a617a9ac2180dc25e445e54502771fc (1).jpg'),
(17, 'Finnish Runeberg Torte ', 3, 10, '16', 'At Blissful Bites, our Runeberg Torte is a tribute to Finnish tradition, inspired by the celebrated poet Johan Ludvig Runeberg. These charming, cylindrical cakes are made with a rich blend of almond flour, breadcrumbs, and hints of warm spices like cardamom, giving them a unique texture and depth of flavor.\r\nEach torte is moistened with a light syrup, ensuring every bite is perfectly soft and satisfying. The finishing touch? A dollop of vibrant raspberry jam surrounded by a ring of sweet icing on top, adding a fruity zing that complements the cake’s nutty richness beautifully.\r\nTraditionally enjoyed during Finland’s Runeberg Day in February, these tortes are perfect for any occasion. Pair them with coffee or tea for a cozy treat that’s as delightful as it is meaningful.\r\nStop by Blissful Bites today and savor the history and flavor of our Runeberg Torte – a Finnish classic brought to life with care and love!', 'f9f996d1b257c7244f6202cb9766e008 (1).jpg'),
(18, 'Dulce de Leche Cake ', 7, 14, '22', 'At Blissful Bites, our Dulce de Leche Cake is a decadent dessert that celebrates the rich, creamy sweetness of caramel. This cake features soft, moist layers infused with the luscious flavor of dulce de leche, perfectly balanced to melt in your mouth.\r\nEach layer is generously slathered with silky dulce de leche cream, adding a velvety texture that makes every bite indulgent. The cake is then topped with a drizzle of golden caramel and a sprinkle of sea salt or toasted nuts for a delightful crunch and contrast.\r\nPerfect for birthdays, celebrations, or any day you’re craving something extraordinary, our Dulce de Leche Cake is the ultimate treat for caramel enthusiasts. Pair it with coffee or milk for a match made in dessert heaven!\r\nVisit Blissful Bites today to indulge in the rich, creamy decadence of our Dulce de Leche Cake – a sweet moment you’ll never forget!', 'af03614ac6cade43d72e0408db472361 (1).jpg'),
(19, 'Churros Cake', 7, 15, '14', 'At Blissful Bites, our Churros Cake takes the irresistible charm of churros and transforms it into a decadent dessert. This cake features layers of soft, cinnamon-infused sponge, perfectly baked to be light and fluffy. Each layer is generously filled with creamy dulce de leche or silky cinnamon buttercream, creating a harmony of sweetness and spice.\r\nThe cake is topped with crispy churro pieces, lightly dusted with cinnamon sugar, and drizzled with caramel sauce for an extra touch of indulgence. Every slice captures the warm, comforting flavors of churros in a cake that’s as stunning as it is delicious.\r\nPerfect for celebrations, brunches, or simply satisfying your churro cravings, our Churros Cake pairs wonderfully with coffee, hot chocolate, or even a glass of milk.\r\n Stop by Blissful Bites today and treat yourself to the warm, cinnamon-sweet delight of our Churros Cake – a dessert you won’t want to miss!', 'b4547d14fc246fa9d7a453db96299f12 (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `product_img_desc`) VALUES
(1, 'bestseller1.1.png'),
(1, 'bestseller1.2.png'),
(1, 'bestseller1.png'),
(2, 'bestseller2.1.png'),
(2, 'bestseller2.2.png'),
(2, 'bestseller2.png'),
(3, 'bestseller3.1.png'),
(3, 'bestseller3.2.png'),
(3, 'bestseller3.png'),
(5, 'bestseller5.1.png'),
(5, 'bestseller5.2.png'),
(5, 'bestseller5.png'),
(6, 'bestseller5.1.png'),
(6, 'bestseller5.2.png'),
(6, 'bestseller5.png'),
(9, 'pd8.1.png'),
(9, 'pd8.2.png'),
(9, 'pd8.png'),
(4, 'bestseller4.1.png'),
(4, 'bestseller4.2.png'),
(4, 'bestseller4.png'),
(7, 'pd6.1.png'),
(7, 'pd6.2.png'),
(7, 'pd6.png'),
(8, 'pd7.1.png'),
(8, 'pd7.2.png'),
(8, 'pd7.png'),
(12, '5c4fe8863e093c6920734fd8b3190826.jpg'),
(12, '88b3881fb58d137c50da0f580e6e6ce4.jpg'),
(12, 'image-Photoroom.png'),
(13, '4d3cb2d5aafeaf62aa1a81076a62453c (1).jpg'),
(13, '7a96e638eac16ff369fd7f22150b8b28.jpg'),
(13, 'b0eee1f2e2dca34f5b46f817e02d01d3.jpg'),
(14, '2e51d229fb9cb8fbbff542eac54059ca.jpg'),
(14, '96d0404ee63dc33382f4921a2f48e2e1.jpg'),
(14, 'da2b99b41ddf07998d0a62ad456ddf3d.jpg'),
(15, '09ed388f55058001b629853a32ced5b0.jpg'),
(15, '9d65e10cc77249e1615a823b8c35c64c.jpg'),
(15, '7755a53053bf762f3807dc26b4075899.jpg'),
(16, '5caf1002386d41dd9f7de364da010ad8 (1).jpg'),
(16, '8a617a9ac2180dc25e445e54502771fc.jpg'),
(16, '96de45151eadd5d36f5ce9e880500756.jpg'),
(17, '879f81e0c5aea5d7ddf49c1c72e3106c (1).jpg'),
(17, '2881edac1b0b3d04c360fdaafd0bf5ae (1).jpg'),
(17, 'f9f996d1b257c7244f6202cb9766e008 (1).jpg'),
(18, '10114dfe3547a99059086f01872e6f7a (1).jpg'),
(18, 'af03614ac6cade43d72e0408db472361 (1).jpg'),
(18, 'cce35a7bf76917a7e4c766611440fdd5 (1).jpg'),
(19, '77d4d90a0130894e17a1d85c21514367 (1).jpg'),
(19, '9236deceb187a1c6251636d5b95d26c9 (1).jpg'),
(19, 'b4547d14fc246fa9d7a453db96299f12 (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
