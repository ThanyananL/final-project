<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'portage.php';

if (isset($_GET[portage_id])){
	$_SESSION[portage_id] =  $_GET[portage_id];
}
$portage_id =   $_SESSION[portage_id] ;


$portage_SL = " SELECT * FROM portage WHERE portage_id = '$portage_id'";
$portage_QR = mysqli_query($con,$portage_SL);
$portage 	= mysqli_fetch_array($portage_QR);

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
						<h3>   บริการส่งพัสดุ  : <span class="text-primary bold"> <?php echo $portage[portage_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="portage.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="portage_update.php?portage_id=<?php echo $portage[portage_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a>
						<a href="portage_del.php?portage_id=<?php echo $portage[portage_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')">
							<span class="glyphicon glyphicon-trash"></span>
							ลบ 
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดบริการส่งพัสดุ : <span class="text-primary bold"> <?php echo $portage[portage_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" >ชื่อบริการส่งพัสดุ</label>
												<label class="control-label col-md-9 text-left">
													<? echo $portage[portage_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายละเอียด</label>
												<label class="control-label col-md-9 text-left">
													<?
													if (isset($portage[portage_detail])&&trim($portage[portage_detail])!='') {
														echo $portage[portage_detail];
													}
													else{
														echo "-";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >ลิ้ง ติดตามพัสดุ </label>
												<label class="control-label col-md-9 text-left">
													<?
													if (isset($portage[portage_link])&&trim($portage[portage_link])!='') {
														?>
														<a target="_blank" href="http://<? echo $portage[portage_link]; ?>"><? echo $portage[portage_link]; ?></a>
														<?
													}
													else{
														echo "-";
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
								<div class="row">
									<div class="col-md-6" >
										น้ำหนักและราคา  
									</div>
									<div class="col-md-6 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#weight_add"> 
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่ม น้ำหนักและราคา  
										</button>
										<a class="btn btn-default" onclick="location.reload()">
											รีเฟรชหน้า
										</a>
										<a class="btn btn-default" onclick="goBack()">
											<span class="glyphicon glyphicon-backward">
												
											</span>
											กลับ
										</a>
									</div>
									<div id="weight_add" class="modal fade " role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<form action="" method="post">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="exampleModalLabel">เพิ่ม น้ำหนักและราคา</h4>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label for="recipient-name" class="control-label"> ราคาค่าส่ง <span class="text-red"> * </span> </label>
															<input type="number"   class="form-control" required  name="weight_price">
														</div>
														<div class="form-group">
															<label for="recipient-name" class="control-label"> น้ำหนักต่ำสุด (กรัม) ตั้งแต่ <span class="text-red"> * </span> </label>
															<input  type="number" class="form-control"  name="weight_min" required >
														</div>
														<div class="form-group">
															<label for="recipient-name" class="control-label"> น้ำหนักสูงสุด (กรัม) ถึง <span class="text-red"> * </span> </label>
															<input type="number" placeholder="" class="form-control" required  name="weight_max">
														</div>
														<div class="form-group">
															<label for="recipient-name" class="control-label">1,000 กรัม เท่ากับ 1 กิโลกรัม</label>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit"  class="btn btn-success">
															<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
														</button>
														<input type="hidden" name="weight_add">
														<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<?
									if (isset($_POST[weight_add])) {

										$weight_price = $_POST['weight_price'];
										$weight_min = $_POST['weight_min'];
										$weight_max = $_POST['weight_max'];

										$weight_add = "INSERT INTO `weight` (`weight_min`,`weight_price`,`weight_max`,`portage_id`) VALUES ('$weight_min','$weight_price','$weight_max','$portage_id')";
										$weight_Reult = mysqli_query($con,$weight_add);

										if (!$weight_Reult) {
											echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
										}
										if ($weight_Reult) {
											echo"<script>   window.location='portage_one.php?INSERT'; </script>";
										}
									}
									?>
								</div>
							</div>
							<div class="panel-body">
								<?
								$weight_SL = "SELECT * FROM weight WHERE portage_id = '$portage[portage_id]' order by  weight_price asc";
								$weight_RE 	= mysqli_query($con,$weight_SL);
								$weight_ROW	= mysqli_num_rows($weight_RE);
								if ($weight_ROW>0) {
									?>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>ราคาค่าจัดส่ง</th>
													<th>น้ำหนักต่ำสุด (กรัม) </th>
													<th>น้ำหลักสูงสุด (กรัม) </th>
													<th>รายละเอียด, แก้ไข, ลบ</th>
												</tr>
											</thead>
											<tbody>
												<?
												$i=1;
												while ($weight 	= mysqli_fetch_array($weight_RE)) {
													?>
													<tr>
														<td><? echo $i; ?></td>
														<td>
															<? echo number_format($weight[weight_price]); ?>
														</td>
														<td>
															<? echo number_format($weight[weight_min]); ?>
														</td>
														<td>
															<? echo number_format($weight[weight_max]); ?>
														</td>
														<td>
															<button type="button" class="btn btn-info" data-toggle="modal" data-target="#weight_update<? echo $weight[weight_id] ?>"><span class="glyphicon glyphicon-edit"></span> แก้ไข </button>
															<div id="weight_update<? echo $weight[weight_id] ?>" class="modal fade" role="dialog">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<form action="" method="post">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="exampleModalLabel">แก้ไข น้ำหนักและราคา</h4>
																			</div>
																			<div class="modal-body">
																				<div class="form-group">
																					<label for="recipient-name" class="control-label"> ราคาค่าส่ง <span class="text-red"> * </span> </label>
																					<input type="number"   class="form-control" required value="<? echo $weight['weight_price']; ?>" name="weight_price">
																				</div>
																				<div class="form-group">
																					<label for="recipient-name" class="control-label"> น้ำหนักต่ำสุด (กรัม) ตั้งแต่ <span class="text-red"> * </span> </label>
																					<input  type="number" class="form-control"  name="weight_min" required  value="<? echo $weight['weight_min']; ?>">
																				</div>
																				<div class="form-group">
																					<label for="recipient-name" class="control-label"> น้ำหนักสูงสุด (กรัม) ถึง <span class="text-red"> * </span> </label>
																					<input type="number" placeholder="" class="form-control" required value="<? echo $weight['weight_max']; ?>" name="weight_max">
																				</div>
																				<div class="form-group">
																					<label for="recipient-name" class="control-label">1,000 กรัม เท่ากับ 1 กิโลกรัม</label>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข </button>
																				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				<input Type="hidden" name="weight_update" value="x">
																				<input Type="hidden" name="weight_id" value="<? echo $weight[weight_id] ?>">
																			</div>
																		</form>
																	</div>
																	<!-- modal-content -->
																</div>
															</div>
															<?
															if ($_POST['weight_update']) {
																$weight_id = $_POST['weight_id'];
																$weight_price = $_POST['weight_price'];
																$weight_min = $_POST['weight_min'];
																$weight_max = $_POST['weight_max'];

																$weight_Update = "UPDATE `weight` SET `weight_min` = '$weight_min' ,`weight_max` = '$weight_max' , `weight_price` = '$weight_price' WHERE `weight_id` = '$weight_id'";
																$weight_Reult = mysqli_query($con,$weight_Update);

																if (!$weight_Reult) {
																	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
																}
																if ($weight_Reult) {
																	echo"<script>   window.location='portage_one.php?UPDATE'; </script>";
																}
															}
															?>
															<a href="portage_one.php?weight_id=<?php echo $weight[weight_id]; ?>&weight_del=delete" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล ')">
																<span class="glyphicon glyphicon-trash"></span>
																ลบ 
															</a>
															<?
															if ($_GET[weight_del]=='delete') {
																$weight_id =  $_GET[weight_id];
																$weight_Del ="DELETE FROM `weight` WHERE weight_id = '$weight_id' ";
																$weight_Reult  = mysqli_query($con,$weight_Del);
																if (!$weight_Reult) {
																	echo"<script> alert('เกิดข้อผิดพลาด');  window.location='portage_one.php' </script>";
																}
																if ($weight_Reult) {
																	echo"<script>  window.location='portage_one.php?DELETE'; </script>";
																}
															}
															?>
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
									?>
									<p class="size20 text-muted">
										ยังไม่มีข้อมูลนี้
									</p>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#weight_add"> 
										<span class="glyphicon glyphicon-plus-sign"></span>
										เพิ่ม น้ำหนักและราคา  
									</button>
									<?
								}
								?>
							</div>
							<!-- panel body -->
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


