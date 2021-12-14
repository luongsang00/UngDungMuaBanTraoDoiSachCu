<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/publishing.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helpers/format.php' ?>
<?php $fm= new Format();?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Book Name</th>
					<th>Book Price</th>
					<th>Book Image</th>
					<th>Category</th>
					<th>Publishing </th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd=new product();
				
				$pdlist = $pd->show_product();
				if($pdlist){
					$i=0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $fm->textShorten( $result['productName'],50 )?></td>
					<td><?php echo $result['price'] ?> </td>
					<td><img src="uploads/<?php echo $result['image']?>" width="80"></td>
					<td><?php echo $result['catName'] ?> </td>
					<td><?php echo $result['publishingName'] ?> </td>
					<td><?php echo $fm->textShorten( $result['product_desc'],50 )?> </td>
					<td><?php echo $result['type'] ?> </td>

					<td><a href="">Edit</a> || <a href="">Delete</a></td>
				</tr>
				<?php
					}
				}?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
