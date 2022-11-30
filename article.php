<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'article.php';

$Q = 1;
$Row = "SELECT * FROM article  ";
$RowQuery = mysqli_query($con,$Row);
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 20;   
$page = $_GET["page"];
if(!$_GET["page"]){
	$page=1;
}
$Prev_page = $page-1;
$Next_page = $page+1;
$page_Start = (($Per_page*$page)-$Per_page);
if($Num_Rows<=$Per_page){
	$Num_pages =1;
}
else if(($Num_Rows % $Per_page)==0){
	$Num_pages =($Num_Rows/$Per_page) ;
}
else{
	$Num_pages =($Num_Rows/$Per_page)+1;
	$Num_pages = (int)$Num_pages;
}
$i=$page_Start+1;
$article_SL = $Row . " ORDER BY article_id DESC LIMIT $page_Start , $Per_page ";
$article_QR = mysqli_query($con,$article_SL);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>   <? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?> | <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
	<meta name="keywords" content="  <? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?> - <? echo $fixed[fixed_topic]; ?>">
	<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					  <? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?>
				</p>
			</div>
		</div>
		<?
		$Ac_i = 1;
		while ($article     = mysqli_fetch_array($article_QR)) {
			if ($Ac_i==1) {
				?>
				<div class="row">
					<?php
				}
				?>  
				<div class="col-md-4">
					<? include 'index_panel_article.php'; ?>
				</div>
				<?php
				if ($Ac_i==3) {
					$Ac_i=0;
					?>
				</div>
				<?
			}
			$Ac_i++;
		}
		if ($Ac_i!=1) {
			echo "</div>";
		}
		?>
		<div class="row">
			<div class="col-md-12 text-center">
				<? include 'index_Pagenum.php'; ?>
			</div>
		</div>
		<div class="row  margintop30 uppercase" >
			<div class="col-md-12">
				<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>        
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li class="active">  <? if($_SESSION[Language]== "Thailand"){echo "บทความ & ข่าวสาร "; } else{echo "Articles & News"; } ?></li>
				</ul>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>

