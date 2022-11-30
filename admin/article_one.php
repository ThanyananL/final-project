<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'article.php';

if (isset($_GET[article_id])){
	$_SESSION[article_id] =  $_GET[article_id];
}
$article_id =   $_SESSION[article_id] ;

$article_SL = " SELECT * FROM article WHERE article_id = '$article_id'";
$article_QR = mysqli_query($con,$article_SL);
$article 	= mysqli_fetch_array($article_QR);


if ($_POST['article_pictureAdd']) {

	if(isset($_FILES['article_picture_photo']['name'])&&$_FILES['article_picture_photo']['name']!=''){
		$Count = count($_FILES['article_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$Jpg = strrchr($_FILES["article_picture_photo"]["name"][$i],".");
			$article_picture_photo = rand().rand().$Jpg;
			if(move_uploaded_file($_FILES["article_picture_photo"]["tmp_name"][$i],"../cloud/article_picture_photo/".$article_picture_photo)){
				$article_picture_Add = "INSERT INTO `article_picture` (`article_id`,`article_picture_photo`) VALUES ('$article_id','$article_picture_photo')";
				$article_picture_Reult = mysqli_query($con,$article_picture_Add);
				if (!$article_picture_Reult) {
					echo"<script>alert('Error article_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='article_one.php?INSERT'; </script>";
	}

}

if ($_GET['article_pictureDel']) {

	$article_picture_id =   $_GET[article_picture_id];
	$article_picture_SL = " SELECT * FROM article_picture WHERE article_picture_id = '$article_picture_id'";
	$article_picture_QR = mysqli_query($con,$article_picture_SL);
	$article_picture 	= mysqli_fetch_array($article_picture_QR);

	@unlink("../cloud/article_picture_photo/".$article_picture['article_picture_photo']);

	$article_picture_Del ="DELETE FROM `article_picture` WHERE article_picture_id = '$article_picture_id' ";
	$article_picture_Qurey  = mysqli_query($con,$article_picture_Del);

	if($article_picture_Qurey) {
		echo"<script>  window.location='article_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

}

if ($_POST['articleUpdate']) {
	if($_FILES['article_photo']['name']!=''){
		@unlink("../cloud/article_photo/".$article['article_photo']);
		$Jpg = strrchr($_FILES["article_photo"]["name"],".");
		$article_photo = rand().rand().$Jpg;;
		$upload = move_uploaded_file($_FILES["article_photo"]["tmp_name"],"../cloud/article_photo/".$article_photo);
		$article_photo_Update = "UPDATE `article` SET `article_photo` = '$article_photo' WHERE `article_id` = '$article_id'";
		$article_photo_Reult = mysqli_query($con,$article_photo_Update);
		if (!$article_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($article_photo_Reult) {
			echo"<script>   window.location='article_one.php?UPDATE'; </script>";
		}
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
						<h3>   บทความ  : <span class="text-primary bold"> <?php echo $article[article_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="article.php?page=<? echo $_SESSION[numpage]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="article_update.php?article_id=<?php echo $article[article_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="article_del.php?article_id=<?php echo $article[article_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									รายละเอียดบทความ :  <span class="text-primary bold"> <?php echo $article[article_name]; ?> </span>
								</div>
								<div class="panel-body">
									<div class="row br-margin2">
										<div class="col-md-12">
											<form class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-md-3" > ชื่อ  บทความ </label>
													<label class="control-label col-md-9 text-left">
														<? echo $article[article_name]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3" >รายละเอียดเบื้องต้น</label>
													<label class="control-label col-md-9 text-left">
														<? echo $article[article_detail]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3" >ลงข้อมูลเมื่อ</label>
													<label class="control-label col-md-9 text-left">
														<? echo  displaydate($article[article_date]); ?>
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
									เนื้อหา
								</div>
								<div class="panel-body Review">
									<?php echo $article[article_review]; ?>
								</div>
								<div class="panel-footer">
									แก้ไขล่าสุด : <?php echo $article[article_datetime]; ?>
								</div>
							</div>
						</form>	
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
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#articleUpdate"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูปภาพหลัก 
										</button>
										<button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#article_pictureAdd"> 
											<span class="glyphicon glyphicon-picture"></span>
											เพิ่มรูปภาพ 
										</button>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="text-muted">
											รูปภาพหลักของ บทความ
										</p>
									</div>
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $article[article_id]; ?>" src="../cloud/article_photo/<?php echo $article[article_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $article[article_id]; ?>");
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
									$article_picture_SL 		= " SELECT * FROM article_picture WHERE article_id = '$article[article_id]'";
									$article_picture_QR 		= mysqli_query($con,$article_picture_SL);
									$article_picture_Row 	= mysqli_num_rows($article_picture_QR);
									if ($article_picture_Row == '0') {
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
												รูปภาพเพิ่มเติมของ บทความ
											</p>
										</div>
										<?
									}
									while ($article_picture 	= mysqli_fetch_array($article_picture_QR)) {
										?>
										<div class="col-md-6">
											<div class="thumbnail">
												<div class="img80">
													<img style="cursor: zoom-in;" id="myImg<?php echo $article_picture[article_picture_id]; ?>" src="../cloud/article_picture_photo/<?php echo $article_picture[article_picture_photo]; ?>"  />
													<div id="myModal" class="w3-modal">
														<span class="zoom-close w3-close">&times;</span>
														<img class="w3-modal-content w3-close" id="img01">
													</div>
													<script>
														var w3modal = document.getElementById("myModal");
														var img = document.getElementById("myImg<?php echo $article_picture[article_picture_id]; ?>");
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
													<a href="article_one.php?article_picture_id=<?php echo $article_picture[article_picture_id]; ?>&article_pictureDel=x" onclick="return confirm('ยืนยันการลบข้อมูล  ? ')" ><span class="glyphicon glyphicon-remove-sign"></span> ลบรูปนี้</a>
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
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
	<div id="article_pictureAdd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของ บทความ</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="article_picture_photo[]">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
						</button>
						<input type="hidden" name="article_pictureAdd" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="articleUpdate" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของ บทความ</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="article_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="articleUpdate" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>


