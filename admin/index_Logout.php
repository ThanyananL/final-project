<?php
session_start();
unset($_SESSION[login_admin_id]);
header("Location:index_Login.php");
?>
