<?php
if(!isset($_SESSION['login_admin_id']) || $_SESSION['login_admin_id']==""){
  echo"<script> window.location='index_Login.php'; </script>";
}
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand " href="index.php" style="color: black;"> <b> <? echo $fixed[fixed_website]; ?> </b> | admin </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right visible-xs visible-sm" style="padding: 5px;">
        <?php include 'index_menu_all.php'; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a style="color: black;" href="../" target="_blank">
            <span class="glyphicon glyphicon-home"></span> เข้าสู่เว็บไซต์หลัก 
          </a>
        </li>
        <li>
          <a style="color: black;" href="index_Logout.php">
            <span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>