<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=fix'; ?>">
  <div class="input-group mb-5">
    <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
    <div class="input-group-append">
      <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
      <br style="clear:both;" />
    </div>
  </div>
</form>
<table class="table table-striped">
  <tr>
    <th>ป้ายทะเบียน</th>
    <th>ก่อน</th>
    <th>หลัง</th>
    <th>...</th>
  </tr>
  <?php

  $perpage = 5;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start = ($page - 1) * $perpage;

  $sql = "SELECT
                car_repir.repair_id,
                car.car_registration,
                car_repir.date_repir
            FROM car_repir
            INNER JOIN car
            ON car_repir.vin = car.vin
            WHERE car.car_registration LIKE '%" . $strKeyword . "%'
            limit {$start} , {$perpage} 
            ";



  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td>
          <?php echo $row['car_registration'], ' วันที่ ', $row['date_repir']; ?>
        </td>
        <td>
          <div class="row">
            <?php
            $sql = "SELECT * FROM img_repair WHERE repair_id = " . $row['repair_id'] . " AND type_img = 0";
            $ImageResult = $conn->query($sql);
            while ($image = $ImageResult->fetch_assoc()) {
            ?>
              <img src="./upload/<?php echo $image["Img_detail"]; ?>" class="col-4" style="width: 200px;">
            <?php
            }
            ?>
          </div>
        </td>
        <td>
          <div class="row">
            <?php
            $sql = "SELECT * FROM img_repair WHERE repair_id = " . $row['repair_id'] . " AND type_img = 1";
            $ImageResult = $conn->query($sql);
            while ($image = $ImageResult->fetch_assoc()) {
            ?>
              <img src="./upload/<?php echo $image["Img_detail"]; ?>" class="col-4" style="width: 200px;">
            <?php
            }
            ?>
          </div>
        </td>
        <td>
          <a href="fix_edit.php?id=<?php echo $row["repair_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              เพิ่มรูป
            </button>
          </a>
        </td>
      </tr>
  <?php
    }
  }
  ?>
</table>
<?php
$sql2 = "SELECT * FROM car_repir";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin.php?use=fix&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=fix&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=fix&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>