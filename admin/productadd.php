
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/publishing.php';?>
<?php include_once '../classes/product.php';?>

<?php
	$pd = new product();
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		

		$inserProduct= $pd->insert_product($_POST, $_FILES);
	}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sách</h2>
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
            <?php 
                if(isset($inserProduct))
                echo $inserProduct;
                ?>
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-----Chọn danh mục-----</option>
                            <?php
                            $cat= new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                            
                            ?>


                            <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Publishing</label>
                    </td>
                    <td>
                        <select id="select" name="publishing">
                            <option>-----Chọn NXB-----</option>
                            <?php
                            $publishing= new publishing();
                            $publishinglist = $publishing->show_publishing();
                            if($publishinglist){
                                while($result = $publishinglist->fetch_assoc()){
                            
                            ?>


                            <option value="<?php echo $result['publishingId'] ?>"><?php echo $result['publishingName'] ?></option>
                            <?php 
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
				    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Sách chuyên ngành</option>
                            <option value="1">Sách nuôi dạy con</option>
                            <option value="2">Sách kỹ năng</option>
                            <option value="3">Sách cho tuổi mới lớn</option>
                            <option value="4">Sách truyện thiếu nhi</option>
                            <option value="5">Sách thưởng thức - đời sống</option>
                            <option value="6">Truyện tranh manga</option>
                            <option value="7">Sách văn hóa - nghệ thuật- du lịc</option>
                            <option value="8">Tạp chí</option>
                            <option value="9">Hài hước - truyện cười</option>
                            <option value="10">Văn học Việt Nam</option>
                            <option value="11">Huyền bí - giả tưởng</option>
                            <option value="12">Văn học nước ngoài</option>
                            <option value="13">Tác phẩm kinh điển</option>
                            <option value="14">Thơ</option>
                            <option value="15">Tiểu thuyết tình cảm</option>
                            <option value="16">Tiểu sử - hồi ký</option>
                            <option value="17">Tiểu thuyết tình cảm</option>
                            <option value="18">Truyện trinh thám</option>
                            <option value="19">Truyện ngắn - tản văn</option>
                            <option value="20">Truyện kiếm hiệp phiêu lưu</option>
                            <option value="21">Ngôn tình</option>
                            <option value="22">Du ký</option>
                            <option value="23">Kinh dị</option>
                            


                        </select>
                    </td>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


