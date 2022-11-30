
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="cloud/fixed_titlelogo/<?php echo $fixed[fixed_titlelogo]; ?>" type="image/gif" > 
<!-- bootstrap -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<!-- swiper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.js"></script>
<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style>
	/*----------------------body------------------------*/
	body{
		font-family: 'Noto Sans Thai','Roboto', sans-serif;
		transition: all 0.2s;
		top: 0px !important;
	}
	body > .skiptranslate {
		display: none !important;
	}
	@media (min-width: 1200px){
		body {
			padding-top: 2px;
		}
		.product_detail{
			min-height: 459px;
		}
		.product_photo{
			padding-right: 0px;

		}
	}
	@media (max-width: 1201px) {
		body {
			padding-top: 60px;
		}
		.product_detail{
			margin-top: 15px;
		}
	}
	/*-----------------------body------------------------*/


	/*-----------------------navbar-----------------------*/ 

	#computer  .navbar{
		border-radius: 0px;
		margin-bottom: 0px;
		box-shadow: none;
		border-bottom: none;
		transition: all 0.3s;
		background-color: white;
		border-color: white;
		border:none;
		border-bottom: 0px;
		border-top: 0px;
	}
	#computer  .navbar-nav>li>a {
		margin-top: 20px;
		margin-bottom: 20px;
		margin-right: 1px;
		padding: 10px 10px;
		font-size: 17px;
		text-transform: uppercase;
		color: black;
	}
	#computer .navbar-btn {
		margin-top: 11px;
		margin-bottom: 11px;
	}
	#computer .navbar-default .navbar-nav>.active>a, #computer .navbar-default .navbar-nav>.active>a:focus, #computer .navbar-default .navbar-nav>.active>a:hover {
		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);

		color: white;
	}
	#computer .navbar-nav>li>a:hover , #computer  .nav .open>a,#computer  .nav .open>a:focus,#computer  .nav .open>a:hover {
		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);
		color: white;
	}
	#computer .dropdown-menu {
		height: auto;
		font-size: 17px;
	}
	.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);

		color: white;
	}


	@media (max-width: 1201px) {
		#phone  .navbar-nav>li>a:hover {
			background-color: #675a32;
			color: white;
		}
		#phone .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
			background-color: #675a32;
			color: white;
		}
		#phone .navbar-default {
			background-color: white;
			border-radius: 0px;
		}
		#phone  .navbar-nav>li>a {
			font-size: 18px;
			color: white;
			font-weight: bold;
			color: #282828;
		}
		#phone .navbar-default .navbar-nav .open .dropdown-menu>li>a {
			color: #282828;
			font-size: 18px;
			padding-top: 8px;
			padding-bottom: 8px;
		}
		#phone .navbar-nav > li > .dropdown-menu {
			margin-top: 0;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
		#phone  .navbar-header {
			padding: 5px;
		}
		#phone .Subcate{
			padding-left: 30px;
		}
		#phone .navbar-form {
			border: none;
		}
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
			max-height: 500px;
		}
		#phone .navbar-brand {
			float: left;
			height: 50px;
			padding: 15px 15px;
			font-size: 18px;
			line-height: 20px;
			color: #282828; 
		}
	}

	/*-----------------------navbar-----------------------*/  


	/*-----------------------panel-----------------------*/
	.panel-set01 .panel{
		border-radius: 0px;
		margin-bottom: 0px !important;
	}
	.panel-set01  .panel-heading {
		background-color: #1e1e1e !important;
		color: white;
		font-size: 25px;
		text-align: center;
		font-weight: normal !important;
		border:none;
		border-radius: 0px;
	}
	.panel-set01  .panel-body {
		border-radius: 0px;

	}

	.panel-set01  .panel-body  a{
		color: #1e1e1e !important;
		font-size: 18px;

	}

	.panel-set02  {
		box-shadow: none;
		border: none;
	}
	.panel-set02  > .panel-heading {
		border-bottom : 1px solid #f6c46a;
	}
	.panel-set03  {
		box-shadow: none;
		border: none;
	}
	.panel-set03 > .panel-heading {
		border : 1px solid #f6c46a;
		border-bottom-left-radius: 20px;
		border-top-right-radius: 20px;
		background-color: white;
	}
	.panel-set04  {
		box-shadow: none;
		border: none;

	}
	.panel-set04 > .panel-heading {
		border-bottom : 1px solid #f6c46a;
		background-color: #f8f8f9;
	}

	.in-panel01 {
		position: absolute;
		bottom: 10px;
		left: 0px;
		border-top:2px solid #2e3094;
		background-color: rgba(68,68,68, 0.9);
		color: white;
		padding-left: 7px;
		padding-right: 7px;
		font-size: 16px;
		border-radius: 0px;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
	}
	.in-panel02 {
		position: absolute;
		top: 0px;
		left: 0px;
		background-color: rgba(230,229,229, 0.7);
		color: #0046B2;
		padding-left: 8px;
		padding-right: 8px;
		padding-top: 8px;
		padding-bottom: 8px;
		font-size: 16px;
		font-weight: bold;
		border-radius: 0px;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
	}

	@media (min-width: 1200px){
		#panel-top{
			min-height: 354px;
		}
	}
	@media (max-width: 1201px) {
		#panel-top{
			/*min-height: 354px;*/
		}
	}
	.border1{
		border-bottom: 1px solid #e6e7e9 !important;
	}
	.glyphicon-star{
		color: #FFD700;
	}

	/*-----------------------panel-----------------------*/





	/*-----------------------text-----------------------*/ 

	.top{
		margin-top: 15px;
	}
	.br{
		margin-bottom: 15px;
	}
	.pagetopic{
		font-size: 24px;
		font-weight: bold;
		text-transform: uppercase;
	}
	@media (max-width: 991px) {
		.pagetopic{
			font-size: 20px;
			font-weight: bold;
			text-transform: uppercase;
		}
	}

	.ul-1{
		list-style: square inside url('cloud/next.png');
	}
	.ul-2{
		list-style: square inside url('cloud/bullet.gif');
	}
	.ul-3{
		list-style: square inside url('cloud/bullet3.gif');
	}
	.ul-4{
		list-style: square inside url('cloud/ul-4.gif');
	}

	.text1{
		text-transform: uppercase !important;
	}
	.uppercase{
		text-transform: uppercase;
	}
	.underline{
		text-decoration: underline;
	}




	.line-1{
		border-bottom: 1px solid #B2D0FF;

	}
	.line-2{
		border-bottom: 2px solid #f6c46a;
	}
	.line-3{
		border-top: 4px solid #ec1762;
	}
	.line-4{
		border-top: 4px solid #ec1762;
	}

	.bold{
		font-weight: bold;
	}



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
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.hide3{
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.hide4{
		display: -webkit-box;
		-webkit-line-clamp: 4;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.bg-main{
		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #ed622b);
		background: -o-linear-gradient(#675a32, #ed622b);
		background: -moz-linear-gradient(#675a32, #ed622b);
		background: linear-gradient(#675a32, #ed622b);
	}
	.bg-red{
		background-color: red !important;
	}
	.bg-white{
		background-color: white !important;
	}
	.bg-black{
		background-color: #333 !important;
	}
	.bg-gold{
		background-color: #384da0 !important;
	}
	.bg-loft{
		background: #3d3d3f;
		background: -webkit-linear-gradient(#3d3d3f, #6f6f77);
		background: -o-linear-gradient(#3d3d3f, #6f6f77);
		background: -moz-linear-gradient(#3d3d3f, #6f6f77);
		background: linear-gradient(#3d3d3f, #6f6f77);
	}


	.text-red  ,.text-red * {
		color: red !important;
	}
	.text-white ,.text-white *,.text-white p{
		color: white !important;
	}
	.text-black  ,.text-black * {
		color: #333 !important;
	}
	.text-gold  ,.text-gold * {
		color: #DAA520 !important;
	}
	.text-pink  ,.text-pink * {
		color: #c08782 !important;
	}

	hr{
		margin-bottom: 10px;
		margin-top: 5px;
	}

	.color1{
		color: #675a32 !important;
	}
	.bg1{
		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);
	}
	.border1{
		border : 1px solid #675a32 !important;
	}
	.border1-bottom{
		border-bottom:  1px solid #675a32 !important;
	}
	.border1-top{
		border-top:  1px solid #675a32 !important;
	}
	.hr1{
		border: none;
		height: 1px;
		color: #675a32;
		background-color: #675a32;
	}
	


	.color2{
		color: #635e8a !important;
	}
	.bg2{
		background-color: #635e8a !important;
	}
	.border2{
		border : 1px solid #635e8a !important;
	}
	.border2-bottom{
		border-bottom:  1px solid #635e8a !important;
	}
	.border2-top{
		border-top:  1px solid #635e8a !important;
	}
	.hr2{
		border: none;
		height: 1px;
		color: #635e8a;
		background-color: #635e8a;
	}


	.color3{
		color: #5e5f61 !important;
	}
	.bg3{
		background-color: #5e5f61 !important;
	}
	.border3{
		border : 1px solid #5e5f61 !important;
	}
	.border3-bottom{
		border-bottom:  1px solid #5e5f61 !important;
	}
	.border3-top{
		border-top:  1px solid #5e5f61 !important;
	}
	.hr3{
		border: none;
		height: 1px;
		color: #5e5f61;
		background-color: #5e5f61;
	}





	.breadcrumb  {
		background-color: inherit;
	}
	.breadcrumb  a{
		color: #4b3d31;
	}
	a{
		text-decoration: none !important;
	}



	p{
		animation: ani-zoomIn 1s !important;
	}
	/*-----------------------text-----------------------*/ 


	/*---------------------shadow-------------------------*/

	.no-radius{
		border-radius: 0px !important;
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
	.no-boxsha{
		box-shadow: none;
	}
	.boxsha{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		transition: all 0.3s;
	}
	.boxsha:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.boxsha2{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}
	.boxsha3:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
	.boxsha4:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
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
	.boxsha7:hover{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}

	/*---------------------shadow-------------------------*/


	/*---------------------button-------------------------*/

	.btn{
		font-weight: normal !important;
		transition: all 0.3s;
	}

	.btn-main {
		color: white;

		background-color: #675a32;
		border-color: #675a32;
		font-weight: bold;

		background: #675a32;
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);
	}
	.btn-main:hover{
		color: white;
		background: white;
		border-color: #675a32;
		font-weight: bold;
		background: #d4ca87;
		background: -webkit-linear-gradient(#d4ca87, #675a32);
		background: -o-linear-gradient(#d4ca87, #675a32);
		background: -moz-linear-gradient(#d4ca87, #675a32);
		background: linear-gradient(#d4ca87, #675a32);
	}

	.btn-main-outline {
		color: #49741a;
		background: white;
		border:1px solid #49741a;
		font-weight: bold;
	}
	.btn-main-outline:hover{
		color: white;
		background: #49741a;
		border:1px solid #49741a;
		font-weight: bold;
	}



	.link-main{
		color: black !important;
	}
	.btn-outline{
		background-color: transparent ;
		background: none ;
		color: inherit ;
		transition: all .5s ;
	}
	.btn-primary.btn-outline {
		color: #428bca;
	}
	.btn-success.btn-outline {
		color: #5cb85c;
	}
	.btn-info.btn-outline {
		color: #5bc0de;
	}
	.btn-warning.btn-outline {
		color: #f0ad4e;
	}
	.btn-danger.btn-outline {
		color: #d9534f;
	}
	.btn-default.btn-outline {
		color: white;
		border: 1px solid white;
	}
	.btn-primary.btn-outline:hover,
	.btn-success.btn-outline:hover,
	.btn-info.btn-outline:hover,
	.btn-warning.btn-outline:hover,
	.btn-default.btn-outline:hover,
	.btn-danger.btn-outline:hover {
		color: #fff;
	}
	.btn:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}


	.dropdown-submenu {
		position: relative;
	}
	.dropdown-submenu  #dropdown-menu  {
		position: absolute;
		top: 100%;
		left: 0;
		z-index: 1000;
		display: none;
		float: left;
		min-width: 160px;
		padding: 5px 0;
		margin: 2px 0 0;
		font-size: 14px;
		text-align: left;
		list-style: none;
		background-color: #fff;
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		border: 1px solid #ccc;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		top: 0;
		left: 100%;
		margin-top: -1px;
		width: auto;
	}
	.dropdown-submenu  a{
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: 400;
		line-height: 1.42857143;
		color: #333;
		white-space: nowrap;
	}
	.dropdown-submenu {
		position: relative;
	}

	.dropdown-submenu .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
	}

	.dropdown-phone {
		position: relative;
	}
	.dropdown-phone .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
	}





	.form-horizontal .control-label.text-left{
		text-align: left;
		font-weight: normal;
	}
	input[type=text] ,input[type=number],input[type=email],input[type=password] , .btn ,button, input, optgroup, select, textarea{
		box-shadow: none !important;
	}


	.pagination>li:first-child>a, .pagination>li:first-child>span {
		border-radius: 0px !important;
	}
	.pagination>li:last-child>a, .pagination>li:last-child>span {
		border-radius: 0px !important;
	}
	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
		z-index: 3;
		color: #1e1e1e;
		cursor: default;
		background-color: white;
		border-color: #1e1e1e;
	}
	.pagination>li>a, .pagination>li>span {
		color: #1e1e1e;
	}


	.ani-shake {
		animation: ani-shake 1s !important;
		animation-iteration-count: 5 !important;
	}
	@keyframes ani-shake {
		10%, 90% {
			transform: translate3d(-1px, 0, 0);
		}

		20%, 80% {
			transform: translate3d(2px, 0, 0);
		}

		30%, 50%, 70% {
			transform: translate3d(-4px, 0, 0);
		}

		40%, 60% {
			transform: translate3d(4px, 0, 0);
		}
	}


	.ani-bounce {
		animation: ani-bounce 1s !important;
		animation-iteration-count: 5 !important;
	}

	@-webkit-keyframes ani-bounce {
		from,
		20%,
		53%,
		80%,
		to {
			-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}

		40%,
		43% {
			-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			-webkit-transform: translate3d(0, -5px, 0);
			transform: translate3d(0, -5px, 0);
		}

		70% {
			-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			-webkit-transform: translate3d(0, -2px, 0);
			transform: translate3d(0, -2px, 0);
		}

		90% {
			-webkit-transform: translate3d(0, -1px, 0);
			transform: translate3d(0, -1px, 0);
		}
	}



	@-webkit-keyframes ani-bounceIn {
		from,
		20%,
		40%,
		60%,
		80%,
		to {
			-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}

		0% {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		20% {
			-webkit-transform: scale3d(1.1, 1.1, 1.1);
			transform: scale3d(1.1, 1.1, 1.1);
		}

		40% {
			-webkit-transform: scale3d(0.9, 0.9, 0.9);
			transform: scale3d(0.9, 0.9, 0.9);
		}

		60% {
			opacity: 1;
			-webkit-transform: scale3d(1.03, 1.03, 1.03);
			transform: scale3d(1.03, 1.03, 1.03);
		}

		80% {
			-webkit-transform: scale3d(0.97, 0.97, 0.97);
			transform: scale3d(0.97, 0.97, 0.97);
		}

		to {
			opacity: 1;
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
		}
	}

	@-webkit-keyframes ani-zoomIn {
		from {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		50% {
			opacity: 1;
		}
	}

	@keyframes ani-zoomIn {
		from {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		50% {
			opacity: 1;
		}
	}

	.ani-zoomIn {
		-webkit-animation-name: ani-zoomIn;
		animation-name: ani-zoomIn;
	}
	/*---------------------button-------------------------*/


	/*---------------------loop-------------------------*/

	.imag-16-9 {
		position: relative;
		padding-bottom: 56.2%;
	}

	.imag-16-9 img {
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
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
	for ($size=10; $size <= 50; $size++) { 
		$textsize = "size".$size;
		?>
		@media (max-width: 991px) {
			.resize  .<? echo $textsize; ?> {
				font-size: <? echo $size*0.8; ?>px !important;
				line-height:  <? echo $size*1.5; ?>px !important;
			}
		}
		<?
	}
	for ($img=200; $img >=10; $img=$img-1) { 
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
		.<? echo $textimg; ?> iframe{
			position: absolute !important;
			object-fit: cover !important;
			width: 100% !important;
			height: 100% !important;
		}
		<?
	}
	
	for ($imgout=200; $imgout >=10; $imgout=$imgout-1) { 
		$textimgout = "imgout".$imgout;
		?>
		.<? echo $textimgout; ?>{
			position: relative !important;
			padding-bottom: <? echo $imgout; ?>% !important;
			border-radius: 0px !important; 
		}
		.<? echo $textimgout; ?> img{
			position: absolute !important;
			object-fit: contain !important;
			width: 100% !important;
			height: 100% !important;
		}
		.<? echo $textimgout; ?> iframe{
			position: absolute !important;
			object-fit: contain !important;
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
	for ($between=3; $between <= 30; $between++) { 
		$textbetween = "between".$between;
		?>
		.<? echo $textbetween; ?>{
			padding-top: <? echo $between; ?>px !important;
			<? $betweenbottom=$between-3; ?>
			padding-bottom: <? echo $betweenbottom; ?>px !important;
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
	for ($radius=10; $radius <= 50; $radius++) { 
		$textradius = "radius".$radius;
		?>
		.<? echo $textradius; ?>{
			border-radius: <? echo $radius; ?>px !important;
		}
		<?
	}
	for ($radiustop=10; $radiustop <= 50; $radiustop++) { 
		$textradius = "radiustop".$radiustop;
		?>
		.<? echo $textradius; ?>{
			border-top-right-radius: <? echo $radiustop; ?>px !important;
			border-top-left-radius: <? echo $radiustop; ?>px !important;
		}
		<?
	}
	for ($radiusbottom=10; $radiusbottom <= 50; $radiusbottom++) { 
		$textradius = "radiusbottom".$radiusbottom;
		?>
		.<? echo $textradius; ?>{
			border-bottom-right-radius: <? echo $radiusbottom; ?>px !important;
			border-bottom-left-radius: <? echo $radiusbottom; ?>px !important;
		}
		<?
	}
	?>

	/*---------------------loop-------------------------*/


	/*---------------------img-------------------------*/

	@media (min-width:1200px){
		#slides-img{
			width: 100%;
			object-fit: cover;
		}
	}
	@media (max-width:1201px){
		#slides-img{
			width: 100%;
		}
	}

	.full{
		width: 100%;
	}
	.fit{
		object-fit: cover;
		width: 100%;
	}
	.carousel-control.left, .carousel-control.right {
		background-image:none !important;
		filter:none !important;
	}
	.carousel-control{
		width: 5%;
	}
	.carousel-inner .item img,.carousel-inner > .item > a > img {
		width: 100%;
	}


	.hov-pointer:hover {cursor: pointer;}
	.hov-img-zoom {
		display: block;
		overflow: hidden;
	}
	.hov-img-zoom img{
		width: 100%;
		-webkit-transition: all 0.6s;
		-o-transition: all 0.6s;
		-moz-transition: all 0.6s;
		transition: all 0.6s;
	}
	.hov-img-zoom:hover img {
		-webkit-transform: scale(1.1);
		-moz-transform: scale(1.1);
		-ms-transform: scale(1.1);
		-o-transform: scale(1.1);
		transform: scale(1.1);
	}



	.img-responsive{
		margin: auto;
	}
	.wrapper100c {
		position: relative;
		padding-bottom: 100%;
		border-radius: 100%;
		border: 1px solid #8b0304;
	}
	.wrapper100c img {
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
	}
	.swiper-container {
		width: 100%;
		height: 100%;
	}
	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

	.Review img{
		height: auto !important;
		max-width: 100% !important;;
	}
	.Review iframe{
		max-width: 847px !important;
		height: auto !important;
		width: 100% !important;;

	}
	.Review{
		overflow: hidden !important; 
	}
	.review{
		overflow: hidden !important; 
	}

	.review img{
		max-width: 100% !important;
		height: auto !important;
	}
	.review table{
		max-width: 100% !important;
		height: auto !important;

		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}
	.review p{
		font-family: 'Noto Sans Thai','Roboto', sans-serif;
	}
	.review iframe{
		width: 100% !important;

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
		max-width: 800px;
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
		max-width: 600px;
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

	.hovereffect {
		width: 100%;
		height: 100%;
		float: left;
		overflow: hidden;
		position: relative;
		text-align: center;
		cursor: default;
	}

	.hovereffect .overlay {
		width: 100%;
		height: 100%;
		position: absolute;
		overflow: hidden;
		top: 0;
		left: 0;
		/* background-color: rgba(75,75,75,0.7);*/
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		padding: 10px;
	}

	.hovereffect:hover .overlay {
		background-color: rgba(48, 152, 157, 0.4);
	}

	.hovereffect img {
		display: block;
		position: relative;
	}

	.hovereffect h2 {
		margin-top: 30%;
		text-transform: uppercase;
		color: #fff;
		text-align: center;
		position: relative;
		font-size: 40px;
		padding: 10px;
		background: rgba(0, 0, 0, 0.6);
		-webkit-transform: translateY(45px);
		-ms-transform: translateY(45px);
		transform: translateY(45px);
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
	}

	.hovereffect:hover h2 {
		-webkit-transform: translateY(5px);
		-ms-transform: translateY(5px);
		transform: translateY(5px);
	}

	.hovereffect a.inhovereff {
		display: inline-block;
		text-decoration: none;
		padding: 7px 14px;
		text-transform: uppercase;
		color: #fff;
		border: 1px solid #fff;
		background-color: transparent;
		opacity: 0;
		filter: alpha(opacity=0);
		-webkit-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		font-weight: normal;
		margin: 10px 0 0 0;
		padding: 62px 100px;
		font-size: 20px;

	}

	.hovereffect:hover a.inhovereff {
		opacity: 1;
		filter: alpha(opacity=100);
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}

	.hovereffect a.inhovereff:hover {
		box-shadow: 0 0 5px #fff;
	}




	.ver1-image {
		opacity: 1;
		display: block;
		width: 100%;
		height: auto;
		transition: .5s ease;
		backface-visibility: hidden;
	}

	.ver1-middle {
		transition: .5s ease;
		opacity: 0;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}

	.ver1-container:hover .ver1-image {
		opacity: 0.2;
	}

	.ver1-container:hover .ver1-middle {
		opacity: 1;
	}

	.ver1-text {
		color: black;
		font-size: 25px;
		padding: 8px 16px;
	}


	/*---------------------img-------------------------*/


	/*---------------------other-------------------------*/



	#chat{
		right: 20px;
		position: fixed;
		bottom: 50px; 
		cursor: pointer; 
		z-index: 99;
		opacity: 0.8;
		filter: alpha(opacity=8);
	}
	.Footer{
		background: #635e8a;
	}
	.Footer, .Footer a{
		color: white !important;
		transition: color 0.2s ease 0s
	}
	.Footer p,.Footer li{
		margin-bottom: 20px !important;
		line-height: 20px !important;
	}

	.Footer2{
		background: -webkit-linear-gradient(#675a32, #d4ca87);
		background: -o-linear-gradient(#675a32, #d4ca87);
		background: -moz-linear-gradient(#675a32, #d4ca87);
		background: linear-gradient(#675a32, #d4ca87);
	}
	.Footer2, .Footer2 a{
		color: white !important;
		transition: color 0.2s ease 0s
	}
	.Footer2 p,.Footer2 li{
		line-height: 20px !important;
	}





	.GoogleMaps iframe{
		width: 100% !important;
		height: 400px  !important;
	}
	.tinted {
		opacity: 1;
		filter: brightness(85%);
	}


	.mega-dropdown {
		position: static !important;
	}
	.mega-dropdown-menu {
		padding: 20px 0px;
		width: 100%;
		box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.mega-dropdown-menu > li > ul {
		padding: 0;
		margin: 0;
	}
	.mega-dropdown-menu > li > ul > li {
		list-style: none;
	}
	.mega-dropdown-menu > li > ul > li > a {
		display: block;
		color: #222;
		padding: 3px 5px;
		font-size: 20px;
	}
	.mega-dropdown-menu > li ul > li > a:hover,
	.mega-dropdown-menu > li ul > li > a:focus {
		text-decoration: none;
	}
	.mega-dropdown-menu .dropdown-header {
		font-size: 18px;
		color: #d26e4b;
		padding: 5px 60px 5px 5px;
		line-height: 30px;
	}

	.mega-dropdown-menu .dropdown-header a{
		color: #d26e4b;
	}


	.col-centered{
		float: none;
		margin: 0 auto;
	}

	

	/*---------*/

	/* carousel box*/
	.media-carousel 
	{
		margin-bottom: 0;
		padding: 0 40px 30px 40px;
		margin-top: 30px;
	}
	.media-carousel .carousel-control.left 
	{
		left: -12px;
		background-image: none;
		background: none repeat scroll 0 0 #222222;
		border: 4px solid #FFFFFF;
		border-radius: 23px 23px 23px 23px;
		height: 40px;
		width : 40px;
		margin-top: 10%;
	}
	.media-carousel .carousel-control.right 
	{
		right: -12px !important;
		background-image: none;
		background: none repeat scroll 0 0 #222222;
		border: 4px solid #FFFFFF;
		border-radius: 23px 23px 23px 23px;
		height: 40px;
		width : 40px;
		margin-top: 10%;
	}
	.media-carousel .carousel-indicators 
	{
		right: 50%;
		top: auto;
		bottom: 0px;
		margin-right: -19px;
	}
	.media-carousel .carousel-indicators li 
	{
		background: #c0c0c0;
	}
	.media-carousel .carousel-indicators .active 
	{
		background: #333333;
	}

	/* carousel box*/

	/*---------------------*/
	.goog-te-gadget {
		font-size: 0px !important;
	} 
	.goog-te-combo {
		padding: 10px !important;
		font-size: 17px !important;
		width: 100%;
	} 
	.goog-logo-link{
		display: none !important;
	}
	/*---------------------*/

	

	#product_page .pagination > li > a,#product_page .pagination > li > span {
		position: relative;
		float: left;
		padding: 5px 11px;
		margin-left: -1px;
		line-height: 1.42857143;
		color: #337ab7;
		text-decoration: none;
		background-color: #fff;
		border: 1px solid #ddd;
		font-size: 13px;
	}

</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.js"></script>

<script type="text/javascript">
	function goBack() {
		window.history.back();
	}
	$(document).ready(function(){
		$(".container").click(function(){
			$("#myNavbar").collapse('hide');
		});
	});


	$(document).ready(function(){
		$(".dropauto").hover(            
			function() {
				$('.open-dropauto', this).not('.in .open-dropauto').stop(true,true).slideDown("0");
				$(this).toggleClass('open');        
			},
			function() {
				$('.open-dropauto', this).not('.in .open-dropauto').stop(true,true).slideUp("0");
				$(this).toggleClass('open');       
			}
			);
	});

	$(document).ready(function(){
		$(".dropauto2").hover(            
			function() {
				$('.open-dropauto2', this).not('.in .open-dropauto2').stop(true,true).slideDown("0");
				$(this).toggleClass('open');        
			},
			function() {
				$('.open-dropauto2', this).not('.in .open-dropauto2').stop(true,true).slideUp("0");
				$(this).toggleClass('open');       
			}
			);
	});

	

	
</script>




<script>
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({
			pageLanguage: 'th',
			includedLanguages: 'en,zh-CN,zh-TW,th,ms,lo,my'
		}, 'google_translate_element');
	}
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<div class="modal fade" id="google_eng" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black;">Select Language</h4>
			</div>
			<div class="modal-body">
				<div  id="google_translate_element" style="padding-top: 0px;padding-bottom: 0px;"></div>
				<span style="white-space: nowrap;">

				</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>


<div id="chat">
	<div class="dropup" >
		<button class="btn btn-main btn-lg dropdown-toggle boxsha" type="button" data-toggle="dropdown">
			<span class="glyphicon glyphicon-comment"></span>
			ติดต่อสอบถาม
		</button>
		<ul class="dropdown-menu  dropdown-menu-right">
			<?
			if (isset($fixed[fixed_qrcode])&&trim($fixed[fixed_qrcode])!='') {
				?>
				<li style="padding: 20px;">
					<img width="200" src="cloud/fixed_qrcode/<?php echo $fixed[fixed_qrcode]; ?>" />
				</li>
				<?
			}
			?>
			<?
			$social_SL = " SELECT * FROM social ORDER BY social_sort ASC ";
			$social_QR 	= mysqli_query($con,$social_SL);
			while ($social 	= mysqli_fetch_array($social_QR)) {
				?>
				<li style="font-size: 18px;">
					<?
					if (isset($social[social_link])&&$social[social_link]!='') {

						if ($social[social_type]=='Tel') {
							?>
							<a  href="tel:<?php echo $social[social_link]; ?>" target="_blank"> 

								<?
								if (isset($social[social_photo])&&$social[social_photo]!='') {
									?>
									<img style="max-height:30px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
									<?
								}
								else{
									echo $social[social_type]."  :  ";
								}
								?>

								<?php echo $social[social_name]; ?>
							</a>
							<?
						}
						else{
							?>
							<a  href="http://<?php echo $social[social_link]; ?>" target="_blank"> 
								<?
								if (isset($social[social_photo])&&$social[social_photo]!='') {
									?>
									<img style="max-height:30px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
									<?
								}
								else{
									echo $social[social_type]."  :  ";
								}
								?>
								<?php echo $social[social_name]; ?>
							</a>
							<?
						}
					}
					else{
						?>
						<a> 
							<?
							if (isset($social[social_photo])&&$social[social_photo]!='') {
								?>
								<img style="max-height:30px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
								<?
							}
							else{
								echo $social[social_type]."  :  ";
							}
							?>
							<?php echo $social[social_name]; ?> 
						</a>
						<?
					}
					?>
				</li>
				<?
			}
			?>

		</ul>
	</div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-214128807-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-214128807-1');
</script>