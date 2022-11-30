<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';
if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id =   $_SESSION[product_id] ;
$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);
if ($_POST['productUpdate']) {

	$product_name_eng 		= input_all($_POST['product_name_eng']);
	$product_detail_eng 	= input_all($_POST['product_detail_eng']);
	$product_review_eng 		= input_all($_POST['product_review_eng']);

	$product_cost = input_all($_POST['product_cost']);
	$product_wholesale = input_all($_POST['product_wholesale']);
	$product_note = input_all($_POST['product_note']);

	$product_name = input_all($_POST['product_name']);
	$product_price = input_all($_POST['product_price']);
	$product_weight = input_all($_POST['product_weight']);
	$product_amount = input_all($_POST['product_amount']);
	$product_detail = input_all($_POST['product_detail']);
	$product_review = function_review($_POST['product_review']);

	$product_status_id = $_POST['product_status_id'];
	$collection_id		= $_POST['collection_id'];
	$catalog_id		= $_POST['catalog_id'];


	$recommend_name = " ";
	for($i=0;$i<count($_POST["recommend_name"]);$i++){
		if(trim($_POST["recommend_name"][$i]) != ""){
			$recommend_name .= $_POST["recommend_name"][$i];
			if ($i<count($_POST["recommend_name"])-1) {
				$recommend_name .= " , ";
			}

		}
	}
	
	$product_Update = "UPDATE `product` SET `product_datetime` = NOW(),
	`product_name_eng` = '$product_name_eng',
	`product_detail_eng` = '$product_detail_eng',
	`product_review_eng` = '$product_review_eng',
	`product_cost` = '$product_cost',
	`product_wholesale` = '$product_wholesale',
	`collection_id` = '$collection_id',
	`catalog_id` = '$catalog_id',
	`product_note` = '$product_note',
	`recommend_name` = '$recommend_name',
	`product_status_id` = '$product_status_id',
	`product_name` = '$product_name',
	`product_price` = '$product_price',
	`product_weight` = '$product_weight',
	`product_amount` = '$product_amount',
	`product_detail` = '$product_detail',
	`product_review` = '$product_review' WHERE `product_id` = '$product_id'";
	$product_Reult = mysqli_query($con,$product_Update);
	if (!$product_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($product_Reult) {

		if($_FILES['product_photo']['name']!=''){
			@unlink("../cloud/product_photo/".$product['product_photo']);
			@unlink("../cloud/product_min/".$product['product_photo']);
			$suffix = strrchr($_FILES["product_photo"]["name"],".");
			$product_photo = "product_photo".rand().$suffix;
			$upload = move_uploaded_file($_FILES["product_photo"]["tmp_name"],"../cloud/product_photo/".$product_photo);
			$product_photo_Update = "UPDATE `product` SET `product_photo` = '$product_photo' WHERE `product_id` = '$_SESSION[product_id]'";
			$product_photo_Reult = mysqli_query($con,$product_photo_Update);
			$table =  'product';
			min_resize($product_photo,$table);
		}


		echo"<script>   window.location='product_one.php?UPDATE'; </script>";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<? include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3>  แก้ไขสินค้า : <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">

							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " สินค้า " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > รูปสินค้า </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="product_photo" >
										</div>
										<label class="control-label col-md-2 text-left" > รูปใหม่ที่ต้องการเปลี่ยน </label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ชื่อสินค้า <span class="text-red">* </span>  </label>
										<div class="col-md-6">
											<input type="text" class="form-control" required name="product_name" value="<? echo $product[product_name]; ?>"   placeholder="ชื่อสินค้า ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<input value="<? echo $product[product_detail]; ?>" type="text" class="form-control"  name="product_detail"  placeholder="รายละเอียดเบื้องต้น แนะนำสินค้าสั้นๆ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ราคา <span class="text-red">* </span>  </label>
										<div class="col-md-6">
											<input type="text" class="form-control" required name="product_price" value="<? echo $product[product_price]; ?>"   placeholder="ราคา ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > จำนวนสินค้าที่มี </label>
										<div class="col-md-6">
											<input Type="number" class="form-control" name="product_amount" value="<? echo $product[product_amount]; ?>" placeholder="จำนวนสินค้าที่มี"   >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักสินค้า (กรัม) </label>
										<div class="col-md-6">
											<input Type="number" class="form-control" name="product_weight" value="<? echo $product[product_weight]; ?>" placeholder="น้ำหนักสินค้า"   >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > หมวดหมู่  </label>
										<div class="col-md-3">
											<select class="form-control"   name="catalog_id"  onChange ="Listcollection(this.value)">
												<?
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
												$catalog_QR = mysqli_query($con,$catalog_SL);
												$catalog 	= mysqli_fetch_array($catalog_QR);

												if (!isset($catalog[catalog_id])||$catalog[catalog_id]=='') {
													?>
													<option value="0">หมวดหมู่</option>
													<?
												}
												else{
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><? echo $catalog[catalog_name]; ?></option>
													<option value="0"> --- ไม่เลือก --- </option>
													<?
												}
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id != '$product[catalog_id]' ORDER BY catalog_id ASC";
												$catalog_QR 	= mysqli_query($con,$catalog_SL);
												while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
										<div class="col-md-3">
											<select class="form-control"  id="ddlcollection" name="collection_id"  >
												<?
												$collection_SL = " SELECT * FROM collection WHERE collection_id = '$product[collection_id]'";
												$collection_QR = mysqli_query($con,$collection_SL);
												$collection 	= mysqli_fetch_array($collection_QR);

												if (!isset($collection[collection_id])||$collection[collection_id]=='') {
													?>
													<option value="0">หมวดหมู่ย่อย</option>
													<?
												}
												else{
													?>
													<option value="<?php echo $collection[collection_id]; ?>"><? echo $collection[collection_name]; ?></option>
													<?
												}
												$collection_SL = " SELECT * FROM collection WHERE collection_id != '$product[collection_id]' and  catalog_id = '$product[catalog_id]' ORDER BY collection_id ASC";
												$collection_QR 	= mysqli_query($con,$collection_SL);
												while ($collection 	= mysqli_fetch_array($collection_QR)) {
													?>
													<option value="<?php echo $collection[collection_id]; ?>"><?php echo $collection[collection_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รายการ </label>
										<div class="col-md-6">
											<?
											$recommend_SL = " SELECT * FROM recommend order by recommend_id asc";
											$recommend_QR 	= mysqli_query($con,$recommend_SL);
											while ($recommend 	= mysqli_fetch_array($recommend_QR)) {
												$Searchrecommend = "SELECT * FROM product WHERE recommend_name LIKE '%$recommend[recommend_name]%' AND product_id =  $product[product_id]";
												$recommend_Reult = mysqli_query($con,$Searchrecommend);
												$RowSearchrecommend  = mysqli_num_rows($recommend_Reult); 
												if ($RowSearchrecommend != 0) {
													?>
													<label class="checkbox-inline">
														<input  name="recommend_name[]" checked value="<?php echo $recommend['recommend_name'];?>" type="checkbox">
														<?php echo $recommend[recommend_name]; ?>
													</label>
													<?
												}
												else{
													?>
													<label class="checkbox-inline">
														<input  name="recommend_name[]" value="<?php echo $recommend['recommend_name'];?>" type="checkbox">
														<?php echo $recommend[recommend_name]; ?>
													</label>
													<?
												}
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >สถานะสินค้า </label>
										<div class="col-md-6">
											<select class="form-control"  name="product_status_id">
												<?
												$product_status_SL = " SELECT * FROM product_status WHERE product_status_id = '$product[product_status_id]'";
												$product_status_QR = mysqli_query($con,$product_status_SL);
												$product_status 	= mysqli_fetch_array($product_status_QR);
												if (!isset($product_status[product_status_id])||$product_status[product_status_id]=='') {
													?>
													<option value="">สถานะสินค้า</option>
													<?
												}
												else{
													?>
													<option value="<?php echo $product_status[product_status_id]; ?>"><? echo $product_status[product_status_name]; ?></option>
													<?
												}
												$product_status_SL = " SELECT * FROM product_status WHERE product_status_id != '$product[product_status_id]' AND product_status_id != '3' ORDER BY product_status_id ASC";
												$product_status_QR 	= mysqli_query($con,$product_status_SL);
												while ($product_status 	= mysqli_fetch_array($product_status_QR)) {
													?>
													<option value="<?php echo $product_status[product_status_id]; ?>"><?php echo $product_status[product_status_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
									</div>	
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-6">
											<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="productUpdate" value="x">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									รายละเอียดทั้งหมด
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<textarea class="ckeditor" name="product_review">
												<? echo $product[product_review]; ?>
											</textarea>	
										</div>
									</div>
								</div>
							</div>
							
						</form>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
	
</body>
</html>
