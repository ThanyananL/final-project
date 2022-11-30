<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'contactus.php';
$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'contactus' ";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
$pagecontent_id = $pagecontent[pagecontent_id];

$Row = "SELECT * FROM contactus";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 20;   // Per Page
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

$contactus_SL = " SELECT * FROM contactus ORDER BY contactus_id DESC LIMIT $Page_Start , $Per_Page ";
$contactus_RS 	= mysqli_query($con,$contactus_SL);
$contactus_Row 	= mysqli_num_rows($contactus_RS);

if ($_POST['Updatefixed_graphicmap']) {
	if($_FILES['fixed_graphicmap']['name']!=''){
		@unlink("../cloud/fixed_graphicmap/".$fixed['fixed_graphicmap']);
		$fixed_graphicmap = rand().$_FILES["fixed_graphicmap"]["name"];
		$upload = move_uploaded_file($_FILES["fixed_graphicmap"]["tmp_name"],"../cloud/fixed_graphicmap/".$fixed_graphicmap);
		$fixed_graphicmap_Update = "UPDATE `fixed` SET `fixed_graphicmap` = '$fixed_graphicmap'";
		$fixed_graphicmap_Reult = mysqli_query($con,$fixed_graphicmap_Update);
	}
	if ($fixed_graphicmap_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contactus.php?UPDATE';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
	}
}

if ($_POST['Updatefixed_googlemaps']) {
	$fixed_googlemaps = $_POST['fixed_googlemaps'];
	$fixed_Up = "UPDATE fixed SET fixed_googlemaps = '$fixed_googlemaps' ";
	$fixed_Reult = mysqli_query($con,$fixed_Up);
	if ($fixed_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contactus.php?UPDATE';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
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
						<h3>  หน้าเพจ ติดต่อเรา  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="contactus_update.php" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไขหน้าเพจ  
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดหน้าเพจติดต่อเรา 
							</div>
							<div class="panel-body">
								<? echo $pagecontent[pagecontent_review]; ?>
							</div>
							<div class="panel-footer">
								แก้ไขล่าสุด : <? echo $pagecontent[pagecontent_update]; ?>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										Google Maps 
									</div>
									<div class="col-md-6 text-right">
										<button type="button" style="margin: -6px;" class="btn btn-info" data-toggle="modal" data-target="#Updatefixed_googlemaps">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไข Google Maps 
										</button> 
									</div>
								</div>
							</div>
							<div class="panel-body Review">
								<? echo $fixed[fixed_googlemaps]; ?>
								<div id="Updatefixed_googlemaps" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> แก้ไข   Google Maps   </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label class="control-label " >  Google Maps  </label>
														<textarea class="form-control" rows="5" id="comment" name="fixed_googlemaps" placeholder=" Embed a map "><? echo $fixed[fixed_googlemaps]; ?></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input Type="hidden" name="Updatefixed_googlemaps" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="panel panel-default">
							<div class="panel-heading">
								การติดต่อเข้ามา ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
							</div>
							<div class="panel-body">
								<?
								if ($contactus_Row>0) {
									?>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th> #</th>
													<th> ชื่อ </th>
													<th> อีเมล </th>
													<th> เบอร์โทรศัพท์ </th>
													<th> วันเดือนปี </th>
													<th> รายละเอียด , ลบ </th>
												</tr>
											</thead>
											<tbody>
												<?
												while ($contactus 	= mysqli_fetch_array($contactus_RS)) {
													?>
													<tr>
														<td>
															<p>
																<?php echo $i; ?>
																<? 
																if ($contactus[notification_id]==1) {														
																	?>
																	<span class="glyphicon glyphicon-bell size12 text-red"></span>
																	<?
																}
																?>
															</p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_name]; ?></p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_email]; ?></p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_phone]; ?></p>
														</td>
														<td>
															<p><?php echo displaydate($contactus[contactus_date]); ?></p>
														</td>
														<td>
															<a href="contactus_one.php?contactus_id=<?php echo $contactus[contactus_id]; ?>" class="btn btn-primary">
																<span class="glyphicon glyphicon-zoom-in"></span>
																รายละเอียด  
															</a>
															<a href="contactus_del.php?contactus_id=<?php echo $contactus[contactus_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')">
																<span class="glyphicon glyphicon-trash"></span>
																ลบ 
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
									<?
								}
								else{
									echo "<h4> ยังไม่มีการติดต่อเข้ามา </h4>";
								}
								?>
							</div>
						</div>
					</div>
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
