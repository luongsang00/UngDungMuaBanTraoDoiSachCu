<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$inserOrder= $ct->insertOrder($customer_id);
		$del_cart=$ct->dell_all_data_cart();
		header('location:success.php');
	}
	// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
	// 	$quantily=$_POST['quantily'];
	// 	$AddtoCart= $ct->add_to_cart($quantily,$id);
	// }

?>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h3 class="success">Đặt sách thành công</h3>
        
 		</div>
 	</div>
     
	 
</div>
</form>
<?php
include 'inc/footer.php';

?>
<style type="text/css">
    .success{
        text-align: center;
        color:green;
    }
</style>