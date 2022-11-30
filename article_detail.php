<?
include 'index_Include.php'; 
$_SESSION['page'] = 'article.php';

$article_SL = " SELECT * FROM article WHERE article_id = '$_GET[article_id]'";
$article_QR = mysqli_query($con,$article_SL);
$article 	= mysqli_fetch_array($article_QR);

$article_name =  $article[article_name];

?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>  <?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?> | <? echo $fixed[fixed_website]; ?></title>
	<meta name="keywords" content="  <?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?>">
	<meta name="description" content="  <?	if($_SESSION[Language]== "Thailand"){		echo $article[article_detail]; 	} 	else if($article[article_detail_eng]!=''){		echo $article[article_detail_eng];  	}	else{		echo $article[article_detail];	}	?> <? echo $fixed[fixed_website]; ?> ">
	<meta name="author" content="  <?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?>">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="row ">
					<div class="col-md-12">
						<img class="full"  src="cloud/article_photo/<?php echo $article[article_photo]; ?>" >
						<p class="size18 bold margintop30">
							<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_detail]; 	} 	else if($article[article_detail_eng]!=''){		echo $article[article_detail_eng];  	}	else{		echo $article[article_detail];	}	?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 review">
						<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_review]; 	} 	else if($article[article_review_eng]!=''){		echo $article[article_review_eng];  	}	else{		echo $article[article_review];	}	?>
					</div>
				</div>
				<div class="row top-padding2">
					<?
					$article_picture_SL = " SELECT * FROM article_picture WHERE article_id = '$_SESSION[article_id]' ORDER BY article_picture_id ASC";
					$article_picture_QR 	= mysqli_query($con,$article_picture_SL);
					$article_picture_Row = mysqli_num_rows($article_picture_QR);

					if (isset($article_picture_Row)&&$article_picture_Row!=0) {

						$article_picture_SL = " SELECT * FROM article_picture WHERE article_id = '$_SESSION[article_id]' ORDER BY article_picture_id ASC";
						$article_picture_QR 	= mysqli_query($con,$article_picture_SL);
						$Ac_i=1;
						$article_pictureActive = 1;
						while ($article_picture 	= mysqli_fetch_array($article_picture_QR)) {
							?>
							<div class="col-md-12 margintop30">
								<img class="full"  src="cloud/article_picture_photo/<?php echo $article_picture[article_picture_photo]; ?>" >
							</div>
							<?
						}
					}
					?>
				</div>
				<div class="row hidden-sm hidden-xs margintop30 uppercase" >
					<div class="col-md-12">
						<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
							<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
							<li><a href="article.php">  <? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?></a></li>
							<li class="active">
								<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?>
							</li>        
						</ul>
					</div>
				</div>
			</div>
			<!-- 9 -->
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default no-boxsha radius20">
							<div class="panel-body bg-1 ">
								<div class="row">
									<div class="col-md-12">
										<p class="page-topic">
											<? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?>
										</p>
									</div>
								</div>
								<?
								$article_SL = " SELECT * FROM article WHERE article_id != '$_SESSION[article_id]'  ORDER BY rand() LIMIT 3";
								$article_QR 	= mysqli_query($con,$article_SL);
								while ($article 	= mysqli_fetch_array($article_QR)) {
									?>
									<div class="row">
										<div class="col-md-12 " >
											<div  style="border-bottom: 1px solid #e0e7f0;">
												<p>
													<a  href="article_detail.php?article_id=<?php echo $article[article_id]; ?>" >
														<img  src="cloud/article_photo/<?php echo $article[article_photo]; ?>" class="full" />
													</a>
												</p>
												<p class="size16">
													<a href="article.php?<?php echo $article[article_id]; ?>" class="br-margin3 " style="box-shadow: none;color: black;" >
														<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_name]; 	} 	else if($article[article_name_eng]!=''){		echo $article[article_name_eng];  	}	else{		echo $article[article_name];	}	?>
													</a>
												</p>
												<p class="hide2">
													<small>
														<?	if($_SESSION[Language]== "Thailand"){		echo $article[article_detail]; 	} 	else if($article[article_detail_eng]!=''){		echo $article[article_detail_eng];  	}	else{		echo $article[article_detail];	}	?>
													</small>
												</p>	
											</div>

										</div>
									</div>
									<br>
									<?
								}
								?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- 3 -->
		</div>
	</div>
	<!-- container -->
	<? include 'index_Footer.php'; ?>
</body>
</html>