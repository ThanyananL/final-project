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

if ($_POST['product_picture_add']) {
	if(isset($_FILES['product_picture_photo']['name'])&&$_FILES['product_picture_photo']['name']!=''){
		$Count = count($_FILES['product_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$suffix = strrchr($_FILES["product_picture_photo"]["name"][$i],".");
			$product_picture_photo = "product_picture_photo".rand().$suffix;
			if(move_uploaded_file($_FILES["product_picture_photo"]["tmp_name"][$i],"../cloud/product_picture_photo/".$product_picture_photo)){
				$product_picture_Add = "INSERT INTO `product_picture` (`product_id`,`product_picture_photo`) VALUES ('$product_id','$product_picture_photo')";
				$product_picture_Reult = mysqli_query($con,$product_picture_Add);
				if (!$product_picture_Reult) {
					echo"<script>alert('Error product_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='product_one.php?INSERT'; </script>";
	}
}

if ($_POST['product_update']) {
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
		if (!$product_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($product_photo_Reult) {
			echo"<script>   window.location='product_one.php?UPDATE'; </script>";
		}
	}
}


if ($_GET['product_picture_del']) {
	$product_picture_id =   $_GET[product_picture_id];
	$product_picture_SL = " SELECT * FROM product_picture WHERE product_picture_id = '$product_picture_id'";
	$product_picture_QR = mysqli_query($con,$product_picture_SL);
	$product_picture 	= mysqli_fetch_array($product_picture_QR);
	@unlink("../cloud/product_picture_photo/".$product_picture['product_picture_photo']);
	$product_picture_Del ="DELETE FROM `product_picture` WHERE product_picture_id = '$product_picture_id' ";
	$product_picture_Qurey  = mysqli_query($con,$product_picture_Del);
	if($product_picture_Qurey) {

		echo"<script>  window.location='product_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}

if ($_GET['product_video_del']) {
	$product_video_id =   $_GET[product_video_id];
	$product_video_SL = " SELECT * FROM product_video WHERE product_video_id = '$product_video_id'";
	$product_video_QR = mysqli_query($con,$product_video_SL);
	$product_video 	= mysqli_fetch_array($product_video_QR);
	@unlink("../cloud/product_video_file/".$product_video['product_video_file']);
	$product_video_Del ="DELETE FROM `product_video` WHERE product_video_id = '$product_video_id' ";
	$product_video_Qurey  = mysqli_query($con,$product_video_Del);
	if($product_video_Qurey) {

		echo"<script>  window.location='product_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
			<!-- md-2 -->
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3> สินค้า : <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product.php?page=<? echo $_SESSION[numpage]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="product_update.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a>
						<a href="product_del.php?product_id=<?php echo $product[product_id]; ?>" onclick="return confirm('ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">

						
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดสินค้า : <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin3">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อสินค้า</label>
												<label class="control-label col-md-9 text-left">
													<? echo $product[product_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายละเอียดเบื้องต้น</label>
												<label class="control-label col-md-9 text-left">
													<?
													if (isset($product[product_detail])&&trim($product[product_detail])!='') {
														echo $product[product_detail];
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >  ราคา </label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[product_price])&&trim($product[product_price])!='') {
														echo number_format($product[product_price]);
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > จำนวนสินค้าที่มี </label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[product_amount])&&trim($product[product_amount])!='') {
														echo number_format($product[product_amount]);
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > น้ำหนักสินค้า (กรัม) </label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[product_weight])&&trim($product[product_weight])!='') {
														echo number_format($product[product_weight]); echo "(กรัม)";
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > หมวดหมู่  </label>
												<label class="control-label  text-left col-md-9">
													<? 
													$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
													$catalog_QR = mysqli_query($con,$catalog_SL);
													$catalog 	= mysqli_fetch_array($catalog_QR);
													if (isset($catalog[catalog_id])&&trim($catalog[catalog_id])!='0') {
														echo $catalog[catalog_name];  
													}
													else{
														echo "-";
													}
													$collection_SL = " SELECT * FROM collection WHERE collection_id = '$product[collection_id]'";
													$collection_QR = mysqli_query($con,$collection_SL);
													$collection 	= mysqli_fetch_array($collection_QR);
													if (isset($collection[collection_id])&&trim($collection[collection_id])!='') {
														echo " <b> หมวดหมู่ย่อย</b> : "; echo $collection[collection_name]; 
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายการ</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[recommend_name])&&trim($product[recommend_name])!='') {
														echo $product[recommend_name]; 
													}
													else{
														echo "-";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >สถานะสินค้า</label>
												<label class="control-label col-md-9 text-left">
													<?
													$product_status_SL = " SELECT * FROM product_status WHERE product_status_id = '$product[product_status_id]'";
													$product_status_QR = mysqli_query($con,$product_status_SL);
													$product_status 	= mysqli_fetch_array($product_status_QR);

													if (!isset($product_status[product_status_id])||$product_status[product_status_id]=='') {
														?>
														-
														<?
													}
													else{
														echo $product_status[product_status_name]; 
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >จำนวนที่ขายได้</label>
												<label class="control-label col-md-9 text-left">
													<? 

													$product_sold = 0 ;

													$or_product_SL = " SELECT * FROM or_product WHERE product_id = '$product[product_id]'";
													$or_product_QR 	= mysqli_query($con,$or_product_SL);
													while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

														$order_list_SL 		= " SELECT * FROM order_list WHERE order_list_id = '$or_product[order_list_id]'";
														$order_list_RS 		= mysqli_query($con,$order_list_SL);	
														$order_list 		= mysqli_fetch_array($order_list_RS);

														if ($order_list[order_list_status] !='4' && $order_list[order_list_status]!='5') {
															$product_sold += $or_product[product_amount];
														}
													}

													echo $product_sold;
													?>
												</label>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- panel body รายละเอียดสินค้า-->
						</div>
						<!-- panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดทั้งหมด
							</div>
							<div class="panel-body">
								<?php echo $product[product_review]; ?>
							</div>
							<div class="panel-footer">
								แก้ไขล่าสุด : <? echo $product[product_datetime]; ?>
							</div>
						</div>
						

						
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> 
								<div class="row">
									<div class="col-md-4">
										รูปภาพ
									</div>
									<div class="col-md-8 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-sm btn-info marginbottom5 " data-toggle="modal" data-target="#product_update"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูปภาพหลัก 
										</button>
										<button type="button" class="btn btn-sm btn-success marginbottom5 " data-toggle="modal" data-target="#product_picture_add"> 
											<span class="glyphicon glyphicon-picture"></span>
											เพิ่มรูปภาพ 
										</button>
									</div>
								</div>
							</div>
							<div id="product_picture_add" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<form class="form" enctype="multipart/form-data" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของ สินค้า</span></label>
													<input type="file" required class="form-control" multiple="multiple" name="product_picture_photo[]">
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit"  class="btn btn-success">
													<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
												</button>
												<input type="hidden" name="product_picture_add" value="x">
												<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div id="product_update" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<form class="form" enctype="multipart/form-data" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของ สินค้า</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
													<input type="file" required class="form-control" multiple="multiple" name="product_photo">
												</div>
											</div>
											<div class="modal-footer">
												<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
													<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
												</button>
												<input type="hidden" name="product_update" value="x">
												<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="text-muted">
											รูปภาพหลักของ สินค้า
										</p>
									</div>
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $product[product_id]; ?>" src="../cloud/product_photo/<?php echo $product[product_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $product[product_id]; ?>");
											var modalImg = document.getElementById("img01");
											img.onclick = function(){
												w3modal.style.display = "block";
												modalImg.src = this.src;
											}
											var span = document.getElementsByClassName("w3-close")[0];
											span.onclick = function() { 
												w3modal.style.display = "none";
											}

											window.onclick = function(event) {
												if (event.target == w3modal) {
													w3modal.style.display = "none";
												}
											}
										</script>
									</div>
								</div>
								<div class="row">
									<?
									$product_picture_SL 		= " SELECT * FROM product_picture WHERE product_id = '$product[product_id]'";
									$product_picture_QR 		= mysqli_query($con,$product_picture_SL);
									$product_picture_Row 	= mysqli_num_rows($product_picture_QR);
									if ($product_picture_Row == '0') {
										?>
										<div class="col-md-12">
											<p class="text-muted">
												ยังไม่มีรูปภาพเพิ่มเติม
											</p>
										</div>
										<?
									}
									else{
										?>
										<div class="col-md-12">
											<p class="text-muted">
												รูปภาพเพิ่มเติมของ สินค้า
											</p>
										</div>
										<?
									}
									while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
										?>
										<div class="col-md-6">
											<div class="thumbnail">
												<div class="img80">
													<img style="cursor: zoom-in;" id="myImg<?php echo $product_picture[product_picture_id]; ?>" src="../cloud/product_picture_photo/<?php echo $product_picture[product_picture_photo]; ?>"  />
													<div id="myModal" class="w3-modal">
														<span class="zoom-close w3-close">&times;</span>
														<img class="w3-modal-content w3-close" id="img01">
													</div>
													<script>
														var w3modal = document.getElementById("myModal");
														var img = document.getElementById("myImg<?php echo $product_picture[product_picture_id]; ?>");
														var modalImg = document.getElementById("img01");
														img.onclick = function(){
															w3modal.style.display = "block";
															modalImg.src = this.src;
														}
														var span = document.getElementsByClassName("w3-close")[0];
														span.onclick = function() { 
															w3modal.style.display = "none";
														}


														window.onclick = function(event) {
															if (event.target == w3modal) {
																w3modal.style.display = "none";
															}
														}
													</script>
												</div>
												<div class="caption">
													<a href="product_one.php?product_picture_id=<?php echo $product_picture[product_picture_id]; ?>&product_picture_del=x" onclick="return confirm('ยืนยันการลบข้อมูล  ? ')" ><span class="glyphicon glyphicon-trash"></span> ลบ</a>
												</div>
											</div>
										</div>
										<?
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<!-- 4 -->
				</div>
				<!-- row -->

			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
	
	<div id="product_picture_add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของสินค้า</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="product_picture_photo[]">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
						</button>
						<input type="hidden" name="product_picture_add" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="product_update" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของสินค้า</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="product_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="product_update" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

