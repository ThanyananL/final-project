<div class="row">
	<?
	if (isset($_GET[INSERT])||isset($_GET[insert])){
		?>
		<div class="col-md-12">
			<div class="alert alert-success">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>เพิ่มเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>

	<?
	if (isset($_GET[UPDATE])||isset($_GET[update])){
		?>
		<div class="col-md-12">
			<div class="alert alert-info">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>อัพเดทเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>

	<?
	if (isset($_GET[DELETE])||isset($_GET[delete])){
		?>
		<div class="col-md-12">
			<div class="alert alert-danger">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>ลบเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>
</div>