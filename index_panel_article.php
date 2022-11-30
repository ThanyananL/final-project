<div class="panel panel-default no-radius no-boxsha  br-margin3 radius20" style="overflow: hidden;">
	<a href="article_detail.php?article_id=<? echo $article[article_id]; ?>" >
		<div class="panel-heading no-padding no-boxsha img60 hov-img-zoom">
			<img class="" src="cloud/article_photo/<?php echo $article[article_photo]; ?>"  />
		</div>
		<div class="panel-body paddingbottom5">
			<div class="row">
				<div class="col-md-12 resize" style="min-height: 54px !important;">
					<p class="text-black hide2 size14 bold">
						<?
						if($_SESSION[Language]== "Thailand"){
							echo $article[article_name]; 
						} 
						else if($article[article_name_eng]!=''){
							echo $article[article_name_eng];  
						}
						else{
							echo $article[article_name];
						}
						?>
					</p>
				</div>
				<div class="col-md-12  resize" style="min-height: 54px !important;">
					<p class="text-black hide2 size14">
						<?
						if($_SESSION[Language]== "Thailand"){
							echo $article[article_detail]; 
						} 
						else if($article[article_detail_eng]!=''){
							echo $article[article_detail_eng];  
						}
						else{
							echo $article[article_detail];
						}
						?>
					</p>
				</div>
				<div class="col-md-12">
					<a style="margin-bottom: 10px;" class="btn btn-main btn-sm" href="article_detail.php?article_id=<? echo $article[article_id]; ?>" >
						<? if($_SESSION[Language]== "Thailand"){echo "อ่านต่อ"; } else{echo "more"; } ?>
					</a>
				</div>
			</div>
		</div>
	</a>
</div>


