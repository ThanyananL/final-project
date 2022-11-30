<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[article_id])){
	$_SESSION[article_id] =  $_GET[article_id];
}
$article_id =   $_SESSION[article_id] ;


$article_SL = " SELECT * FROM article WHERE article_id = '$article_id'";
$article_QR = mysqli_query($con,$article_SL);
$article 	= mysqli_fetch_array($article_QR);

@unlink("../cloud/article_photo/".$article['article_photo']);

$article_picture_SL = " SELECT * FROM article_picture WHERE article_id = '$article_id'";
$article_picture_QR = mysqli_query($con,$article_picture_SL);
while ($article_picture 	= mysqli_fetch_array($article_picture_QR)) {
	@unlink("../cloud/article_picture_photo/".$article_picture['article_picture_photo']);
}

$article_picture_Del ="DELETE FROM `article_picture` WHERE article_id = '$article_id' ";
$article_picture_Qurey  = mysqli_query($con,$article_picture_Del);

$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, HistorylogActivities, AdminID, AdminName ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','article_Del  $article[article_name]','$_SESSION[AdminID]','$LoginData[AdminName]')";
$HistorylogQuery = mysqli_query($con,$Historylog);


$article_Del ="DELETE FROM `article` WHERE article_id = '$article_id' ";
$article_Qurey  = mysqli_query($con,$article_Del);

if($article_Qurey) {
	echo"<script>  window.location='article.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>