<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$brand = new brand;
$show_brand = $brand -> show_brand();
?>
<div class="admin-content-right">
<div class="admin-content-right-category-list">
                <h1>Product Type List</h1>
                <table>
                    <tr>
                        <th>Sequence Number</th>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Product Type</th>
                        <th>Option</th>
                    </tr>
                    <?php
                    if ($show_brand)
                    {
                        $i = 0;
                        while ($result = $show_brand->fetch_assoc())
                        {
                            $i ++;
                    ?>     
                    <tr>
                        <th><?php echo $i ?></th>
                        <th><?php echo $result['brand_id'] ?></th>
                        <th><?php echo $result['category_name'] ?></th>
                        <th><?php echo $result['brand_name'] ?></th>
                        <th><a href="brandedit.php?brand_id=<?php echo $result['brand_id'] ?>">Edit</a>|<a href="branddelete.php?brand_id=<?php echo $result['brand_id'] ?>">Delete</a></th>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
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
.admin-content-right-category-list tr th,td {
    border: 1px solid #000;
}
table {
    border-collapse: collapse;
}
</style>