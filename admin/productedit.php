<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL) {
    echo "<script>window.location = 'product_list.php'</script>";
} else {
    $product_id = $_GET['product_id'];
}
$get_product = $product->get_product($product_id);
if ($get_product) {
    $resultA = $get_product->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_price = $_POST['product_price'];
    $product_desc = str_replace("'", "\'", $_POST['product_desc']);
    $product_img = $_FILES['product_img'];
    $product_img_desc = $_FILES['product_img_desc'];
    $update_product = $product->update_product($product_id, $product_name, $category_id, $brand_id, $product_price, $product_desc, $product_img, $product_img_desc);
}
?>
<style>
    .admin-content-right-product-add h1 {
        margin-bottom: 20px;
    }
    .admin-content-right-product-add input,select {
        width: 200px;
        height: 30px;
        display: block;
        margin: 5px 0 10px;
        padding-left: 15px;
    }
    .admin-content-right-product-add textarea {
        display: block;
        height: 200px;
        width: 500px;
        margin-bottom: 15px;
        padding: 15px;
    }
    .admin-content-right-product-add button {
        display: block;
        margin: 10px 0 50px;
        height: 30px;
        width: 100px;
        cursor: pointer;
        background-color: #cba95c;
        border: none;
        color: #fff;
    }
    .admin-content-right-product-add button:hover {
        background-color: transparent;
        border: 1px solid #cba95c;
        color: #cba95c;
    }
</style>
<div class="admin-content-right">
    <div class="admin-content-right-category-add">
        <h1>Edit Product</h1><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Product Name</label>
            <input required name="product_name" type="text" value="<?php echo $resultA['product_name'] ?>">

            <label for="">Select Category</label>
            <select name="category_id" id="">
                <option value="">--Select Category--</option>
                <?php
                $show_category = $product->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                ?>
                        <option <?php if ($resultA['category_id'] == $result['category_id']) {
                                    echo "SELECTED";
                                } ?> value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Select Brand</label>
            <select name="brand_id" id="">
                <option value="">--Select Brand--</option>
                <?php
                $show_brand = $product->show_brand();
                if ($show_brand) {
                    while ($result = $show_brand->fetch_assoc()) {
                ?>
                        <option <?php if ($resultA['brand_id'] == $result['brand_id']) {
                                    echo "SELECTED";
                                } ?> value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Price</label>
            <input required name="product_price" type="text" value="<?php echo $resultA['product_price'] ?>">
            <label for="">Description</label>
            <textarea required name="product_desc"><?php echo $resultA['product_desc'] ?></textarea>
            <label for="">Main Image</label>
            <input name="product_img" type="file">
            <img src="uploads/<?php echo $resultA['product_img'] ?>" alt="Product Image" width="100">
            <label for="">Additional Images</label>
            <input name="product_img_desc[]" type="file" multiple>
            <div>
                <?php
                $additional_images = $product->show_product_images($product_id);
                if ($additional_images) {
                    while ($img = $additional_images->fetch_assoc()) {
                ?>
                        <img src="uploads/<?php echo $img['product_img_desc'] ?>" alt="Additional Image" width="80">
                <?php
                    }
                }
                ?>
            </div>
            <button type="submit">Edit</button>
        </form>
    </div>
</div>
</body>
</html>