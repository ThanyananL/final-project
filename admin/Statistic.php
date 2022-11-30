<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Statistic.php';

if ($_GET[Statistic_Del]=='Delete') {
	if (isset($_GET[StatisticID])){
		$_SESSION[StatisticID] =  $_GET[StatisticID];
	}
	$StatisticID =   $_SESSION[StatisticID] ;
	$Statistic_Del ="DELETE FROM `Statistic` WHERE StatisticID = '$StatisticID' ";
	$Statistic_Qurey  = mysqli_query($con,$Statistic_Del);
	if($Statistic_Qurey) {
		echo"<script>  window.location='statistic.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}

$Device_SL 	= " SELECT * FROM Device ";
$Device_QR 	= mysqli_query($con,$Device_SL);
$Device_Row 	= mysqli_num_rows($Device_QR);
$Loop = 1;
$StatisticLoop_SL = " (  ";
while ($Device 	= mysqli_fetch_array($Device_QR)) {
	if ($Loop>1) {
		$StatisticLoop_SL.= " OR ";
	}
	$StatisticLoop_SL .= "  StatisticBrowser  LIKE  '%$Device[DeviceText1]%'   " ;

$Loop++;
}
$StatisticLoop_SL .= " ) ";

$Row = "SELECT * FROM Statistic WHERE";
$Row .= $StatisticLoop_SL;


$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 100;   // Per Page
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

$Statistic_SL = $Row." ORDER BY StatisticID DESC LIMIT $Page_Start , $Per_Page ";
$Statistic_QR 	= mysqli_query($con,$Statistic_SL);

$YYYY = date('Y-m-d');

$time = time();
$timeStatistic = time() - 300;

$sql = "select * from Online where time_online > '$timeStatistic'";
$result = mysqli_query($con,$sql);
$Online = mysqli_num_rows($result);

$DaySl = $Row." AND ( StatisticDate = '$YYYY' ) ";
$DayQuery = mysqli_query($con,$DaySl);
$DayNum = mysqli_num_rows($DayQuery);

$AllSl = $Row;
$AllQuery = mysqli_query($con,$AllSl);
$Num_Rows = mysqli_num_rows($AllQuery);

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
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ผู้ใช้ออนไลน์
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($Online); ?> คน
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ผู้เข้าชมวันนี้
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($DayNum); ?> คน
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								ผู้เข้าชมทั้งหมด
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($Num_Rows); ?> คน
								</h4>
							</div>
						</div>
					</div>

					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								สถิติการเข้าชม ต่อวัน
							</div>
							<div class="panel-body">
								<?
								$All_DayNum = 0;
								for ($i=0; $i<=14; $i++) { 

									$date = date('Y-m-d', strtotime("-".$i." days"));


									$DaySl = $Row." AND  StatisticDate = '$date'  ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);


									$DayNow[$i] = $DayNum;
									$All_DayNum += $DayNum;
									$y=$i;

									$D[$i] = date('Y-m-d', strtotime("-$y days"));
								} 
								$All_DayNum = $All_DayNum / 14;
								?>

								<div id="StatisticDay" ></div>		
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">
								สถิติการเข้าชม ต่อเดือน
							</div>
							<div class="panel-body">
								<?
								$All_MonNum = 0;
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

									$DaySl = $Row." AND   MONTH(StatisticDate) = '$Mounth' and YEAR(StatisticDate) = '$Year' ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);

									$SumIncome[$i] = $DayNum;
									$All_MonNum += $DayNum;
									$y=$i-1;

									$YM[$i] = date('Y-m', strtotime("-$y month"));
								} 
								$All_MonNum = $All_MonNum / 12;
								?>

								<div id="container" ></div>		
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">
								การใช้งานล่าสุด
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>วัน</th>
												<th>เวลา</th>
												<th>IP</th>
												<th>Browser</th>
												<th>อุปกรณ์</th>
											</tr>
										</thead>
										<tbody>
											<?
											$i=1;
											while ($Statistic 	= mysqli_fetch_array($Statistic_QR)) {

												
												
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<p><?php echo $Statistic[StatisticDate]; ?></p>
													</td>
													<td>
														<p><?php echo $Statistic[StatisticTime]; ?></p>
													</td>
													<td>
														<p><?php echo $Statistic[StatisticIP]; ?></p>
													</td>
													<td title="<?php echo $Statistic[StatisticBrowser]; ?>">
														<p style="width: 400px;" class="hide2"><?php echo $Statistic[StatisticBrowser]; ?></p>
													</td>
													<td title="<?php echo  substr($Statistic[StatisticBrowser],11); ?>">
														<div style="padding: 5px;">
															<?
															$Device_SL 	= " SELECT * FROM Device ";
															$Device_QR 	= mysqli_query($con,$Device_SL);
															$Device_Row 	= mysqli_num_rows($Device_QR);
															while ($Device 	= mysqli_fetch_array($Device_QR)) {
																$StatisticLoop_SL 		= " SELECT * FROM Statistic WHERE (
																StatisticBrowser  		LIKE  '%$Device[DeviceText1]%'  OR
																StatisticBrowser  		LIKE  '%$Device[DeviceText2]%' 	OR 
																StatisticBrowser  		LIKE  '%$Device[DeviceText3]%'     )
																AND  (StatisticID = '$Statistic[StatisticID]' )";
																$StatisticLoop_QR 		= mysqli_query($con,$StatisticLoop_SL);
																$StatisticLoop_Row 	= mysqli_num_rows($StatisticLoop_QR);
																if ($StatisticLoop_Row>0) {
																	?>
																	<img style="width: 41px;height: 41px;"  src="../cloud/DevicePhoto/<?php echo $Device[DevicePhoto]; ?>"   />
																	<?
																}
															}
															?>
														</div>
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


<script>



	Highcharts.chart('StatisticDay', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'สถิติการเข้าชม ต่อวัน '
		},
		subtitle: {
			text: 'เฉลี่ย <? echo number_format($All_DayNum); ?> คน ต่อวัน'
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
			['<? echo $D[13]; ?>', <? echo $DayNow[13]; ?>],
			['<? echo $D[12]; ?>', <? echo $DayNow[12]; ?>],
			['<? echo $D[11]; ?>', <? echo $DayNow[11]; ?>],
			['<? echo $D[10]; ?>', <? echo $DayNow[10]; ?>],
			['<? echo $D[9]; ?>', <? echo $DayNow[9]; ?>],
			['<? echo $D[8]; ?>', <? echo $DayNow[8]; ?>],
			['<? echo $D[7]; ?>', <? echo $DayNow[7]; ?>],
			['<? echo $D[6]; ?>', <? echo $DayNow[6]; ?>],
			['<? echo $D[5]; ?>', <? echo $DayNow[5]; ?>],
			['<? echo $D[4]; ?>', <? echo $DayNow[4]; ?>],
			['<? echo $D[3]; ?>', <? echo $DayNow[3]; ?>],
			['<? echo $D[2]; ?>', <? echo $DayNow[2]; ?>],
			['<? echo $D[1]; ?>', <? echo $DayNow[1]; ?>],
			['<? echo $D[0]; ?>', <? echo $DayNow[0]; ?>]
			],

			dataLabels: {
				enabled: true,
				rotation: -90,
				color: '#FFFFFF',
				align: 'right',
					format: '{point.y}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});

	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'สถิติการเข้าชม ต่อเดือน'
		},
		subtitle: {
			text: 'เฉลี่ย <? echo number_format($All_MonNum); ?> คน ต่อเดือน'
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
			['<? echo $YM[12]; ?>', <? echo $SumIncome[12]; ?>],
			['<? echo $YM[11]; ?>', <? echo $SumIncome[11]; ?>],
			['<? echo $YM[10]; ?>', <? echo $SumIncome[10]; ?>],
			['<? echo $YM[9]; ?>', <? echo $SumIncome[9]; ?>],
			['<? echo $YM[8]; ?>', <? echo $SumIncome[8]; ?>],
			['<? echo $YM[7]; ?>', <? echo $SumIncome[7]; ?>],
			['<? echo $YM[6]; ?>', <? echo $SumIncome[6]; ?>],
			['<? echo $YM[5]; ?>', <? echo $SumIncome[5]; ?>],
			['<? echo $YM[4]; ?>', <? echo $SumIncome[4]; ?>],
			['<? echo $YM[3]; ?>', <? echo $SumIncome[3]; ?>],
			['<? echo $YM[2]; ?>', <? echo $SumIncome[2]; ?>],
			['<? echo $YM[1]; ?>', <? echo $SumIncome[1]; ?>],
			['<? echo $YM[0]; ?>', <? echo $SumIncome[0]; ?>]
			],

			dataLabels: {
				enabled: true,
				rotation: -90,
				color: '#FFFFFF',
				align: 'right',
					format: '{point.y}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	</script>