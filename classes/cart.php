<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantily,$id){
            $quantily = $this->fm->validation($quantily);
            $quantily= mysqli_real_escape_string($this->db->link, $quantily);
            $id= mysqli_real_escape_string($this->db->link, $id);
            $sId= session_id();

            // $check_cart="SELECT * FROM tbl_cart where productId ='$id' and sId='$sId'";
            // if($check_cart){
            //     $msg="Sách đã được thêm vào giỏ hàng";
            //     return $msg;
            // }else{

            $query= "SELECT * FROM tbl_product where productId ='$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $image =$result['image'];
            $price=$result['price'];
            $productName=$result['productName'];
                $query_insert = "INSERT INTO tbl_cart(productId, quantily, sId, image, price, productName ) VALUES('$id', '$quantily', '$sId','$image','$price','$productName')";
                $insert_cart = $this->db->insert($query_insert);
                if($result){
                    header('location:cart.php');
                }else{
                    header('location:404.php');
                }
            //}
        }
        public function get_product_cart(){
            $sId= session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantily_Cart($quantily,$cartId){
            $quantily= mysqli_real_escape_string($this->db->link, $quantily);
            $cartId= mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE tbl_cart set
            quantily = '$quantily'
            where cartId ='$cartId'";
            $result = $this->db->update($query);
            if($result){
                header('location:cart.php');
            }else{
                $msg="<span style='color:red; font-size:18 px'>Cập nhật không thành công</span>";
                return $msg;
            }
            
        }
        public function del_book_cart($cartid){
            $cartid= mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('location:cart.php');
                
            }else{
                $msg="<span style='color:red; font-size:18 px'>Xóa không thành công</span>";
                return $msg;
            }

        }
        public function check_cart(){
            $sId= session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function dell_all_data_cart(){
            $sId= session_id();
            $query = "DELETE  FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        
    }
    
?>