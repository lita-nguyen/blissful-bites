<?php
include "database.php";
class product {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_desc = mysqli_real_escape_string($this->db->link, $_POST['product_desc']);
        $product_img = $_FILES['product_img']['name'];
        move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
        $query = "INSERT INTO tbl_product(product_name,category_id,brand_id,product_price,product_desc,product_img) 
                VALUES ('$product_name','$category_id','$brand_id','$product_price','$product_desc','$product_img')";
        $result = $this->db->insert($query);
        if ($result)
        {
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            if (!empty($_FILES['product_img_desc']['name'][0])) {
                $filename = $_FILES['product_img_desc']['name'];
                $filetmp = $_FILES['product_img_desc']['tmp_name'];
                foreach ($filename as $key => $value) {
                    move_uploaded_file($filetmp[$key], "uploads/" . $value);
                    $query = "INSERT INTO tbl_product_img_desc (product_id,product_img_desc) VALUES ('$product_id','$value')";
                    $this->db->insert($query);
                }
            }
        }
        return $result;
    }
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand()
    {
        $query = "SELECT tbl_brand.*, tbl_category.category_name FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id ORDER BY tbl_brand.brand_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product()
    {
        $query = "SELECT tbl_product.product_id, tbl_product.product_name, tbl_product.product_price, tbl_product.product_desc, tbl_product.product_img, tbl_category.category_name, tbl_brand.brand_name 
                FROM tbl_product
                INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id
                INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
                ORDER BY tbl_product.product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_images($product_id)
    {
        $query = "SELECT * FROM tbl_product_img_desc WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($product_id, $product_name, $category_id, $brand_id, $product_price, $product_desc, $product_img, $product_img_desc)
    {
        $query = "UPDATE tbl_product SET 
            product_name = '$product_name', 
            category_id = '$category_id', 
            brand_id = '$brand_id', 
            product_price = '$product_price', 
            product_desc = '$product_desc' 
            WHERE product_id = '$product_id'";
        $result = $this->db->update($query);
        if ($product_img['name']) {
            $product_img_name = $product_img['name'];
            move_uploaded_file($product_img['tmp_name'], "uploads/" . $product_img_name);
            $query_img = "UPDATE tbl_product SET product_img = '$product_img_name' WHERE product_id = '$product_id'";
            $this->db->update($query_img);
        }
        if ($product_img_desc['name'][0]) {
            $this->db->delete("DELETE FROM tbl_product_img_desc WHERE product_id = '$product_id'");
            foreach ($product_img_desc['name'] as $key => $value) {
                $tmp_name = $product_img_desc['tmp_name'][$key];
                move_uploaded_file($tmp_name, "uploads/" . $value);
                $query_desc_img = "INSERT INTO tbl_product_img_desc (product_id, product_img_desc) VALUES ('$product_id', '$value')";
                $this->db->insert($query_desc_img);
            }
        }
        return $result;
    }
    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>