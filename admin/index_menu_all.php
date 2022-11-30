

<div class="list-group">
  <a href="salereport.php" class="list-group-item <? if ($_SESSION['page'] =='salereport.php') { echo 'active';} ?>">
    รายงานยอดขาย
  </a>
  <a href="order_list.php" class="list-group-item <? if ($_SESSION['page'] =='order_list.php') { echo 'active';} ?>">
    รายการสั่งซื้อ
    <span class="badge"><? echo $Roworder_list; ?></span> 
    <?
    if ($row_order_list_check_notification>0) {
      ?>
      <span class="badge" style="background-color: red;"> <? echo $row_order_list_check_notification; ?>  </span>
      <?
    }
    ?>
  </a>  
  <a href="payment.php" class="list-group-item <? if ($_SESSION['page'] =='payment.php') { echo 'active';} ?>">
    แจ้งโอนเงิน
    <span class="badge"><? echo $Rowpayment; ?></span> 
    <?
    if ($row_payment_check_notification>0) {
      ?>
      <span class="badge" style="background-color: red;"> <? echo $row_payment_check_notification; ?>  </span>
      <?
    }
    ?>
  </a>
  <a href="contactus.php" class="list-group-item <? if ($_SESSION['page'] =='contactus.php') { echo 'active';} ?>">
    หน้าติดต่อเรา
    <span class="badge"><? echo $Rowcontactus; ?></span> 
    <?
    if ($row_contactus_check_notification>0) {
      ?>
      <span class="badge" style="background-color: red;"> <? echo $row_contactus_check_notification; ?>  </span>
      <?
    }
    ?>
  </a>  
</div>
<div class="list-group">
  <a href="catalog.php" class="list-group-item <? if ($_SESSION['page'] =='catalog.php') { echo 'active';} ?>">
    หมวดหมู่ <span class="badge"><? echo $Rowcatalog; ?></span>
  </a>
  <a href="product.php" class="list-group-item <? if ($_SESSION['page'] =='product.php') { echo 'active';} ?>">
    สินค้า <span class="badge"><? echo $Rowproduct; ?></span>
  </a>
  <a href="account.php" class="list-group-item <? if ($_SESSION['page'] =='account.php') { echo 'active';} ?>">
    บัญชีธนาคาร <span class="badge"><? echo $Rowaccount; ?></span>
  </a>
  <a href="portage.php" class="list-group-item <? if ($_SESSION['page'] =='portage.php') { echo 'active';} ?>">
    การจัดส่ง ราคาน้ำหนัก <span class="badge"><? echo $Rowportage; ?></span>
  </a> 
</div>
<div class="list-group">
  <a href="web_admin.php" class="list-group-item <? if ($_SESSION['page'] =='web_admin.php') { echo 'active';} ?>">
    ข้อมูลแอดมิน 
  </a>
  <a href="member.php" class="list-group-item <? if ($_SESSION['page'] =='member.php') { echo 'active';} ?>">
    สมาชิก <span class="badge"><? echo $Rowmember; ?></span>
  </a>
</div>
<div class="list-group">
  <a href="fixed.php" class="list-group-item <? if ($_SESSION['page'] =='fixed.php') { echo 'active';} ?>">
    ข้อมูลเว็บไซต์เบื้องต้น
  </a>
  <a href="slides.php" class="list-group-item <? if ($_SESSION['page'] =='slides.php') { echo 'active';} ?>">
    สไลด์ แบนเนอร์ (Banner) <span class="badge"><? echo $Rowslides; ?></span>
  </a>
  <a href="home.php" class="list-group-item <? if ($_SESSION['page'] =='home.php') { echo 'active';} ?>">
    รายละเอียดแนะนำหน้าแรก
  </a>
  <a href="tagfooter.php" class="list-group-item <? if ($_SESSION['page'] =='tagfooter.php') { echo 'active';} ?>">
    ข้อความมุมล่างเว็บไซต์ 
  </a>
</div>
<div class="list-group">
  <a href="social.php" class="list-group-item <? if ($_SESSION['page'] =='social.php') { echo 'active';} ?>">
    <span> ติดต่อสอบถาม</span>
    <span class="badge"><? echo $Rowsocial; ?></span>
  </a>
  <a href="article.php" class="list-group-item <? if ($_SESSION['page'] =='article.php') { echo 'active';} ?>">
    บทความ <span class="badge"><? echo $Rowarticle; ?></span>
  </a>
  <a href="howtoorder.php" class="list-group-item <? if ($_SESSION['page'] =='howtoorder.php') { echo 'active';} ?>">
    หน้าวิธีการสั่งซื้อ 
  </a>

  <a href="aboutus.php" class="list-group-item <? if ($_SESSION['page'] =='aboutus.php') { echo 'active';} ?>">
    เกี่ยวกับเรา 
  </a>
  <a href="store_photos.php" class="list-group-item <? if ($_SESSION['page'] =='store_photos.php') { echo 'active';} ?>">
    <span> ฝากรูปภาพ </span>
    <span class="badge"><? echo $Rowstore_photos; ?></span>
  </a>
</div>
<div class="list-group">
  <a href="Statistic.php" class="list-group-item <? if ($_SESSION['page'] =='Statistic.php') { echo 'active';} ?>">
    สถิติการเข้าชม
  </a>
</div>
