<?php

    include_once '../lib/database.php';
    include_once '../helpers/format.php';
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
        // public function getcatbyId($id){
        //     $query = "SELECT * FROM tbl_category where catId = '$id'";
        //     $result = $this->db->select($query);
        //     return $result;
        // }
        // public function update_category($catName,$id){
        //     $catName = $this->fm->validation($catName);  
        //     $catName= mysqli_real_escape_string($this->db->link, $catName);
        //     $id= mysqli_real_escape_string($this->db->link, $id);
           
        //     if(empty($catName)){
        //         $alert = "<span class='error'>Tên không được để trống</span>";
        //         return $alert;
        //     }else{
        //         $query = "UPDATE tbl_category set catName = '$catName' where catId ='$id'";
        //         $result = $this->db->update($query);
        //         if($result){
        //             $alert="<span class='success'>Cật nhật thành công</span>";
        //             return $alert;
        //         }else{
        //             $alert="<span class='error'>Cật nhật không thành công</span>";
        //             return $alert;
        //         }
        //     }
        // }
        // public function del_category($id){
        //     $query = "DELETE FROM tbl_category where catId = '$id'";
        //     $result = $this->db->delete($query);
        //     if($result){
        //         $alert="<Category class='success'>Xóa thành công</span>";
        //         return $alert;
        //     }else{
        //         $alert="<span class='error'>Xóa không thành công</span>";
        //         return $alert;
        //     }
        // }
    }
    
?>