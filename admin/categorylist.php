<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>
<?php
$category = new category;
$show_category = $category -> show_category();
?>
<div class="admin-content-right">
<div class="admin-content-right-category-list">
                <h1>Category List</h1>
                <table>
                    <tr>
                        <th>Sequence Number</th>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Option</th>
                    </tr>
                    <?php
                    if ($show_category)
                    {
                        $i = 0;
                        while ($result = $show_category->fetch_assoc())
                        {
                            $i ++;
                    ?>     
                    <tr>
                        <th><?php echo $i ?></th>
                        <th><?php echo $result['category_id'] ?></th>
                        <th><?php echo $result['category_name'] ?></th>
                        <th><a href="categoryedit.php?category_id=<?php echo $result['category_id'] ?>">Edit</a>|<a href="categorydelete.php?category_id=<?php echo $result['category_id'] ?>">Delete</a></th>
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