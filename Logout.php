<?php
session_start();
unset($_SESSION[member_online_id]);
echo"<script>alert('ออกจากระบบเรียบร้อยแล้ว'); </script>";
header("Location:index.php");
?>
