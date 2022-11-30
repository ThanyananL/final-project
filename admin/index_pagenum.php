
<ul class="pagination">
<?
if ($Num_pages!=1) {
if($Prev_page){
$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Prev_page";
if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
$page_Echo .= "&plot_name=$_GET[plot_name]"; 
}
if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
}
if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
$page_Echo .= "&keyword=$_GET[keyword]"; 
}
if (isset($_GET[brand_name])&&trim($_GET[brand_name])!='') {
$page_Echo .= "&brand_name=$_GET[brand_name]"; 
}
if (isset($_GET[order_list_status])&&trim($_GET[order_list_status])!='') {
$page_Echo .= "&order_list_status=$_GET[order_list_status]"; 
}
if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
$page_Echo .= "&collection_id=$_GET[collection_id]"; 
}
if (isset($_GET[ProductFloors])&&trim($_GET[ProductFloors])!='') {
$page_Echo .= "&ProductFloors=$_GET[ProductFloors]"; 
}
if (isset($_GET[ProductParking])&&trim($_GET[ProductParking])!='') {
$page_Echo .= "&ProductParking=$_GET[ProductParking]"; 
}
if (isset($_GET[ProductKitchen])&&trim($_GET[ProductKitchen])!='') {
$page_Echo .= "&ProductKitchen=$_GET[ProductKitchen]"; 
}
if (isset($_GET[ProductWidth])&&trim($_GET[ProductWidth])!='') {
$page_Echo .= "&ProductWidth=$_GET[ProductWidth]"; 
}
if (isset($_GET[ProductDeeps])&&trim($_GET[ProductDeeps])!='') {
$page_Echo .= "&ProductDeeps=$_GET[ProductDeeps]"; 
}
$page_Echo .=" '>  กลับ </a></li> ";
echo $page_Echo;

}

else{
echo " <li class='disabled'  ><a>  กลับ </a></li> "; 
}


if ($Num_Rows>=1) {

for($i=1; $i<=$Num_pages; $i++){

if($i < $page){

$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
$page_Echo .= "&plot_name=$_GET[plot_name]"; 
}
if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
}
if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
$page_Echo .= "&keyword=$_GET[keyword]"; 
}
if (isset($_GET[brand_name])&&trim($_GET[brand_name])!='') {
$page_Echo .= "&brand_name=$_GET[brand_name]"; 
}
if (isset($_GET[order_list_status])&&trim($_GET[order_list_status])!='') {
$page_Echo .= "&order_list_status=$_GET[order_list_status]"; 
}
if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
$page_Echo .= "&collection_id=$_GET[collection_id]"; 
}
if (isset($_GET[ProductFloors])&&trim($_GET[ProductFloors])!='') {
$page_Echo .= "&ProductFloors=$_GET[ProductFloors]"; 
}
if (isset($_GET[ProductParking])&&trim($_GET[ProductParking])!='') {
$page_Echo .= "&ProductParking=$_GET[ProductParking]"; 
}
if (isset($_GET[ProductKitchen])&&trim($_GET[ProductKitchen])!='') {
$page_Echo .= "&ProductKitchen=$_GET[ProductKitchen]"; 
}
if (isset($_GET[ProductWidth])&&trim($_GET[ProductWidth])!='') {
$page_Echo .= "&ProductWidth=$_GET[ProductWidth]"; 
}
if (isset($_GET[ProductDeeps])&&trim($_GET[ProductDeeps])!='') {
$page_Echo .= "&ProductDeeps=$_GET[ProductDeeps]"; 
}
$page_Echo .=" '>$i</a></li> ";
echo $page_Echo;


}

if ($i == $page) { 
$_SESSION[page] = $page;
echo "<li class='active'><a>$i</a></li>";
}

if($i > $page)  {

$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
$page_Echo .= "&plot_name=$_GET[plot_name]"; 
}
if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
}
if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
$page_Echo .= "&keyword=$_GET[keyword]"; 
}
if (isset($_GET[brand_name])&&trim($_GET[brand_name])!='') {
$page_Echo .= "&brand_name=$_GET[brand_name]"; 
}
if (isset($_GET[order_list_status])&&trim($_GET[order_list_status])!='') {
$page_Echo .= "&order_list_status=$_GET[order_list_status]"; 
}
if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
$page_Echo .= "&collection_id=$_GET[collection_id]"; 
}
if (isset($_GET[ProductFloors])&&trim($_GET[ProductFloors])!='') {
$page_Echo .= "&ProductFloors=$_GET[ProductFloors]"; 
}
if (isset($_GET[ProductParking])&&trim($_GET[ProductParking])!='') {
$page_Echo .= "&ProductParking=$_GET[ProductParking]"; 
}
if (isset($_GET[ProductKitchen])&&trim($_GET[ProductKitchen])!='') {
$page_Echo .= "&ProductKitchen=$_GET[ProductKitchen]"; 
}
if (isset($_GET[ProductWidth])&&trim($_GET[ProductWidth])!='') {
$page_Echo .= "&ProductWidth=$_GET[ProductWidth]"; 
}
if (isset($_GET[ProductDeeps])&&trim($_GET[ProductDeeps])!='') {
$page_Echo .= "&ProductDeeps=$_GET[ProductDeeps]"; 
}
$page_Echo .=" '>$i</a></li> ";
echo $page_Echo;


}
}
}

if($page!=$Num_pages){

$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Next_page";
if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
$page_Echo .= "&plot_name=$_GET[plot_name]"; 
}
if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
}
if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
$page_Echo .= "&keyword=$_GET[keyword]"; 
}
if (isset($_GET[brand_name])&&trim($_GET[brand_name])!='') {
$page_Echo .= "&brand_name=$_GET[brand_name]"; 
}
if (isset($_GET[order_list_status])&&trim($_GET[order_list_status])!='') {
$page_Echo .= "&order_list_status=$_GET[order_list_status]"; 
}
if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
$page_Echo .= "&collection_id=$_GET[collection_id]"; 
}
if (isset($_GET[ProductFloors])&&trim($_GET[ProductFloors])!='') {
$page_Echo .= "&ProductFloors=$_GET[ProductFloors]"; 
}
if (isset($_GET[ProductParking])&&trim($_GET[ProductParking])!='') {
$page_Echo .= "&ProductParking=$_GET[ProductParking]"; 
}
if (isset($_GET[ProductKitchen])&&trim($_GET[ProductKitchen])!='') {
$page_Echo .= "&ProductKitchen=$_GET[ProductKitchen]"; 
}
if (isset($_GET[ProductWidth])&&trim($_GET[ProductWidth])!='') {
$page_Echo .= "&ProductWidth=$_GET[ProductWidth]"; 
}
if (isset($_GET[ProductDeeps])&&trim($_GET[ProductDeeps])!='') {
$page_Echo .= "&ProductDeeps=$_GET[ProductDeeps]"; 
}
$page_Echo .=" '>ถัดไป </a></li> ";
echo $page_Echo;

}
else{
echo " <li class='disabled'> <a>ถัดไป </a> </li> "; 
}
}
?>
</ul>