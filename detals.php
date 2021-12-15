<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['proid']) || $_GET['proid']==null){
		echo "<script>window.location='404.php'</script>";
	}else{
	$id=$_GET['proid'];
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
		$quantily=$_POST['quantily'];
		$AddtoCart= $ct->add_to_cart($quantily,$id);
	}
}
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
			$get_product_detail=$product->get_detail($id);
			if($get_product_detail){
				while($result_detail=$get_product_detail->fetch_assoc()){

				

			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_detail['image'] ?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $result_detail['productName'] ?></h2>
						<p><?php echo $fm->textShorten( $result_detail['product_desc'],200) ?></p>					
						<div class="price">
							<p>Giá: <span><?php echo $result_detail['price']." "."VND" ?></span></p>
							<p>Thể loại: <span><?php echo $result_detail['catName'] ?></span></p>
							<p>NXB:<span><?php echo $result_detail['publishingName'] ?></span></p>
						</div>
						<div class="add-cart">
							<form action="" method="post">
								<input type="number" class="buyfield" name="quantily" value="1" min="1"/>
								<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
							</form>				
						</div>
					</div>
					<div class="product-desc">
						<h2>CHI TIẾT SÁCH</h2>
						<p><?php echo $result_detail['product_desc']?></p>
					</div>
				
				</div>
				<?php
				}
			}?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
				      
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>
<?php
include 'inc/footer.php';

?>