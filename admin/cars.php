<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=car'; ?>">
  <div class="input-group mb-5">
    <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
    <div class="input-group-append">
      <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
      <a class="btn btn-primary" style="float: right;" href="car_add.php">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        เพิ่มรถยนต์
      </a>
      <br style="clear:both;" />
    </div>
  </div>
</form>
<table class="table table-striped">
  <tr>
    <th>รหัสตัวถัง</th>
    <th>ยี่ห้อ</th>
    <th>โมเดล</th>
    <th>ปี</th>
    <th>สี</th>
    <th>ประเภท</th>
    <th>ทะเบียน</th>
    <th>ชื่อเจ้าของ</th>
    <th>เบอร์ติดต่อ</th>
    <th>สถานะ</th>
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
                car.vin,
                car.model_id,
                car.gear_id,
                gear.gear_detail,
                car.car_registration,
                car.model_year,
                car.color,
                car.car_type,
                status.status_detail as status,
                CONCAT(customer.firstname , ' ' , customer.lastname) AS customer_name,
                customer.tel,
                car_brand.brand_name,
                car_model.model_name
            FROM car
            INNER JOIN customer
            ON car.cus_id = customer.cus_id
            INNER JOIN car_model
            ON car.model_id = car_model.model_id
            INNER JOIN car_brand
            ON car_model.brand_id = car_brand.brand_id
            INNER JOIN status
            ON car.status_id = status.status_id
            INNER JOIN gear
            ON car.gear_id = gear.gear_id
            WHERE car.car_registration LIKE '%" . $strKeyword . "%' OR car_brand.brand_name LIKE '%" . $strKeyword . "%' OR car_model.model_name LIKE '%" . $strKeyword . "%' 
            OR customer.firstname LIKE '%" . $strKeyword . "%' OR customer.tel LIKE '%" . $strKeyword . "%'
            ORDER BY car.status_id ASC
            limit {$start} , {$perpage} ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td>
          <?php echo $row["vin"]; ?>
        </td>
        <td>
          <?php echo $row["brand_name"]; ?>
        </td>
        <td>
          <?php echo $row["model_name"]; ?>
        </td>
        <td>
          <?php echo $row["model_year"]; ?>
        </td>
        <td>
          <?php echo $row["color"]; ?>
        </td>
        <td>
          <?php echo $row["car_type"]; ?>
        </td>
        <td>
          <?php echo $row["car_registration"]; ?>
        </td>
        <td>
          <?php echo $row["customer_name"]; ?>
        </td>
        <td>
          <?php echo $row["tel"]; ?>
        </td>
        <td>
          <?php echo $row["status"]; ?>
        </td>
        <td>
          <a href="car_edit.php?id=<?php echo $row["vin"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              แก้ไข
            </button>
          </a>
          <a href="car_delete.php?id=<?php echo $row["vin"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-danger">
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
$sql2 = "SELECT * FROM car";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin.php?use=car&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=car&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=car&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>