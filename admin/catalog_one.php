<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'catalog.php';

if (isset($_GET[catalog_id])){
	$_SESSION[catalog_id] =  $_GET[catalog_id];
}
$catalog_id =   $_SESSION[catalog_id] ;

if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$catalog_id'";
$catalog_QR = mysqli_query($con,$catalog_SL);
$catalog 	= mysqli_fetch_array($catalog_QR);

if ($_POST['catalog_pictureAdd']) {
	if(isset($_FILES['catalog_picture_photo']['name'])&&$_FILES['catalog_picture_photo']['name']!=''){
		$Count = count($_FILES['catalog_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$catalog_picture_photo = rand().$_FILES["catalog_picture_photo"]["name"][$i];
			if(move_uploaded_file($_FILES["catalog_picture_photo"]["tmp_name"][$i],"../cloud/catalog_picture_photo/".$catalog_picture_photo)){
				$catalog_picture_Add = "INSERT INTO `catalog_picture` (`catalog_id`,`catalog_picture_photo`) VALUES ('$catalog_id','$catalog_picture_photo')";
				$catalog_picture_Reult = mysqli_query($con,$catalog_picture_Add);
				if (!$catalog_picture_Reult) {
					echo"<script>alert('Error catalog_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='catalog_one.php?INSERT'; </script>";
	}
}
if ($_GET['catalog_pictureDel']) {

	$catalog_picture_id =   $_GET[catalog_picture_id];
	$catalog_picture_SL = " SELECT * FROM catalog_picture WHERE catalog_picture_id = '$catalog_picture_id'";
	$catalog_picture_QR = mysqli_query($con,$catalog_picture_SL);
	$catalog_picture 	= mysqli_fetch_array($catalog_picture_QR);

	@unlink("../cloud/catalog_picture_photo/".$catalog_picture['catalog_picture_photo']);

	$catalog_picture_Del ="DELETE FROM `catalog_picture` WHERE catalog_picture_id = '$catalog_picture_id' ";
	$catalog_picture_Qurey  = mysqli_query($con,$catalog_picture_Del);

	if($catalog_picture_Qurey) {
		echo"<script>  window.location='catalog_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

}

if ($_POST['catalog_picture_Update']) {
	if($_FILES['catalog_photo']['name']!=''){
		@unlink("../cloud/catalog_photo/".$catalog['catalog_photo']);
		@unlink("../cloud/catalog_min/".$catalog['catalog_photo']);
		$suffix = strrchr($_FILES["catalog_photo"]["name"],".");
		$catalog_photo = $catalog[catalog_page]."-".rand().$suffix;
		$upload = move_uploaded_file($_FILES["catalog_photo"]["tmp_name"],"../cloud/catalog_photo/".$catalog_photo);
		$catalog_photo_Update = "UPDATE `catalog` SET `catalog_photo` = '$catalog_photo' WHERE `catalog_id` = '$_SESSION[catalog_id]'";
		$catalog_photo_Reult = mysqli_query($con,$catalog_photo_Update);
		$table =  'catalog';
		min_resize($catalog_photo,$table);
		if (!$catalog_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($catalog_photo_Reult) {
			echo"<script>   window.location='catalog_one.php?UPDATE'; </script>";
		}
	}
}

if ($_POST['collection_add']) {

	$collection_name = function_teeth($_POST['collection_name']);
	$collection_detail = function_teeth($_POST['collection_detail']);

	$collection_page = rand();
	$collection_add = "INSERT INTO `collection` (`catalog_id`,`collection_page`,`collection_name`, `collection_detail`) VALUES ('$catalog_id','$collection_page','$collection_name','$collection_detail') ";
	$collection_Reult = mysqli_query($con,$collection_add);


	if (!$collection_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
	}
	if ($collection_Reult) {
		echo"<script>  window.location='catalog_one.php?INSERT'; </script>";
	}	
}

if ($_POST['update_collection']) {

	
	$collection_id = trim($_POST['collection_id']);
	
	$collection_name = function_teeth($_POST['collection_name']);
	$collection_detail = function_teeth($_POST['collection_detail']);

	$collection_Update = "UPDATE `collection` SET 
	`collection_name` = '$collection_name',
	`collection_detail` = '$collection_detail' WHERE `collection_id` = '$collection_id'";
	$collection_Reult = mysqli_query($con,$collection_Update);

	if (!$collection_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($collection_Reult) {
		echo"<script>   window.location='catalog_one.php?UPDATE'; </script>";
	}
}
if ($_GET['collection_del']) {

	$collection_id =   $_GET[collection_id];
	
	@unlink("../cloud/collection_photo/".$collection['collection_photo']);

	$collection_Del ="DELETE FROM `collection` WHERE collection_id = '$collection_id' ";
	$collection_Qurey  = mysqli_query($con,$collection_Del);

	if($collection_Qurey) {
		echo"<script>  window.location='catalog_one.php?DELETE'; </script>";
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
						<h3>       หมวดหมู่      : <span class="text-primary bold"> <?php echo $catalog[catalog_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="catalog.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="catalog_update.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="catalog_del.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด    หมวดหมู่     :  <span class="text-primary bold"> <?php echo $catalog[catalog_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ      หมวดหมู่     </label>
												<label class="control-label col-md-9 text-left">
													<? echo $catalog[catalog_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายละเอียดเบื้องต้น</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($catalog[catalog_detail])&&trim($catalog[catalog_detail])!='') {
														echo $catalog[catalog_detail]; 
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
										</form>
									</div>
								</div>
								<!-- row -->
							</div>
							<!-- panel body -->
						</div>
						<!-- panel -->	
						<div class="panel panel-default">
							<div class="panel-heading">
								หมวดหมู่ย่อย 
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#collection_add"> 
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม  
								</button>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th> หมวดหมู่ย่อย  </th>
												<th>  แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody>
											<?
											$collection_SL = " SELECT * FROM collection WHERE catalog_id = '$catalog_id'";
											$collection_QR 	= mysqli_query($con,$collection_SL);
											$i=1;
											while ($collection 	= mysqli_fetch_array($collection_QR)) {
												?>
												<tr>
													<td><? echo $i; ?></td>
													<td>
														<? echo $collection[collection_name]; ?>
														<hr>
														<? echo $collection[collection_detail]; ?>
													</td>
													<td>
														<button type="button" class="btn  btn-info " data-toggle="modal" data-target="#update_collection<? echo $collection[collection_id];?>"><span class="glyphicon glyphicon-edit"></span> แก้ไข </button>

														<a  class="btn btn-danger" href="catalog_one.php?collection_id=<?php echo $collection[collection_id]; ?>&collection_del=x" onclick="return confirm('ยืนยันการลบข้อมูล  ? ')" >
															<span class="glyphicon glyphicon-remove-sign"></span> ลบ
														</a>
													</td>
												</tr>
												<?
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div id="collection_add" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content ">
									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">เพิ่ม หมวดหมู่ย่อย ใหม่</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ   หมวดหมู่ย่อย     <span class="text-red"> * </span> </label>
												<div class="col-md-6">
													<input id="collection_name" type="text" class="form-control"  name="collection_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
												</div>
												<label class="control-label col-md-3 text-left" > <span id="collection_name_chars" class="text-muted">  </span>  </label>
												<script type="text/javascript">
													var collection_name = 80;
													$('#collection_name').keyup(function() {
														var length = $(this).val().length;
														var length = collection_name-length;
														$('#collection_name_chars').text(length);
													});
												</script>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
												<div class="col-md-6">
													<textarea id="collection_detail" class="form-control" rows="4" name="collection_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"></textarea>
												</div>
												<label class="control-label col-md-2 text-left" > <span id="collection_detail_chars"  class="text-muted">  </span>  </label>
												<script type="text/javascript">
													var collection_detail = 250;
													$('#collection_detail').keyup(function() {
														var length = $(this).val().length;
														var length = collection_detail-length;
														$('#collection_detail_chars').text(length);
													});
												</script>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="collection_add" value="x">
											<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
										</div>
									</form>
								</div>
							</div>
						</div>


						<?
						$collection_SL = " SELECT * FROM collection WHERE catalog_id = '$catalog_id'";
						$collection_QR 	= mysqli_query($con,$collection_SL);
						while ($collection 	= mysqli_fetch_array($collection_QR)) {
							?>
							<div id="update_collection<? echo $collection[collection_id];?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<form class="form-horizontal" action="" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="exampleModalLabel">แก้ไข หมวดหมู่ย่อย</h4>
											</div>
											<div class="modal-body">

												<div class="form-group">
													<label class="control-label col-md-3" > ชื่อ หมวดหมู่ย่อย <span class="text-red"> * </span> </label>
													<div class="col-md-6">
														<input id="collection_name" type="text" class="form-control" value="<? echo $collection[collection_name]; ?>" name="collection_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
													</div>
													<label class="control-label col-md-3 text-left" > <span id="collection_name_chars" class="text-muted">  </span>  </label>
													<script type="text/javascript">
														var collection_name = 80;
														$('#collection_name').keyup(function() {
															var length = $(this).val().length;
															var length = collection_name-length;
															$('#collection_name_chars').text(length);
														});
													</script>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
													<div class="col-md-6">
														<textarea id="collection_detail" class="form-control" rows="4" name="collection_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"><? echo $collection[collection_detail]; ?></textarea>
													</div>
													<label class="control-label col-md-2 text-left" > <span id="collection_detail_chars"  class="text-muted">  </span>  </label>
													<script type="text/javascript">
														var collection_detail = 250;
														$('#collection_detail').keyup(function() {
															var length = $(this).val().length;
															var length = collection_detail-length;
															$('#collection_detail_chars').text(length);
														});
													</script>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-info"> <span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข </button>
												<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
												<input Type="hidden" name="update_collection" value="x">
												<input Type="hidden" name="collection_id" value="<? echo $collection[collection_id];?>">
											</div>
										</form>
									</div>
									<!-- modal-content -->
								</div>
							</div>
							<?
						}
						?>
					</div>
					<!-- 12 -->
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> 
								<div class="row">
									<div class="col-md-4">
										จัดการรูปภาพ
									</div>
									<div class="col-md-8 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#catalog_picture_Update"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูป 
										</button>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="text-muted">
											รูปภาพหลักของ  หมวดหมู่    
										</p>
									</div>
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $catalog[catalog_id]; ?>" src="../cloud/catalog_photo/<?php echo $catalog[catalog_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $catalog[catalog_id]; ?>");
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
							</div>
						</div>
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
	<div id="catalog_picture_Update" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของ     หมวดหมู่    </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="catalog_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="catalog_picture_Update" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
