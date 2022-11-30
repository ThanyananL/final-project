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

if ($_POST['articleUpdate']) {

	$article_name_eng = function_teeth($_POST['article_name_eng']);
	$article_detail_eng = function_teeth($_POST['article_detail_eng']);
	$article_review_eng = function_teeth($_POST['article_review_eng']);

	$article_name = $_POST['article_name'];
	$article_name = str_replace("'","&#39;",$article_name);
	$article_name = str_replace("\"","&quot;",$article_name);

	$article_detail = $_POST['article_detail'];
	$article_detail = str_replace("'","&#39;",$article_detail);
	$article_detail = str_replace("\"","&quot;",$article_detail);

	$article_review = $_POST['article_review'];
	$article_review = str_replace("watch?v=","embed/",$article_review);

	$article_page = function_page($article['article_name']);
	$article_page = $article_page."-บทความ-".$_SESSION[article_id];

	$article_Update = "UPDATE `article` SET `article_datetime` = NOW(),
	`article_name_eng` = '$article_name_eng',
	`article_detail_eng` = '$article_detail_eng',
	`article_review_eng` = '$article_review_eng',
	`article_page` = '$article_page',
	`article_name` = '$article_name',
	`article_detail` = '$article_detail',
	`article_review` = '$article_review' WHERE `article_id` = '$article_id'";
	$article_Reult = mysqli_query($con,$article_Update);

	if (!$article_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['article_photo']['name']!=''){
		@unlink("../cloud/article_photo/".$article['article_photo']);
		$file = rand().$_FILES["article_photo"]["name"];
		$upload = move_uploaded_file($_FILES["article_photo"]["tmp_name"],"../cloud/article_photo/".$file);
		$article_photo_Update = "UPDATE `article` SET `article_photo` = '$file' WHERE `article_id` = '$article_id'";
		$article_photo_Reult = mysqli_query($con,$article_photo_Update);
	}

	if ($article_Reult) {
		echo"<script>   window.location='article_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข บทความ : <span class="text-primary bold"> <?php echo $article[article_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="article_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "บทความ" ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อบทความ  <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="article_name" type="text" class="form-control" value="<? echo $article[article_name]; ?>" name="article_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
										</div>
										<label class="control-label col-md-3 text-left" > <span id="article_name_chars" class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var article_name = 80;
											$('#article_name').keyup(function() {
												var length = $(this).val().length;
												var length = article_name-length;
												$('#article_name_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="article_detail" class="form-control" rows="4" name="article_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"><? echo $article[article_detail]; ?></textarea>
										</div>
										<label class="control-label col-md-2 text-left" > <span id="article_detail_chars"  class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var article_detail = 250;
											$('#article_detail').keyup(function() {
												var length = $(this).val().length;
												var length = article_detail-length;
												$('#article_detail_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="articleUpdate" value="x">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหา
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="article_review">
										<? echo $article[article_review]; ?>
									</textarea>
								</div>
								<div class="panel-footer">
									แก้ไขล่าสุด : <?php echo $article[article_datetime]; ?>
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


