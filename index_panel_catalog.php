<a title=" <? echo $catalog[catalog_name]; ?> " href="product.php?catalog_id=<?php echo $catalog[catalog_id]; ?>"  >
<div class="panel panel-default no-boxsha  bg2 br radius20 bold" style="overflow: hidden;">
	<div class="panel-body  padding7">
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="size18 hide1 text-white no-margin " >
					<?
					if($_SESSION[Language]== "Thailand"){
						echo $catalog[catalog_name]; 
					} 
					else if($catalog[catalog_name_eng]!=''){
						echo $catalog[catalog_name_eng];  
					}
					else{
						echo $catalog[catalog_name];
					}
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="panel-heading  no-padding no-border">
		<div class="img80 hov-img-zoom">
			<img  src="cloud/catalog_photo/<?php echo $catalog[catalog_photo]; ?>"  />
		</div>
	</div>
</div>
</a>

