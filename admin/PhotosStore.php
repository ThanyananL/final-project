<!-- <script>  window.location='Product.php'; </script> -->
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'PhotosStore.php';

if ($_POST['PhotosStoreAdd']) {


	if(isset($_FILES['PhotosStoreFile']['name'])&&$_FILES['PhotosStoreFile']['name']!=''){

		$Count = count($_FILES['PhotosStoreFile']['name']);

		for ($i=0; $i < $Count; $i++) { 

			$PhotosStoreFile = rand().$_FILES["PhotosStoreFile"]["name"][$i];
			if(move_uploaded_file($_FILES["PhotosStoreFile"]["tmp_name"][$i],"../Photo/PhotosStore/".$PhotosStoreFile)){
				$PhotosStore_Add = "INSERT INTO `PhotosStore` (`PhotosStoreFile`) VALUES ('$PhotosStoreFile')";
				$PhotosStore_Reult = mysqli_query($con,$PhotosStore_Add);
				if (!$PhotosStore_Reult) {
					echo"<script>alert('Error PhotosStore');  </script>";
				}
			}
		}

		echo"<script> window.location='PhotosStore.php?INSERT'; </script>";
	}


}


$Row = "SELECT * FROM PhotosStore ";

$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 10;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"]){
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page){
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0){
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$i=$Page_Start+1;

$PhotosStore_SL = $Row . " ORDER BY PhotosStoreID DESC LIMIT $Page_Start , $Per_Page ";
$PhotosStore_QR 	= mysqli_query($con,$PhotosStore_SL);

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
								<input type="file" class="form-control" required multiple="multiple" name="PhotosStoreFile[]">
							</div>
							<button type="submit"  class="btn btn-success">
								<span class="glyphicon glyphicon-picture"></span> เพิ่มรูปภาพ
							</button>
							<input type="hidden" name="PhotosStoreAdd" value="x">
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
												<th>ลิ้งที่สามารถนำไปใช้</th>
												<th>ลบ</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($PhotosStore 	= mysqli_fetch_array($PhotosStore_QR)) {
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td >
														<img style="max-width: 500px;max-height: 300px;" src="../Photo/PhotosStore/<?php echo $PhotosStore[PhotosStoreFile]; ?>" class="boxsha"  />
													</td>
													<td>
														<p title="สามารถก๊อบแล้วนำไปใช้ได้เลย" >http://<?php echo $fixed[fixed_website]; ?>/Photo/PhotosStore/<?php echo $PhotosStore[PhotosStoreFile]; ?></p>
													</td>

													<td>
														<a href="PhotosStore_Del.php?PhotosStoreID=<?php echo $PhotosStore[PhotosStoreID]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"><span class="glyphicon glyphicon-remove-sign"></span>  ลบ 
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
								<? include 'index_Pagenum.php'; ?>
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


