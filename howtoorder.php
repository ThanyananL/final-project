<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'howtoorder.php';



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?>   <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?> 
				</p>
			</div>
		</div>
		<div class="row margintop15">
			<div class="col-md-12 Review">
				<?
				$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'howtoorder' ";
				$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
				$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
				?>
				<?	if($_SESSION[Language]== "Thailand"){		echo $pagecontent[pagecontent_review]; 	} 	else if($pagecontent[pagecontent_review_eng]!=''){		echo $pagecontent[pagecontent_review_eng];  	}	else{		echo $pagecontent[pagecontent_review];	}	?>
			</div>
		</div>
		<!-- row -->
		<div class="row margintop15">
			<div class="col-md-12 Review">
				<?
				$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'howtoorder' ORDER BY gallery_id IS NULL ASC, gallery_sort ASC";
				$gallery_QR 	= mysqli_query($con,$gallery_SL);
				$gallery_Row 	= mysqli_num_rows($gallery_QR);
				while ($gallery 	= mysqli_fetch_array($gallery_QR)) {
					?>
					<?
					if (isset($gallery[gallery_review])&&trim($gallery[gallery_review])!='') {
						?>
						<div class="marginbottom15">
							<?php echo $gallery[gallery_review]; ?>
						</div>
						<?
					}
					?>
					<?
					if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!='') {
						?>
						<div class="marginbottom15">
							<img src="cloud/gallery_photo/<?php echo   $gallery[gallery_photo]; ?>" class="img-responsive" />
						</div>
						<?
					}
					?>															
					<?
					if (isset($gallery[gallery_video])&&trim($gallery[gallery_video])!='') {
						?>
						<div class="marginbottom15">
							<video width="100%" height="auto" controls><source src="cloud/gallery_video/<? echo $gallery[gallery_video]; ?>" type="video/mp4">Your browser does not support HTML5 video.
							</video>
						</div>
						<?
					}
					?>
					<?
					if (isset($gallery[gallery_youtube])&&trim($gallery[gallery_youtube])!='') {
						?>
						<div class="marginbottom15">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe  src="<?php echo $gallery['gallery_youtube']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							</div>
						</div>
						<?
					}
					?>
					<?
					if (isset($gallery[gallery_facebook])&&trim($gallery[gallery_facebook])!='') {
						?>
						<div class="marginbottom15">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://www.facebook.com/plugins/video.php?href=<?php echo $gallery['gallery_facebook']; ?>&show_text=0&width=269"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
							</div>
						</div>
						<?
					}
					?>
					
					<?
					if (isset($gallery[gallery_link])&&trim($gallery[gallery_link])!='') {
						?>
						<div class="marginbottom15">
							<a target="_blank" class="btn btn-default" href="http://<?php echo $gallery[gallery_link]; ?>">
								<span class="glyphicon glyphicon-link"></span>
								<?php echo $gallery[gallery_link]; ?>
							</a>
						</div>
						<?
					}
					?>
					<?
					if (isset($gallery[gallery_download])&&trim($gallery[gallery_download])!='') {
						?>
						<div class="marginbottom15">
							<a target="_blank" class="btn btn-default" href="cloud/gallery_download/<?php echo $gallery[gallery_download]; ?>">
								<span class="glyphicon glyphicon-download"></span>
								<?php echo $gallery[gallery_download]; ?>
							</a>
						</div>
						<?
					}
					?>

					<?
					$i++;
				}
				?>

			</div>
		</div>
		<!-- row -->
		<div class="row hidden-sm hidden-xs margintop30" >
			<div class="col-md-12">
				<ul class="breadcrumb" style="margin-bottom: 0px;">
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>       
					<li class="active"><a href="howtoorder.php"> <? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?>  </a></li>
				</ul>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>