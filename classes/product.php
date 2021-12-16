<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data, $files){
           
            $productName= mysqli_real_escape_string($this->db->link, $data['productName']);
            $category= mysqli_real_escape_string($this->db->link, $data['category']);
            $publishing= mysqli_real_escape_string($this->db->link, $data['publishing']);
            $product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price= mysqli_real_escape_string($this->db->link, $data['price']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array('jpn', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
           
            if($productName =="" ||$category =="" ||$publishing =="" ||$product_desc ==""||$type=="" ||$price =="" ||$file_name==""){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName, catId, publishingId, product_desc, price, type, image) VALUES('$productName', '$category', '$publishing','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Thêm không thành công</span>";
                    return $alert;
                }
            }
         }
        
        public function show_product(){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_publishing.publishingName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId= tbl_category.catId
            INNER JOIN tbl_publishing ON tbl_product.publishingId= tbl_publishing.publishingId
              order by tbl_product.productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            
            $productName= mysqli_real_escape_string($this->db->link, $data['productName']);
            $category= mysqli_real_escape_string($this->db->link, $data['category']);
            $publishing= mysqli_real_escape_string($this->db->link, $data['publishing']);
            $product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price= mysqli_real_escape_string($this->db->link, $data['price']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array('jpn', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

             if($productName =="" ||$category =="" ||$publishing =="" ||$product_desc ==""||$type=="" ||$price =="" ){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                //nếu người dùng chọn ảnh
                if(!empty($file_name)){
                    if($file_size>20480){
                        $alert = "<span class='error'>Kích thước ảnh không vượt quá 2MB!</span>";
                        return $alert;
                        
                    }else if(in_array($file_ext, $permited)===false){
                        $alert = "<span class='error'>Bạn chỉ có thể up những file:-".implode(', ', $permited)."</span>";
                        return $alert;   
                    }
                    $query = "UPDATE tbl_product set
                    productName = '$productName', 
                    catId = '$category', 
                    publishingId = '$publishing', 
                    product_desc = '$product_desc', 
                    price = '$price', 
                    type = '$type', 
                    image = '$unique_image'
                    where productId ='$id'";
                }else{
                // nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product set
                
                productName = '$productName', 
                    catId = '$category', 
                    publishingId = '$publishing', 
                    product_desc = '$product_desc', 
                    price = '$price', 
                    type = '$type'
                    where productId ='$id'";
                }
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class='success'>Cật nhật thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Cật nhật không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_product($id){
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert="<Category class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        //end backend
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_detail($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_publishing.publishingName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId= tbl_category.catId
            INNER JOIN tbl_publishing ON tbl_product.publishingId= tbl_publishing.publishingId
            where tbl_product.productId='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        
       public function getLastestKD(){
        $query = "SELECT * FROM tbl_product Where publishingId='9' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestVH(){
        $query = "SELECT * FROM tbl_product Where publishingId='1' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestTD(){
        $query = "SELECT * FROM tbl_product Where publishingId='6' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestBL(){
        $query = "SELECT * FROM tbl_product Where publishingId='11' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }

    }
    
?>