<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'search_numbers.php';
if ($_GET[SubmitSearch]) {
	$Q=1;
	$Row = "SELECT * FROM order_list WHERE ";
	if (isset($_GET[TestSearch])&&$_GET[TestSearch]!='') {
		$TestSearch   = $_GET[TestSearch];
		if ($Q==1) {
			$Row .= " (  order_list_id = '$TestSearch' )";
			$Q++;
		}
	}
	if ($Q==1) {
		$Num_Rows ='s';
	}
	else{
		$order_list_SL = $Row . " ORDER BY order_list_id DESC ";
		$order_list_QR 	= mysqli_query($con,$order_list_SL);
		$order_list_QR2 	= mysqli_query($con,$order_list_SL);
		$Num_Rows = mysqli_num_rows($order_list_QR);
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?> <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container betwixt30">
		<div class="row ">
			<div class="col-md-12">
				<p class="pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-default bg-white no-boxsha radius20" style="overflow: hidden;">
					<div class="panel-body ">
						<p class="size20">
							 <? if($_SESSION[Language]== "Thailand"){echo "เลขใบสั่งซื้อ"; } else{echo "order number"; } ?> 
						</p>
						<p>
							  <? if($_SESSION[Language]== "Thailand"){echo "( ดูได้ที่อีเมลของคุณ หรือาจอยู่ในจดหมายขยะ )"; } else{echo "( see your email or may be in spam )"; } ?>  
						</p>
						<form method="get">
							<div class="form-group">
								<?
								if (isset($_SESSION[order_list_id])&&trim($_SESSION[order_list_id])!='') {
									?>
									<input value="<? echo $_SESSION[order_list_id]; ?>" required name="TestSearch" type="text" class="form-control " placeholder="เช่น 00952">
									<?
								}
								else{
									?>
									<input  required name="TestSearch" type="text" class="form-control " placeholder="เช่น 00952">
									<?
								}
								?>
								
							</div>
							<button type="submit" class="btn btn-main boxsha btn-block">  <? if($_SESSION[Language]== "Thailand"){echo "ค้นหา"; } else{echo "Submit Search"; } ?>  </button>
							<input type="hidden" name="SubmitSearch" value="x">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<?
				if ($Num_Rows=='s') {
					?>
					<div class="row ">
						<div class="col-lg-12 text-center">
							<h4 class="bold" style="color: #f03557;">
								ไม่พบข้อมูล
							</h4>
						</div>
					</div>
					<?
				}
				else if ($Num_Rows==0) {
				}
				else{
					?>
					<div class="panel panel-default bg-white no-boxsha" style="overflow: hidden;">
					<div class="panel-body  ">
							<?
							$i=1;
							while ($order_list 	= mysqli_fetch_array($order_list_QR2)) {
								$portage_SL 	= " SELECT * FROM portage WHERE portage_id = '$order_list[portage_id]'";
								$portage_QR 	= mysqli_query($con,$portage_SL);
								$portage 	= mysqli_fetch_array($portage_QR);	
								?>
								<div class="col-md-12">
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "สถานะ"; } else{echo "status"; } ?> : </span>
										<? include 'index_order_list_status.php'; ?>
									</p>
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "parcel number"; } ?> : </span> <?php echo $order_list[order_list_package]; ?> 
									</p>
									<p>
										<a class="btn btn-main" href="http://<? echo $order_list[order_list_p_link]; ?>" target="_blank"> <? if($_SESSION[Language]== "Thailand"){echo "ติดตามพัสดุ"; } else{echo "tracking"; } ?> </a>
									</p>
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?>: </span> <?php echo $order_list[order_list_member_name];?>
									</p>
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "เลขใบสั่งซื้อ"; } else{echo "order number"; } ?> : </span> <?php echo $order_list[order_list_id]; ?>
									</p>
									
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "จำนวนสินค้า"; } else{echo "amount"; } ?> : </span> <?php echo $order_list[order_list_amount]; ?>
									</p>
									<p>
										<span class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "เวลาสั่งซื้อ"; } else{echo "date time"; } ?> : </span><?php echo displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]; ?>
									</p>
								</div>	
								<?php
								$i++;
							}
							?>
						</div>
					</div>
					<?
				}
				?>
			</div>
		</div>
		<div class="row hidden-sm hidden-xs margintop30" >
			<div class="col-md-12">
				<ul class="breadcrumb" style="margin-bottom: 0px;">
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>        
					<li class="active"><a href="search_numbers.php"> <? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?> </a></li>
				</ul>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>