<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'salereport.php';



$order_list_sql = "SELECT * FROM  order_list WHERE  ( order_list_status !='5' AND order_list_status !='4' ) ";
$order_list_rs 	= mysqli_query($con,$order_list_sql);


// วัน
$order_list_day_time = date('Y-m-d');

$order_list_day_sql = $order_list_sql." AND ( order_list_date = '$order_list_day_time' ) ";
$order_list_day_rs = mysqli_query($con,$order_list_day_sql);
$order_list_day_row = mysqli_num_rows($order_list_day_rs);

$order_list_day_price = 0;
$order_list_day_amount = 0;

while ($order_list_day = mysqli_fetch_array($order_list_day_rs)) {
	$order_list_day_price += $order_list_day[order_list_price];
	$order_list_day_amount += $order_list_day[order_list_amount];
}
// อาทิตย์
$order_list_week_time1 = date('Y-m-d');
$order_list_week_time2 = date('Y-m-d', strtotime("-7 days"));

$order_list_week_sql = $order_list_sql." AND ( order_list_date > '$order_list_week_time2' AND  order_list_date <= '$order_list_week_time1' )  ";
$order_list_week_rs = mysqli_query($con,$order_list_week_sql);
$order_list_week_row = mysqli_num_rows($order_list_week_rs);

$order_list_week_price = 0;
$order_list_week_amount = 0;

while ($order_list_week = mysqli_fetch_array($order_list_week_rs)) {
	$order_list_week_price += $order_list_week[order_list_price];
	$order_list_week_amount += $order_list_week[order_list_amount];
}

// เดือน
$order_list_month_time1 = date('Y-m-d');
$order_list_month_time2 =  date('Y-m-d', strtotime("-30 days"));

$order_list_month_sql = $order_list_sql." AND ( order_list_date > '$order_list_month_time2'  AND  order_list_date <= '$order_list_month_time1' )  ";
$order_list_month_rs = mysqli_query($con,$order_list_month_sql);
$order_list_month_row = mysqli_num_rows($order_list_month_rs);

$order_list_month_price = 0;
$order_list_month_amount = 0;

while ($order_list_month = mysqli_fetch_array($order_list_month_rs)) {
	$order_list_month_price += $order_list_month[order_list_price];
	$order_list_month_amount += $order_list_month[order_list_amount];
}

// ทั้งหมด

$order_list_all_sql = $order_list_sql;
$order_list_all_rs = mysqli_query($con,$order_list_all_sql);
$order_list_all_row = mysqli_num_rows($order_list_all_rs);

$order_list_all_price = 0;
$order_list_all_amount = 0;

while ($order_list_all = mysqli_fetch_array($order_list_all_rs)) {
	$order_list_all_price += $order_list_all[order_list_price];
	$order_list_all_amount += $order_list_all[order_list_amount];
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
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3>  จัดการ รายงานยอดขาย   </h3>
						<hr>
					</div>
					<div class="col-md-12 br-margin2">
						<form class="form-inline" method="get">
							<a  onclick="goBack()" class="btn btn-default"> กลับ </a>
						</form>	
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขายวันนี้
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($order_list_day_row); ?> <small>(ออเดอร์)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_day_price); ?> บาท  <small>(ยอดขาย)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_day_amount); ?>  <small>(จำนวนสินค้า)</small>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขาย 7 วันที่ผ่านมา
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($order_list_week_row); ?> <small>(ออเดอร์)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_week_price); ?> บาท  <small>(ยอดขาย)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_week_amount); ?>  <small>(จำนวนสินค้า)</small>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขาย 30 วันที่ผ่านมา
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($order_list_month_row); ?> <small>(ออเดอร์)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_month_price); ?> บาท  <small>(ยอดขาย)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_month_amount); ?>  <small>(จำนวนสินค้า)</small>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขายทั้งหมด
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($order_list_all_row); ?> <small>(ออเดอร์)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_all_price); ?> บาท  <small>(ยอดขาย)</small>
								</h4>
								<h4>
									<? echo number_format($order_list_all_amount); ?>  <small>(จำนวนสินค้า)</small>
								</h4>
							</div>
						</div>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขาย ต่อวัน
							</div>
							<div class="panel-body">
								<?

								$all_order_list_week_row = 0;


								for ($i=0; $i<=6; $i++) { 

									$order_list_week_time = date('Y-m-d', strtotime("-".$i." days"));

									$order_list_week_sql = $order_list_sql." AND ( order_list_date = '$order_list_week_time' ) ";
									$order_list_week_rs = mysqli_query($con,$order_list_week_sql);
									$order_list_week_row = mysqli_num_rows($order_list_week_rs);
									
									$order_list_week_price	= 0;
									$order_list_week_amount	= 0;
									while ($order_list_week = mysqli_fetch_array($order_list_week_rs)) {
										$order_list_week_price += $order_list_week[order_list_price];
										$order_list_week_amount += $order_list_week[order_list_amount];
									}

									$list_week[$i] = $order_list_week_price;
									$all_order_list_week_row += $order_list_week_price;
									$date[$i] = date('Y-m-d', strtotime("-$i days"));

								} 
								$all_order_list_week_row = $all_order_list_week_row/7;
								$all_order_list_week_row = number_format($all_order_list_week_row);
								?>
								<div id="statisic_week" ></div>	
								<script type="text/javascript">
									Highcharts.chart('statisic_week', {
										chart: {
											type: 'column'
										},
										title: {
											text: 'ยอดขาย 7 วันที่ผ่านมา '
										},
										subtitle: {
											text: 'เฉลี่ย <? echo $all_order_list_week_row; ?> บาท ต่อวัน'
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'คน'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: ''
										},
										series: [{
											name: 'Population',
											data: [
											['<? echo $date[6]; ?>', <? echo $list_week[6]; ?>],
											['<? echo $date[5]; ?>', <? echo $list_week[5]; ?>],
											['<? echo $date[4]; ?>', <? echo $list_week[4]; ?>],
											['<? echo $date[3]; ?>', <? echo $list_week[3]; ?>],
											['<? echo $date[2]; ?>', <? echo $list_week[2]; ?>],
											['<? echo $date[1]; ?>', <? echo $list_week[1]; ?>],
											['<? echo $date[0]; ?>', <? echo $list_week[0]; ?>]
											],

											dataLabels: {
												enabled: true,
												rotation: -90,
												color: '#FFFFFF',
												align: 'right',
												format: '{point.y}', 
												y: 10, 
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										}]
									});
								</script>	
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขาย ต่อเดือน
							</div>
							<div class="panel-body">
								<?

								$all_order_list_month_row = 0;


								for ($i=0; $i<=29; $i++) { 

									$order_list_month_time = date('Y-m-d', strtotime("-".$i." days"));

									$order_list_month_sql = $order_list_sql." AND ( order_list_date = '$order_list_month_time' ) ";
									$order_list_month_rs = mysqli_query($con,$order_list_month_sql);
									$order_list_month_row = mysqli_num_rows($order_list_month_rs);
									
									$order_list_month_price	= 0;
									$order_list_month_amount	= 0;
									while ($order_list_month = mysqli_fetch_array($order_list_month_rs)) {
										$order_list_month_price += $order_list_month[order_list_price];
										$order_list_month_amount += $order_list_month[order_list_amount];
									}

									$list_month[$i] = $order_list_month_price;
									$all_order_list_month_row += $order_list_month_price;
									$month[$i] = date('Y-m-d', strtotime("-$i days"));

								} 
								$all_order_list_month_row = $all_order_list_month_row/30;
								$all_order_list_month_row = number_format($all_order_list_month_row);
								?>
								<div id="statisic_month" ></div>	
								<script type="text/javascript">
									Highcharts.chart('statisic_month', {
										chart: {
											type: 'column'
										},
										title: {
											text: 'ยอดขาย 30 วันที่ผ่านมา '
										},
										subtitle: {
											text: 'เฉลี่ย <? echo $all_order_list_month_row; ?> บาท ต่อวัน'
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'คน'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: ''
										},
										series: [{
											name: 'Population',
											data: [


											['<? echo $month[29]; ?>', <? echo $list_month[29]; ?>],
											['<? echo $month[28]; ?>', <? echo $list_month[28]; ?>],
											['<? echo $month[27]; ?>', <? echo $list_month[27]; ?>],
											['<? echo $month[26]; ?>', <? echo $list_month[26]; ?>],
											['<? echo $month[25]; ?>', <? echo $list_month[25]; ?>],
											['<? echo $month[24]; ?>', <? echo $list_month[24]; ?>],
											['<? echo $month[23]; ?>', <? echo $list_month[23]; ?>],
											['<? echo $month[22]; ?>', <? echo $list_month[22]; ?>],
											['<? echo $month[21]; ?>', <? echo $list_month[21]; ?>],

											['<? echo $month[19]; ?>', <? echo $list_month[19]; ?>],
											['<? echo $month[18]; ?>', <? echo $list_month[18]; ?>],
											['<? echo $month[17]; ?>', <? echo $list_month[17]; ?>],
											['<? echo $month[16]; ?>', <? echo $list_month[16]; ?>],
											['<? echo $month[15]; ?>', <? echo $list_month[15]; ?>],
											['<? echo $month[14]; ?>', <? echo $list_month[14]; ?>],
											['<? echo $month[13]; ?>', <? echo $list_month[13]; ?>],
											['<? echo $month[12]; ?>', <? echo $list_month[12]; ?>],
											['<? echo $month[11]; ?>', <? echo $list_month[11]; ?>],

											['<? echo $month[10]; ?>', <? echo $list_month[10]; ?>],
											['<? echo $month[9]; ?>', <? echo $list_month[9]; ?>],
											['<? echo $month[8]; ?>', <? echo $list_month[8]; ?>],
											['<? echo $month[7]; ?>', <? echo $list_month[7]; ?>],
											['<? echo $month[6]; ?>', <? echo $list_month[6]; ?>],
											['<? echo $month[5]; ?>', <? echo $list_month[5]; ?>],
											['<? echo $month[4]; ?>', <? echo $list_month[4]; ?>],
											['<? echo $month[3]; ?>', <? echo $list_month[3]; ?>],
											['<? echo $month[2]; ?>', <? echo $list_month[2]; ?>],
											['<? echo $month[1]; ?>', <? echo $list_month[1]; ?>],


											['<? echo $month[0]; ?>', <? echo $list_month[0]; ?>]
											],

											dataLabels: {
												enabled: true,
												rotation: -90,
												color: '#FFFFFF',
												align: 'right',
												format: '{point.y}', 
												y: 10, 
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										}]
									});
								</script>	
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ยอดขาย ต่อปี
							</div>
							<div class="panel-body">
								<?

								$all_order_list_week_row = 0;


								for ($i=1; $i<=12; $i++) { 

									if ($i==0) {
										$Mounth = date('m', strtotime("+1 month"));
										$Year   = date('Y', strtotime("-$i month"));
										$x=$i-1;
									}
									else{
										$x=$i-1;
										$Mounth = date('m', strtotime("-$x month"));
										$Year   = date('Y', strtotime("-$x month"));
									}



									$order_list_week_time = date('Y-m-d', strtotime("-".$i." days"));

									$order_list_week_sql = $order_list_sql." AND (  MONTH(order_list_date) = '$Mounth' and YEAR(order_list_date) = '$Year' ) ";
									$order_list_week_rs = mysqli_query($con,$order_list_week_sql);
									$order_list_week_row = mysqli_num_rows($order_list_week_rs);
									
									$order_list_week_price	= 0;
									$order_list_week_amount	= 0;
									while ($order_list_week = mysqli_fetch_array($order_list_week_rs)) {
										$order_list_week_price += $order_list_week[order_list_price];
										$order_list_week_amount += $order_list_week[order_list_amount];
									}

									$list_mounth[$i] = $order_list_week_price;
									$all_order_list_week_row += $order_list_week_price;
									$mounth_chart[$i] = date('Y-m', strtotime("-$x month"));

								} 
								$all_order_list_week_row = $all_order_list_week_row/7;
								$all_order_list_week_row = number_format($all_order_list_week_row);
								?>
								<div id="statisic_year" ></div>	
								<script type="text/javascript">
									Highcharts.chart('statisic_year', {
										chart: {
											type: 'column'
										},
										title: {
											text: 'ยอดขาย 1 ปี '
										},
										subtitle: {
											text: 'เฉลี่ย <? echo $all_order_list_week_row; ?> บาท ต่อเดือน'
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'คน'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: ''
										},
										series: [{
											name: 'Population',
											data: [
											['<? echo $mounth_chart[12]; ?>', <? echo $list_mounth[12]; ?>],
											['<? echo $mounth_chart[11]; ?>', <? echo $list_mounth[11]; ?>],
											['<? echo $mounth_chart[10]; ?>', <? echo $list_mounth[10]; ?>],
											['<? echo $mounth_chart[9]; ?>', <? echo $list_mounth[9]; ?>],
											['<? echo $mounth_chart[8]; ?>', <? echo $list_mounth[8]; ?>],
											['<? echo $mounth_chart[7]; ?>', <? echo $list_mounth[7]; ?>],
											['<? echo $mounth_chart[6]; ?>', <? echo $list_mounth[6]; ?>],
											['<? echo $mounth_chart[5]; ?>', <? echo $list_mounth[5]; ?>],
											['<? echo $mounth_chart[4]; ?>', <? echo $list_mounth[4]; ?>],
											['<? echo $mounth_chart[3]; ?>', <? echo $list_mounth[3]; ?>],
											['<? echo $mounth_chart[2]; ?>', <? echo $list_mounth[2]; ?>],
											['<? echo $mounth_chart[1]; ?>', <? echo $list_mounth[1]; ?>],
											],

											dataLabels: {
												enabled: true,
												rotation: -90,
												color: '#FFFFFF',
												align: 'right',
												format: '{point.y}', 
												y: 10, 
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										}]
									});
								</script>	
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>


