<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<!-- <?php
	// if(isset($_GET['cartid']) ){
	// 	$cartid=$_GET['cartid'];
	// 	$delBook= $ct->del_book_cart($cartid);
	// }
	// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
	// 	$cartId = $_POST['cartId'];	
	// 	$quantily=$_POST['quantily'];
	// 	$update_quantily_Cart= $ct->update_quantily_Cart($quantily,$cartId);
	// 	if($quantily<=0){
	// 		$delBook= $ct->del_book_cart($cartId);
		
	// 	}
	// }
?> -->
<!-- <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0; url=?id=live'>";
	}
?> -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage"> 
			    	<h2>Thông tin đơn hàng</h2>
					<?php
					
					?>
						<table class="tblone">
							<tr>
                                <th width="5%">Stt</th>
								<th width="25%">Tên sách</th>
								<th width="15%">Hình ảnh</th>
								<th width="10%">Số lượng</th>
                                <th width="10%">Giá</th>
                                <th width="15%">Ngày</th>
                                <th width="10%">Trạng thái</th>
                                <th width="10%">Xóa</th>

								
							</tr>
							<?php
                            $customer_id = Session::get('customer_id');
							$get_cart_ordered= $ct->get_cart_ordered( $customer_id);
							if($get_cart_ordered){
								$i=0;
								$qty=0;
								while($result = $get_cart_ordered->fetch_assoc()){
                                    $i++;
									
							?>
							<tr>
                                <td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" height="120px" width="500px"/></td>
								<td>
                                <?php echo $result['quantily'] ?>
								</td>
                                <td><?php echo $result['price']." "."VND" ?></td>
                                <td><?php echo  $fm->formatDate( $result['date_order']) ?></td>
                                <td>
                                    <?php
                                        if($result['status']=='0'){
                                            echo 'Chờ duyệt';
                                        }else{
                                            echo 'Đã duyệt';
                                        }
                                    ?>
                                </td>
								<?php
                                if($result['status']=='0'){ 
                                ?>
                                <td> <?php echo 'N/A' ?></td>
                                <?php
                                }else{
                                ?>
                                <td><a onclick="return confirm('Bạn có chắc muốn xóa <?php echo $result['productName'] ?>?');" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
								<?php
                                }
                                ?>
							</tr>
                            
							<?php
							
								}
							}?>
							
							
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';

?>
