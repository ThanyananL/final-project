<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'store_photos.php';

if ($_POST['store_photos_add']) {
	if(isset($_FILES['store_photos_img']['name'])&&$_FILES['store_photos_img']['name']!=''){
		$Count = count($_FILES['store_photos_img']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$store_photos_img = rand().$_FILES["store_photos_img"]["name"][$i];
			if(move_uploaded_file($_FILES["store_photos_img"]["tmp_name"][$i],"../cloud/store_photos_img/".$store_photos_img)){
				$store_photos_Add = "INSERT INTO `store_photos` (`store_photos_img`) VALUES ('$store_photos_img')";
				$store_photos_Reult = mysqli_query($con,$store_photos_Add);
				if (!$store_photos_Reult) {
					echo"<script>alert('Error store_photos');  </script>";
				}
			}
		}
		echo"<script> window.location='store_photos.php?INSERT'; </script>";
	}
}

$Row = "SELECT * FROM store_photos ";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 10;   // Per page
$page = $_GET["page"];
if(!$_GET["page"]){
	$page=1;
}
$Prev_page = $page-1;
$Next_page = $page+1;
$page_Start = (($Per_page*$page)-$Per_page);
if($Num_Rows<=$Per_page){
	$Num_pages =1;
}
else if(($Num_Rows % $Per_page)==0){
	$Num_pages =($Num_Rows/$Per_page) ;
}
else{
	$Num_pages =($Num_Rows/$Per_page)+1;
	$Num_pages = (int)$Num_pages;
}
$i=$page_Start+1;

$store_photos_SL = $Row . " ORDER BY store_photos_id DESC LIMIT $page_Start , $Per_page ";
$store_photos_QR 	= mysqli_query($con,$store_photos_SL);

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
						<h3>  จัดการไฟล์รูปภาพ  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<form class="form-inline" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<input type="file" class="form-control" required multiple="multiple" name="store_photos_img[]">
							</div>
							<button type="submit"  class="btn btn-success">
								<span class="glyphicon glyphicon-picture"></span> เพิ่มรูปภาพ
							</button>
							<input type="hidden" name="store_photos_add" value="x">
						</form>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ไฟล์รูปภาพทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>รูปภาพ</th>
												<th>ลิ้งรูปภาพ</th>
												<th>ลบ</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($store_photos 	= mysqli_fetch_array($store_photos_QR)) {
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<img style="max-width: 300px;cursor: zoom-in;" id="myImg<?php echo $store_photos[store_photos_id]; ?>" src="../cloud/store_photos_img/<?php echo $store_photos[store_photos_img]; ?>"  />
														<div id="myModal" class="w3-modal">
															<span class="zoom-close w3-close">&times;</span>
															<img class="w3-modal-content w3-close" id="img01">
														</div>
														<script>
															var w3modal = document.getElementById("myModal");
															var img = document.getElementById("myImg<?php echo $store_photos[store_photos_id]; ?>");
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
													</td>
													<td>
														<input type="text" class="form-control" value="http://<?php echo $fixed[fixed_website]; ?>/cloud/store_photos_img/<?php echo $store_photos[store_photos_img]; ?>" id="<? echo($i); ?>">
														<script>
															function Function_store($i) {
																var copyText = document.getElementById($i);
																copyText.select();
																copyText.setSelectionRange(0, 99999)
																document.execCommand("copy");
																alert("copy เรียบร้อยแล้ว : " + copyText.value);
															}
														</script>
													</td>
													<td>
														<button  onclick="Function_store(<? echo($i); ?>)" class="btn btn-primary" >
															copy นำลิ้งไปใช้ 
														</button>
														<a href="store_photos_del.php?store_photos_id=<?php echo $store_photos[store_photos_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"><span class="glyphicon glyphicon-trash"></span>  ลบ 
														</a>
													</td>
												</tr>
												<?php
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel-footer">
								<? include 'index_pagenum.php'; ?>
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
</body>
</html>
