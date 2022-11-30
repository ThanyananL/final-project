<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'slides.php';

$Row = "SELECT * FROM slides";
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

$slides_SL = $Row." ORDER BY slides_sort ASC LIMIT $Page_Start , $Per_Page ";
$slides_QR 	= mysqli_query($con,$slides_SL);

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
						<h3>  จัดการ สไลด์  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="slides_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่มสไลด์
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										สไลด์ ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
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
												<th>รูปสไลด์</th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($slides 	= mysqli_fetch_array($slides_QR)) {
												?>
												<tr id="<?php echo $slides['slides_id'] ?>">
													<td><? echo $i; ?></td>
													<td>
														<img  style="cursor: zoom-in;max-width: 500px;" id="myImgmain<?php echo $slides[slides_id]; ?>" src="../cloud/slides_photo/<?php echo $slides[slides_photo]; ?>"  />
														<div id="myModal" class="w3-modal">
															<span class="zoom-close w3-close">&times;</span>
															<img class="w3-modal-content w3-close" id="img01">
														</div>
														<script>
															var w3modal = document.getElementById("myModal");
															var img = document.getElementById("myImgmain<?php echo $slides[slides_id]; ?>");
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

														<p class="size20"> <? echo $slides[slides_topic]; ?> </p>
														<p> <? echo $slides[slides_detail]; ?> </p>
														<?
														if (isset($slides[slides_link])&&$slides[slides_link]!='') {
															?>
															<p> <a href="http://<? echo $slides[slides_link]; ?>" target="_blank"> <? echo $slides[slides_link]; ?> </a> </p>
															<?
														}
														?>
													</td>
													<td>
														<a href="slides_update.php?slides_id=<?php echo $slides[slides_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="slides_del.php?slides_id=<?php echo $slides[slides_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')">
															<span class="glyphicon glyphicon-trash"></span>
															ลบ 
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
	<?
	$position = $_POST['position'];
	$slides_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update slides SET slides_sort=".$slides_sort_i." WHERE slides_id =".$v;
		$mysqli->query($sql);

		$slides_sort_i++;
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
				url:"slides.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>


