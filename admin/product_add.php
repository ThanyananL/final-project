<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';
if ($_POST['product_add']) {
	
	$product_name_eng 		= input_all($_POST['product_name_eng']);
	$product_detail_eng 	= input_all($_POST['product_detail_eng']);
	$product_review_eng 		= input_all($_POST['product_review_eng']);

	$product_cost 		= input_all($_POST['product_cost']);
	$product_wholesale 	= input_all($_POST['product_wholesale']);
	$product_note 		= input_all($_POST['product_note']);

	$product_name 		= input_all($_POST['product_name']);
	$product_price 		= input_all($_POST['product_price']);
	$product_amount 		= input_all($_POST['product_amount']);
	$product_weight 	= input_all($_POST['product_weight']);

	$product_detail 	= input_all($_POST['product_detail']);
	$product_review 	= function_review($_POST['product_review']);
	$product_status_id 	= $_POST['product_status_id'];
	$collection_id		= $_POST['collection_id'];
	$catalog_id			= $_POST['catalog_id'];

	$recommend_name = " ";
	for($i=0;$i<count($_POST["recommend_name"]);$i++){
		if(trim($_POST["recommend_name"][$i]) != ""){
			$recommend_name .= $_POST["recommend_name"][$i];
			if ($i<count($_POST["recommend_name"])-1) {
				$recommend_name .= " , ";
			}
		}
	}

	$product_add = "INSERT INTO `product` ( `product_name_eng`,`product_detail_eng`,`product_review_eng`,`product_weight`,`product_amount`,`product_price`,`catalog_id`,`collection_id`,`product_cost`,`product_wholesale`,`product_note`,`proportion_name`,`product_status_id`, `product_sizetext`, `product_name`, `product_detail`, `product_review`, `product_datetime`, `recommend_name`) 
	VALUES ('$product_name_eng','$product_detail_eng','$product_review_eng','$product_weight','$product_amount','$product_price','$catalog_id','$collection_id','$product_cost','$product_wholesale','$product_note','$proportion_name','$product_status_id','$product_sizetext', '$product_name', '$product_detail', '$product_review', now(),  '$recommend_name')";
	$product_Reult = mysqli_query($con,$product_add);
	$_SESSION[product_id] = mysqli_insert_id($con);
	if ($product_Reult) {

		$product_SL = " SELECT * FROM product WHERE product_id = '$_SESSION[product_id]'";
		$product_QR = mysqli_query($con,$product_SL);
		$product 	= mysqli_fetch_array($product_QR);

		if($_FILES['product_photo']['name']!=''){
			$suffix = strrchr($_FILES["product_photo"]["name"],".");
			$product_photo = "product_photo".rand().$suffix;
			$upload = move_uploaded_file($_FILES["product_photo"]["tmp_name"],"../cloud/product_photo/".$product_photo);
			$product_photo_Update = "UPDATE `product` SET `product_photo` = '$product_photo' WHERE `product_id` = '$_SESSION[product_id]'";
			$product_photo_Reult = mysqli_query($con,$product_photo_Update);
			$table =  'product';
			min_resize($product_photo,$table);
		}

		if(isset($_FILES['product_picture_photo']['name'])&&$_FILES['product_picture_photo']['name']!=''){
			$Count = count($_FILES['product_picture_photo']['name']);
			for ($i=0; $i < $Count; $i++) { 
				$suffix = strrchr($_FILES["product_picture_photo"]["name"],".");
				$product_picture_photo = "product_picture_photo".rand().$suffix;
				if(move_uploaded_file($_FILES["product_picture_photo"]["tmp_name"][$i],"../cloud/product_picture_photo/".$product_picture_photo)){
					$product_picture_Add = "INSERT INTO `product_picture` (`product_id`,`product_picture_photo`) VALUES ('$_SESSION[product_id]','$product_picture_photo')";
					$product_picture_Reult = mysqli_query($con,$product_picture_Add);
					if (!$product_picture_Reult) {
						echo"<script>alert('Error product_picture'); window.history.back(); </script>";
					}
				}
			}
		}

		echo"<script>  window.location='product_one.php?INSERT'; </script>";
	}	

	if (!$product_Reult) {
		echo"<script>alert('Error product_Reult'); window.history.back(); </script>";
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
						<h3>  เพิ่ม สินค้า  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">

							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " สินค้า " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > รูปสินค้า <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="product_photo"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ชื่อสินค้า <span class="text-red">*</span> </label>
										<div class="col-md-6">
											<input Type="text" class="form-control" name="product_name"  placeholder="ชื่อสินค้า " required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<input Type="text" class="form-control"  name="product_detail"  placeholder=" แนะนำสินค้าสั้นๆ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ราคา <span class="text-red">*</span> </label>
										<div class="col-md-6">
											<input Type="number" class="form-control" name="product_price"  placeholder="ราคา" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > จำนวนสินค้าที่มี </label>
										<div class="col-md-6">
											<input Type="number" class="form-control" name="product_amount"  placeholder="จำนวนสินค้าที่มี" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักสินค้า (กรัม) </label>
										<div class="col-md-6">
											<input Type="number" class="form-control" name="product_weight"  placeholder="น้ำหนักสินค้า" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >หมวดหมู่   </label>
										<div class="col-md-3">
											<select class="form-control"  name="catalog_id" onChange ="Listcollection(this.value)">
												<option value="0">หมวดหมู่</option>
												<?
												$catalog_SL = " SELECT * FROM catalog  ORDER BY catalog_id ASC";
												$catalog_QR 	= mysqli_query($con,$catalog_SL);
												while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?>  </option>
													<?
												}
												?>
											</select>
										</div>
										<div class="col-md-3">
											<select placeholder="หมวดหมู่ย่อย"  class="form-control"  id="ddlcollection" name="collection_id" >
												<option value="0">หมวดหมู่ย่อย</option>
												<option value="0">กรุณาเลือกหมวดหมู่หลัก</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รายการ </label>
										<div class="col-md-6">
											<?
											$recommend_SL = " SELECT * FROM recommend  ORDER BY recommend_id ASC";
											$recommend_QR 	= mysqli_query($con,$recommend_SL);
											while ($recommend 	= mysqli_fetch_array($recommend_QR)) {
												?>
												<label class="checkbox-inline">
													<input  name="recommend_name[]" value="<?php echo $recommend['recommend_name'];?>" type="checkbox">
													<?php echo $recommend[recommend_name]; ?>
												</label>
												<?
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > สถานะสินค้า </label>
										<div class="col-md-6">
											<select class="form-control"  name="product_status_id">
												<?
												$product_status_SL = " SELECT * FROM product_status WHERE product_status_id != '3' ORDER BY product_status_id ASC";
												$product_status_QR 	= mysqli_query($con,$product_status_SL);
												while ($product_status 	= mysqli_fetch_array($product_status_QR)) {
													?>
													<option value="<?php echo $product_status[product_status_id]; ?>"><?php echo $product_status[product_status_name]; ?>  </option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รูปเพิ่มเติม  </label>
										<div class="col-md-6">
											<input type="file"  class="form-control" multiple="multiple" name="product_picture_photo[]">
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="product_add" value="x">
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
											</textarea>		
										</div>
									</div>
								</div>
							</div>

						</form>
						<!-- form -->
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
