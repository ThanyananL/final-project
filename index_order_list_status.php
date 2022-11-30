<?php
$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
$order_list_status 	= mysqli_fetch_array($order_list_status_QR);


if ($order_list[order_list_status]==1) {
	?>
	<!-- รอชำระเงิน -->
	<span class="bold text-red">
		<? echo $order_list_status[order_list_status_name];  ?>
	</span>
	<?
}
if ($order_list[order_list_status]==6) {
	?>
	<!-- รอการโทรยืนยัน -->
	<span class="bold text-danger">
		<? echo $order_list_status[order_list_status_name];  ?>
	</span>
	<?
}
if ($order_list[order_list_status]==2) {
	?>
	<!-- รอตรวจสอบ -->
	<span class="bold text-primary">
		<? echo $order_list_status[order_list_status_name]; ?>
	</span>
	<?
}
if ($order_list[order_list_status]==3) {
	?>
	<!-- ชำระเงินแล้ว -->
	<span class="bold text-primary">
		<? echo $order_list_status[order_list_status_name]; ?>
	</span>
	<?
}
if ($order_list[order_list_status]==7) {
	?>
	<!-- เตรียมส่งสินค้า -->
	<span class="bold text-primary">
		<? echo $order_list_status[order_list_status_name]; ?>
	</span>
	<?
}
if ($order_list[order_list_status]==8) {
	?>
	<!-- ส่งสินค้าแล้ว -->
	<span class="bold" style="color: green;">
		<? echo $order_list_status[order_list_status_name]; ?>
	</span>
	<?
}
if ($order_list[order_list_status]==4) {
	?>
	<!-- ยกเลิก -->
	<span class="bold" style="color: gray;">
		<? echo $order_list_status[order_list_status_name]; ?>
	</span>
	<?
}
?>