<ul class="pagination" style="margin: 0px;padding-bottom: 0px;">
	<?
	if ($Num_pages!=1) {
		if($Prev_page){
			$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Prev_page";
			if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
				$page_Echo .= "&catalog_id=$_GET[catalog_id]"; 
			}
			if (isset($_GET[sorting])&&trim($_GET[sorting])!='') {
				$page_Echo .= "&sorting=$_GET[sorting]"; 
			}
			if (isset($_GET[mode])&&trim($_GET[mode])!='') {
				$page_Echo .= "&mode=$_GET[mode]"; 
			}
			if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
				$page_Echo .= "&keyword=$_GET[keyword]"; 
			}
			if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
				$page_Echo .= "&collection_id=$_GET[collection_id]"; 
			}
			$page_Echo .=" '>        <        </a></li> ";
			echo $page_Echo;

		}
		else{
			echo "  "; 
		}
		if ($Num_Rows>=1) {

			$i=$page-1;
			if ($i>0) {
				$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
				if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
					$page_Echo .= "&catalog_id=$_GET[catalog_id]"; 
				}
				if (isset($_GET[sorting])&&trim($_GET[sorting])!='') {
					$page_Echo .= "&sorting=$_GET[sorting]"; 
				}
				if (isset($_GET[mode])&&trim($_GET[mode])!='') {
					$page_Echo .= "&mode=$_GET[mode]"; 
				}
				if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
					$page_Echo .= "&keyword=$_GET[keyword]"; 
				}
				if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
					$page_Echo .= "&collection_id=$_GET[collection_id]"; 
				}
				$page_Echo .=" '>$i</a></li> ";
				echo $page_Echo;
			}


			$_SESSION[page] = $page;
			echo "<li class='active'><a>$page</a></li>";

			if($page!=$Num_pages){
				$i=$page+1;
				$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
				if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
					$page_Echo .= "&catalog_id=$_GET[catalog_id]"; 
				}
				if (isset($_GET[sorting])&&trim($_GET[sorting])!='') {
					$page_Echo .= "&sorting=$_GET[sorting]"; 
				}
				if (isset($_GET[mode])&&trim($_GET[mode])!='') {
					$page_Echo .= "&mode=$_GET[mode]"; 
				}
				if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
					$page_Echo .= "&keyword=$_GET[keyword]"; 
				}
				if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
					$page_Echo .= "&collection_id=$_GET[collection_id]"; 
				}
				$page_Echo .=" '>$i</a></li> ";
				echo $page_Echo;
			}

		}
		if($page!=$Num_pages){
			$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Next_page";
			if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
				$page_Echo .= "&catalog_id=$_GET[catalog_id]"; 
			}
			if (isset($_GET[sorting])&&trim($_GET[sorting])!='') {
				$page_Echo .= "&sorting=$_GET[sorting]"; 
			}
			if (isset($_GET[mode])&&trim($_GET[mode])!='') {
				$page_Echo .= "&mode=$_GET[mode]"; 
			}
			if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
				$page_Echo .= "&keyword=$_GET[keyword]"; 
			}
			if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
				$page_Echo .= "&collection_id=$_GET[collection_id]"; 
			}
			$page_Echo .=" '>       >        </a></li> ";
			echo $page_Echo;

		}
		else{

		}
	}
	?>
</ul>