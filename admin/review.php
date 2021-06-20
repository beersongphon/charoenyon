<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=review'; ?>">
  <div class="input-group mb-5">
    <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
    <div class="input-group-append">
      <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
      <a class="btn btn-primary" style="float: right;" href="review_add.php">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        เพิ่มผลงาน
      </a>
      <br style="clear:both;" />
    </div>
  </div>
</form>
<table class="table table-striped">
  <tr>
    <th>ป้ายทะเบียน</th>
    <th>รูปภาพ</th>
    <th>ผู้เพิ่มข้อมูล</th>
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
                review.review_id,
                car.car_registration,
                user.user
            FROM review
            INNER JOIN car_repir
            ON review.repair_id = car_repir.repair_id
            INNER JOIN car
            ON car_repir.vin = car.vin
            INNER JOIN user
            ON review.user_id = user.user_id
            WHERE car.car_registration LIKE '%" . $strKeyword . "%'
            limit {$start} , {$perpage} 
            ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td style="width: 120px;">
          <?php echo $row['car_registration']; ?>
        </td>
        <td>
          <div class="row">
            <?php
            $sql = "SELECT * FROM img_review WHERE review_id = " . $row['review_id'];
            $ImageResult = $conn->query($sql);
            while ($image = $ImageResult->fetch_assoc()) {
            ?>
              <img src="./upload/<?php echo $image["Img_review"]; ?>" class="col-3" style="height: 150px;">
            <?php
            }
            ?>
          </div>
        </td>
        <td style="width: 120px;">
          <?php echo $row['user']; ?>
        </td>
        <td>
          <a href="review_edit.php?id=<?php echo $row["review_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning mb-2 btn-block">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              แก้ไข
            </button>
          </a>
          <a href="review_delete.php?id=<?php echo $row["review_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-danger mb-2 btn-block">
              <i class="fa fa-trash" aria-hidden="true"></i>
              ลบ
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
$sql2 = "SELECT * FROM review";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin.php?use=review&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=review&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=review&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>