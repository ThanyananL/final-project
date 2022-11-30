<a href="product_detail.php?product_id=<? echo $product[product_id]; ?>" >
	<div class="panel panel-default no-boxsha  radius20 br" style="overflow: hidden;border-bottom: 1px solid #e5e5e5;">
		<div class="col-md-12 no-padding no-border" >
			<div class="col-md-3 no-padding">
				<a href="product_detail.php?product_id=<? echo $product[product_id]; ?>">
					<div class="img80">
						<img  src="cloud/product_photo/<? echo $product[product_photo]; ?>"  />
					</div>
				</a>
			</div>
			<div class="col-md-6 padding7">
				<p class="size18 marginbottom0  text-black bold" >
					<? echo $product[product_name]; ?>
				</p>
				<p class="size14 marginbottom0  text-black pre-line">
					<? echo $product[product_detail]; ?>
				</p>
				
				<a class="btn btn-sm btn-default padding2"  href="product_detail.php?product_id=<? echo $product[product_id]; ?>"  >
					ดูรายละเอียดเพิ่มเติม
				</a>
			</div>
			<div class="col-md-3">
				<p class="size18 bold marginbottom0  text-black pre-line" >
					<? echo number_format($product[product_price]); ?>	บาท
				</p>
				<p>
					<a data-toggle="modal" data-target="#modal_ipp_<? echo $product[product_id]; ?>" class="btn btn-main btn-sm">
						<span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่รถเข็น
					</a>
				</p>
			</div>
		</div>
	</div>
</a>


<div id="modal_ipp_<? echo $product[product_id]; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><? echo $product[product_name]; ?></h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
      			<form  method="get" action="product_cart.php" encType="multipart/form-data">
      				<input type="hidden" name="add_cart" value="x">
      				<div class="form-group marginbottom5">
      					<div class="col-md-12">
      						<label class="marginbottom5 control-label " > <span class="size20"> <? echo number_format($product[product_price]); ?> บาท  </span></label>
      					</div>
      					<div class="col-md-6">
      						<?
      						if (isset($product[product_amount])&&trim($product[product_amount]) == '0') {
      							?>
      							<input disabled placeholder="สินค้าหมด"  name="product_amount" type="number" class="form-control" maxlength="4" max="<? echo $product[product_amount]; ?>" required>
      							<?
      						}
      						else{
      							?>
      							<input placeholder="กรอกจำนวนสินค้า" value="1" name="product_amount" type="number" class="form-control" maxlength="4" max="<? echo $product[product_amount]; ?>" required>
                     <small>กรอกจำนวนสินค้า</small>
      							<? 											
      						}
      						?>
      						<input type="hidden" name="product_id" value="<? echo $product[product_id]; ?>" >
      					</div>
      					<div class="col-md-6">
      						<?
      						if (isset($product[product_amount])&&trim($product[product_amount]) == '0') {
      							?>
      							<button  class=" marginbottom5 btn btn-danger  boxsha btn-block">
      								<span class="glyphicon glyphicon-shopping-cart"></span>
      								<? if($_SESSION[Language]== "Thailand"){echo "สินค้าหมด"; } else{echo "sold out"; } ?> 
      							</button>
      							<?
      						}
      						else{
      							?>
      							<button type="submit" class=" marginbottom5 btn btn-main  boxsha btn-block">
      								<span class="glyphicon glyphicon-shopping-cart"></span>
      								<? if($_SESSION[Language]== "Thailand"){echo "เพิ่มในตะกร้าสินค้า"; } else{echo "Add cart"; } ?> 
      							</button>
      							<?												
      						}
      						?>
      					</div>
      				</div>
      			</form>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
      </div>
    </div>

  </div>
</div>


