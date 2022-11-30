<?

session_start();
$hostname = "localhost";
$username = "food_N309";
$password = "@N309@N309";
$database = "food_N309";
$con = mysqli_connect($hostname , $username , $password , $database);

if (mysqli_connect_error()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
	mysqli_query($con,"SET NAMES UTF8");
}
$mysqli = new mysqli($hostname, $username, $password, $database);

$fixed_SL = " SELECT * FROM fixed";
$fixed_QR 	= mysqli_query($con,$fixed_SL);
$fixed 	= mysqli_fetch_array($fixed_QR);

?>

