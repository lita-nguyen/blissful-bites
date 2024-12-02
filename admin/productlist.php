<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$show_product = $product->show_product();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category-list">
        <h1>Product List</h1>
        <table>
            <tr>
                <th>Sequence Number</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Product Type</th>
                <th>Price</th>
                <th>Description</th>
                <th>Main Image</th>
                <th>Additional Images</th>
                <th>Option</th>
            </tr>
            <?php
            if ($show_product) {
                $i = 0;
                while ($result = $show_product->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <th><?php echo $i ?></th>
                        <th><?php echo $result['product_id'] ?></th>
                        <th><?php echo $result['product_name'] ?></th>
                        <th><?php echo $result['category_name'] ?></th>
                        <th><?php echo $result['brand_name'] ?></th>
                        <th><?php echo $result['product_price'] ?></th>
                        <th><?php echo $result['product_desc'] ?></th>
                        <th>
                            <img src="uploads/<?php echo $result['product_img'] ?>" alt="Product Image" width="80">
                        </th>
                        <th>
                            <?php
                            $additional_images = $product->show_product_images($result['product_id']);
                            if ($additional_images) {
                                while ($img = $additional_images->fetch_assoc()) {
                            ?>
                                    <img src="uploads/<?php echo $img['product_img_desc'] ?>" alt="Additional Image" width="50">
                            <?php
                                }
                            }
                            ?>
                        </th>
                        <th>
                            <a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Edit</a> |
                            <a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Delete</a>
                        </th>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<style>
.admin-content-right-category-list table {
    width: 100%;
    text-align: center;
    margin-top: 20px;
}
.admin-content-right-category-list tr th,
td {
    border: 1px solid #000;
    padding: 5px;
}
.admin-content-right-category-list img {
    margin-top: 5px;
    display: block;
}
table {
    border-collapse: collapse;
}
</style>