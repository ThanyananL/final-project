<?
include 'index_IncludeAdmin.php';
if($_POST['admin_user']!="" && $_POST['admin_pass']!=""){
  $LoginSelect = "SELECT * FROM admin WHERE admin_user = '$_POST[admin_user]' AND admin_pass = '$_POST[admin_pass]' ";
  $LoginQuery=mysqli_query($con,$LoginSelect);
  if(mysqli_num_rows($LoginQuery)>0){
    $LoginData=mysqli_fetch_array($LoginQuery);
    $_SESSION[login_admin_id] = $LoginData[admin_id];
    echo"<script>  window.location='index.php';  </script>";
  }
  else{
    echo"<script>alert('ชื่อเข้าใช้ หรือ รหัสผ่านไม่ถูกต้อง '); window.history.back(); </script>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <? include 'index_Head.php';?>
</head>
<body>
  <div class="col-md-5 col-sm-7 col-centered" style="padding-top:10vh; height:50vh;">
    <div class="panel panel-default no-border boxsha6">
      <div class="panel-heading no-border">
        <h4><b><? echo $fixed[fixed_website]; ?></b> | admin </h4>
      </div>
      <div class="panel-body no-border">
        <form class="form-horizontal"   method="post" >
          <div class="form-group">
            <label class="control-label col-md-3 input-lg" >ชื่อเข้าใช้  </label>
            <div class="col-md-9">
              <input type="text" class="form-control input-lg" placeholder=" ชื่อเข้าใช้ / username " name="admin_user" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 input-lg" >รหัสผ่าน  </label>
            <div class="col-md-9">
              <input type="password" class="form-control input-lg" id="pwd" placeholder=" รหัสผ่าน / password " name="admin_pass" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" name="SubmitLogin" class="btn btn-primary btn-lg">
                <span class="glyphicon glyphicon-log-in"></span>
                เข้าสู่ระบบ
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
