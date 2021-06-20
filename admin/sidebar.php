<div class="list-group">
  <h4>ข้อมูลเบื้องต้น</h4>
  <a href="admin.php?use=customer" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'customer') echo 'active'; ?>">
    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
    ลูกค้า
  </a>
  <a href="admin.php?use=car" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'car') echo 'active'; ?>">
    <i class="fa fa-car" aria-hidden="true"></i>
    รถยนต์
  </a>
  <a href="admin.php?use=part" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'part') echo 'active'; ?>">
    <i class="fa fa-cogs" aria-hidden="true"></i>
    อะไหล่
  </a>
  <a href="admin.php?use=paint" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'paint') echo 'active'; ?>">
    <i class="fa fa-paint-brush" aria-hidden="true"></i>
    เคาะพ่นสี
  </a>
  <a href="admin.php?use=insurance" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'insurance') echo 'active'; ?>">
    <i class="fa fa-handshake-o" aria-hidden="true"></i>
    ประกัน
  </a>
  <h4 class="mt-3">รายงาน</h4>
  <a href="admin.php?use=create_report" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'create_report') echo 'active'; ?>">
    <i class="fa fa-pencil" aria-hidden="true"></i>
    การซ่อมรถยนต์
  </a>
  <a href="admin.php?use=report" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'report') echo 'active'; ?>">
    <i class="fa fa-file" aria-hidden="true"></i>
    รายงาน
  </a>
  <h4 class="mt-3">รูปภาพ</h4>
  <a href="admin.php?use=review" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'review') echo 'active'; ?>">
    <i class="fa fa-star" aria-hidden="true"></i>
    ผลงาน
  </a>
  <a href="admin.php?use=fix" class="list-group-item list-group-item-action <?php if ($_GET['use'] == 'fix') echo 'active'; ?>">
    <i class="fa fa-camera" aria-hidden="true"></i>
    รูปภาพก่อนซ่อม-หลังซ่อม
  </a>
</div>