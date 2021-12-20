<?php
include 'lib/session.php';
Session::init();
?>
<?php

include_once './lib/database.php';
include_once './helpers/format.php';
// include_once './classes/user.php';
// include_once './classes/cart.php';
// include_once './classes/category.php';
// include_once './classes/product.php';
spl_autoload_register(function($className){
	include_once "classes/".$className.".php";
});
$db= new Database();
$fm= new Format();
$us= new user();
$ct= new cart();
$cat= new category();
$cs= new customer();
$product= new product();


?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post" >
				    	<input type="text" placeholder="Tim kiếm sách" name="tukhoa">
						<input type="submit" value="TÌM KIẾM" name="search_product">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									<?php
										$check_cart = $ct->check_cart();
										if($check_cart){
											$sum=Session::get("sum");
											$qty=Session::get("qty");
											echo $fm->format_currency( $sum)." ".'đ'.'-'.'Sl: '.$qty;
										}else{
											echo '0'.' '.'đ';
										}
									?>
								</span>
							</a>
						</div>
			      </div>

			<?php
				if(isset($_GET['customer_id'])){
					$del_cart=$ct->dell_all_data_cart();
					Session::destroy();
				}
			?>

		   <div class="login">
			    <?php
				$login_check=Session::get('customer_login');
				if($login_check==false){
					echo '<a href="login.php">Đăng nhập</a></div>';
				}else{
					echo '<a href="?customer_id='.Session::get('customer_id').' ">  Đăng xuất</a></div>';
				}
		  		?>
				  
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sách</a> </li>
	  <!-- <li><a href="topbrands.php">Nhà xuất bản</a></li> -->
	  <?php 
	  $check_cart = $ct->check_cart();
	  	if($check_cart==true){
			echo '<li><a href="cart.php">Giỏ hàng</a></li>';
		  }else{
			echo '';
		  }
	  ?>

	<?php 
		$customer_id = Session::get('customer_id');
	  $check_order = $ct->check_order($customer_id);
		
	  	if($check_order==true){
			echo '<li><a href="orderdetails.php">Chi tiết đơn hàng</a></li>';
		  }else{
			echo '';
		  }
	  ?>
	  
	  <?php
	  	$login_check=Session::get('customer_login');
		  if($login_check==false){
			echo '';
		  }else{
			echo '<li><a href="profile.php">Tài khoản</a> </li>';
		  }
	  ?>
	  <?php
	  	$login_check=Session::get('customer_login');
		  if($login_check){		 
			echo '<li><a href="wishlist.php">Sách yêu thích</a> </li>';
		  }
	  ?>

	  <li><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
<style>
	input.grey {
    font-size: 20px;
    background: #353333;
    border-bottom-left-radius: 3px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom-right-radius: 3px;
    color: white;
	}
	
</style>