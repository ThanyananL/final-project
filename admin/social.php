<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'social.php';


$social_SL = "SELECT * FROM social ORDER BY social_sort ASC ";
$social_QR 	= mysqli_query($con,$social_SL);
$Num_Rows = mysqli_num_rows($social_QR);
$i=1;

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
						<h3>  จัดการ ติดต่อสอบถาม  </h3>
						<hr>
					</div>
				</div>


				<? include 'index_Alerts.php'; ?>
				
				<div class="row">

					<div class="col-md-12 br-margin2">
						<a href="social_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่มติดต่อสอบถาม
						</a>
					</div>

					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										ติดต่อสอบถามทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
									</div>
									<div class="col-md-6 text-right" style="margin: -5px;">
										<a class="btn btn-default" onclick="location.reload()">
											รีเฟรชหน้า
										</a>
										<a class="btn btn-default" onclick="goBack()">
											<span class="glyphicon glyphicon-backward">

											</span>
											กลับ
										</a>
									</div>
								</div>
								
							</div>
							<div class="panel-body">
								
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>รูป</th>
												<th>ข้อมูล</th>
												<th>ประเภท</th>
												<th>ลิ้ง</th>
												<th>แก้ไข , ลบ</th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($social 	= mysqli_fetch_array($social_QR)) {
												?>
												<tr id="<?php echo $social['social_id'] ?>">
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<?
														if (isset($social[social_photo])) {
															?>
															<img style="max-height: 35px;" src="../cloud/social_photo/<?php echo $social[social_photo]; ?>" />
															<?
														}
														else{
															?>
															-
															<?
														}
														?>
													</td>
													<td>
														<p><?php echo $social[social_name]; ?></p>
													</td>
													<td>
														<p><?php echo $social[social_type]; ?></p>
													</td>
													<td>
														<?
														if (isset($social[social_link])&&$social[social_link]!='') {
															?>
															<a href="http://<?php echo $social[social_link]; ?>" target="_blank"><?php echo $social[social_link]; ?></a>
															<?
														}
														else{
															?>
															-
															<?
														}
														?>
													</td>
													<td>
														<a href="social_update.php?social_id=<?php echo $social[social_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข  
														</a>
														<a href="social_del.php?social_id=<?php echo $social[social_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')">
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

							</div>
						</div>
						<!-- panel -->
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
<?
	$position = $_POST['position'];
	$social_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update social SET social_sort=".$social_sort_i." WHERE social_id =".$v;
		$mysqli->query($sql);

		$social_sort_i++;
	}
	?>
<script type="text/javascript">
	$( ".row_position" ).sortable({
		delay: 150,
		stop: function() {
			var selectedData = new Array();
			$('.row_position>tr').each(function() {
				selectedData.push($(this).attr("id"));
			});
			updateOrder(selectedData);
		}
	});
	function updateOrder(data) {
		$.ajax({
			url:"social.php",
			type:'post',
			data:{position:data},
			success:function(){
				
			}
		})
	}
</script>
</html>


