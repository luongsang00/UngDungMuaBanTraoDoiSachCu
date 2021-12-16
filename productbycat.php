
<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['catid']) || $_GET['catid']==null){
		echo "<script>window.location='404.php'</script>";
	}else{
	$id=$_GET['catid'];
	}
	// if($_SERVER['REQUEST_METHOD']==='POST'){
	// $catName = $_POST['catName'];
	// $updateCat= $cat->update_category($catName,$id);
?>
 <div class="main">
    <div class="content">
		<?php 
			 $namecat=$cat->get_name_by_cat($id);
			 if($namecat){
				 while($result_name=$namecat->fetch_assoc()){
			  ?>
    	<div class="content_top">
			
    		<div class="heading">
    		<h3>Thể loại: <?php echo $result_name['catName'] ?> </h3>
    		</div>
			
    		<div class="clear"></div>
			
    	</div>
		<?php
				}
			}
			?>
	      <div class="section group">
			  <?php 
			 $productbycat=$cat->get_product_by_cat($id);
			 if($productbycat){
				 while($result=$productbycat->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?> " alt="" /></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p>
					 <p><span class="price"><?php echo $result['price']." "."VND" ?></span></p>
				     <div class="button"><span><a href="detals.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết Sách</a></span></div>
				</div>
				<?php
				}
			}else{
				echo "Chưa có sách";
			}
			?>
				
				
				
			</div>

	
	
    </div>
 </div>
<?php
 include 'inc/footer.php';

?>