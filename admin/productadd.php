<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $insert_product = $product -> insert_product($_POST,$_FILES);
}
?>
<div class="admin-content-right">
    <div class="admin-content-right-product-add">
                <h1>Add Product</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Enter product name <span style="color: #cba95c;">*</span></label>
                    <input name="product_name" required type="text">
                    <label for="">Select Category <span style="color: #cba95c;">*</span></label>
                    <select name="category_id" id="">
                        <option value="">--Select--</option>
                        <?php
                        $show_category = $product -> show_category();
                        if ($show_category) {while($result = $show_category -> fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Select Product Type <span style="color: #cba95c;">*</span></label>
                    <select name="brand_id" id="">
                        <option value="#">--Select--</option>
                        <?php
                        $show_brand = $product -> show_brand();
                        if ($show_brand) {while($result = $show_brand -> fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Selling Price <span style="color: #cba95c;">*</span></label>
                    <input name="product_price" required type="text">
                    <label for="">Product Description <span style="color: #cba95c;">*</span></label>
                    <textarea required name="product_desc" id=""></textarea>
                    <label for="">Product Photo <span style="color: #cba95c;">*</span></label>
                    <input required name="product_img" type="file">
                    <label for="">Description Photo</label>
                    <input name="product_img_desc[]" multiple type="file">
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
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