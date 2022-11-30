<title><? echo $fixed[fixed_website]; ?> | admin</title>
<meta charset="utf-8">
<link rel="icon" href="../Photo/adminlogo.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
<!-- swiper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.js"></script>
<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- ckeditor -->

<script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- select -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


<script type="text/javascript">
	function goBack() {
		window.history.back();
	}
</script>

<style>

	.col-centered{
		float: none;
		margin: 0 auto;
	}
	body{
		font-family: 'Prompt', sans-serif !important;
		transition: all 0.2s;
		padding-top: 80px;
	}
	.navbar{
		border-radius: 0px;
	}
	#nav a,#nav .active a{
		border-radius: 0px;
	}
	.form-horizontal .control-label.text-left{
		text-align: left;
		font-weight: normal;
	}
	.normal{
		font-weight: normal;
	}
	.bold{
		font-weight: bold;
	}
	.uppercase{
		text-transform: uppercase;
	}
	.full{
		width: 100%;
	}

	.no-radius{
		border-radius: 0px;
	}
	.no-padding{
		padding: 0px;
	}
	.no-margin{
		margin: 0px;
	}
	.no-border{
		border: none;
	}

	.br-margin1{
		margin-bottom: 10px;
	}
	.br-margin2{
		margin-bottom: 20px;
	}
	.br-margin3{
		margin-bottom: 40px;
	}
	.br-margin4{
		margin-bottom: 60px;
	}

	.br-padding1{
		padding-bottom: 10px;
	}
	.br-padding2{
		padding-bottom: 20px;
	}
	.br-padding3{
		padding-bottom: 40px;
	}
	.br-padding4{
		padding-bottom: 60px;
	}

	.br{
		margin-bottom: 8px;
	}

	.top-margin1{
		margin-top: 10px;
	}
	.top-margin2{
		margin-top: 20px;
	}
	.top-margin3{
		margin-top: 40px;
	}
	.top-margin4{
		margin-top: 60px;
	}

	.top-padding1{
		padding-top: 10px;
	}
	.top-padding2{
		padding-top: 20px;
	}
	.top-padding3{
		padding-top: 40px;
	}
	.top-padding4{
		padding-top: 60px;
	}

	.topic1{
		font-size: 40px;
	}
	.topic2{
		font-size: 45px;
	}
	.topic3{
		font-size: 50px;
	}

	input[type=text] ,input[type=number],input[type=email],input[type=email] , .btn{
		
	}
	.panel-heading{
		font-weight: bold;
		font-size: 16px;
	}
	.text-red{
		color: red;
	}
	.list-group a{
		color: black;
	}
	.img-responsive {

		margin: 0 auto;
	}
	.navbar li a{
		color: black;
	}

	.image-wrapper {
		position: relative;
		padding-bottom: 100%;
	}

	.image-wrapper img {
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
	}
	.boxsha{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		transition: all 0.3s;
	}
	.boxsha:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	/*1-0*/
	.boxsha2{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}
	/*0-1*/
	.boxsha3:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
	/*0-1*/
	.boxsha4:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
	/*1-1*/
	.boxsha5{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.boxsha5:hover{
		box-shadow: none;
		transition: all 0.3s;
	}
	.boxsha6{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		transition: all 0.3s;
	}
	.boxsha6:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
	}
	<?
	for ($size=10; $size <= 50; $size++) { 
		$textsize = "size".$size;
		?>
		.<? echo $textsize; ?>{
			font-size: <? echo $size; ?>px !important;
			line-height:  <? echo $size*1.6; ?>px !important;
		}
		<?
	}
	for ($img=150; $img >=20; $img=$img-5) { 
		$textimg = "img".$img;
		?>
		.<? echo $textimg; ?>{
			position: relative !important;
			padding-bottom: <? echo $img; ?>% !important;
			border-radius: 0px !important; 
		}
		.<? echo $textimg; ?> img{
			position: absolute !important;
			object-fit: cover !important;
			width: 100% !important;
			height: 100% !important;
		}
		<?
	}
	for ($padding=0; $padding <= 50; $padding++) { 
		$textpadding = "padding".$padding;
		?>
		.<? echo $textpadding; ?>{
			padding: <? echo $padding; ?>px !important;
		}
		<?
	}
	for ($margin=0; $margin <= 30; $margin++) { 
		$textmargin = "margin".$margin;
		?>
		.<? echo $textmargin; ?>{
			margin: <? echo $margin; ?>px !important;
		}
		<?
	}
	for ($betwixt=3; $betwixt <= 30; $betwixt++) { 
		$textbetwixt = "betwixt".$betwixt;
		?>
		.<? echo $textbetwixt; ?>{
			padding-top: <? echo $betwixt; ?>px !important;
			<? $betwixtbottom=$betwixt-3; ?>
			padding-bottom: <? echo $betwixtbottom; ?>px !important;
		}
		<?
	}
	for ($linehight=0; $linehight <= 30; $linehight++) { 
		$textlinehight = "linehight".$linehight;
		?>
		.<? echo $textlinehight; ?>{
			line-height:  <? echo $linehight; ?>px !important;
		}
		<?
	}

	for ($paddingtop=0; $paddingtop <= 50; $paddingtop++) { 
		$textcss = "paddingtop".$paddingtop;
		?>
		.<? echo $textcss; ?>{
			padding-top: <? echo $paddingtop; ?>px !important;
		}
		<?
	}
	for ($paddingbottom=0; $paddingbottom <= 50; $paddingbottom++) { 
		$textcss = "paddingbottom".$paddingbottom;
		?>
		.<? echo $textcss; ?>{
			padding-bottom: <? echo $paddingbottom; ?>px !important;
		}
		<?
	}
	for ($margintop=0; $margintop <= 50; $margintop++) { 
		$textcss = "margintop".$margintop;
		?>
		.<? echo $textcss; ?>{
			margin-top: <? echo $margintop; ?>px !important;
		}
		<?
	}
	for ($marginbottom=0; $marginbottom <= 50; $marginbottom++) { 
		$textcss = "marginbottom".$marginbottom;
		?>
		.<? echo $textcss; ?>{
			margin-bottom: <? echo $marginbottom; ?>px !important;
		}
		<?
	}
	?>


	.indent1{
		text-indent: 1em;
	}

	.indent2{
		text-indent: 2em;
	}

	.indent3{
		text-indent: 3em;
	}


	.hide1 {
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}
	.hide2{
		display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;
	}
	.hide3{
		display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;
	}
	.btn-info {
		color: #fff;
		background-color: #31b0d5;
		border-color: #46b8da;
	}


	.Review img{
		max-width: 100% !important;
		height: auto !important;
	}
	.Review iframe{
		width: 100% !important;

	}


	/*----------------------------------------*/

	.badgebox{
		opacity: 0;
	}
	.badgebox + .badge{
		text-indent: -999999px;
		width: 27px;
	}
	.badgebox:focus + .badge{

		box-shadow: inset 0px 0px 5px;
	}
	.badgebox:checked + .badge{
		text-indent: 0;
	}



	.w3-modal {
		display: none; 
		position: fixed;
		z-index: 1031;
		padding-top: 100px; 
		left: 0;
		top: 0;
		width: 100%; 
		height: 100%; 
		overflow: auto;
		background-color: rgb(0,0,0); 
		background-color: rgba(0,0,0,0.9); 
	}

	.w3-modal-content {
		margin: auto;
		display: block;
		width: 100%;
		max-width: 1000px;
	}

	.w3-modal-content, #w3caption {  
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.3s;
		animation-name: zoom;
		animation-duration: 0.3s;
	}

	#w3caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}
	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}
	.zoom-close {
		position: absolute;
		top: 10px;
		right: 35px;
		color: #f1f1f1;
		font-size: 50px;
		font-weight: normal;
		transition: 0.3s;
	}
	.zoom-close:hover,
	.zoom-close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}
	@media only screen and (max-width: 900px){
		.w3-modal-content {
			width: 100%;
		}
	}
	.form-horizontal .checkbox, .form-horizontal .checkbox-inline, .form-horizontal .radio, .form-horizontal .radio-inline {
		margin-right: 10px;
		margin-left: 0px;
	}


	.bootstrap-select .dropdown-menu {
		min-width: 100%;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		height: 300px !important;
	}



	@media (min-width: 1201px){
		.bootstrap-select .dropdown-menu li a {
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			overflow: hidden;
			max-width: 100% !important;
		}
	}
	@media (max-width: 1200px) {
		.bootstrap-select .dropdown-menu li a {
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			overflow: hidden;
			max-width: 400px !important;
		}
	}

	/*----------------------------------------------*/



	@media (max-width: 1200px) {
		.navbar-header {
			float: none;
		}
		.navbar-left,.navbar-right {
			float: none !important;
		}
		.navbar-toggle {
			display: block;
		}
		.navbar-collapse {
			border-top: 1px solid transparent;
			box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
		}
		.navbar-fixed-top {
			top: 0;
			border-width: 0 0 1px;
		}
		.navbar-collapse.collapse {
			display: none!important;
		}
		.navbar-nav {
			float: none!important;
			margin-top: 7.5px;
		}
		.navbar-nav>li {
			float: none;
		}
		.navbar-nav>li>a {
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.collapse.in{
			display:block !important;
		}
		.navbar-fixed-top .navbar-collapse {
			height: 500px !important;
		}
		.navbar-collapse.in {
			overflow-y: auto !important;
		}
	}



</style>

<script type="text/javascript">
	$.fn.modal.Constructor.prototype.enforceFocus = function () {
		var $modalElement = this.$element;
		$(document).on('focusin.modal', function (e) {
			var $parent = $(e.target.parentNode);
			if ($modalElement[0] !== e.target && !$modalElement.has(e.target).length
            // add whatever conditions you need here:
            &&
            !$parent.hasClass('cke_dialog_ui_input_select') && !$parent.hasClass('cke_dialog_ui_input_text')) {
				$modalElement.focus()
		}
	})
	};
</script>