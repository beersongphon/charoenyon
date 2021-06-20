<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=part'; ?>">
  <div class="input-group mb-5">
    <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
    <div class="input-group-append">
      <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
      <a class="btn btn-primary" style="float: right;" href="part_add.php">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        เพิ่มอะไหล่
      </a>
      <br style="clear:both;" />
    </div>
  </div>
</form>
<table class="table table-striped">
  <tr>
    <th>ชื่ออะไหล่</th>
    <th>ราคาต่อชิ้น</th>
    <th>บริษัท</th>
    <th>โมเดล</th>
    <th>ยี่ห้อ</th>
    <th>ปี</th>
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
    auto_parts.parts_id, 
            auto_parts.parts_name, 
            auto_parts.parts_price, 
            company_parts.company_name,
            car_model.model_name as model,
            car_brand.brand_name as brand,
            auto_parts.parts_year
        FROM auto_parts 
        INNER JOIN company_parts 
        ON auto_parts.company_parts_id = company_parts.company_parts_id 
        INNER JOIN car_model 
        ON auto_parts.model_id = car_model.model_id 
        INNER JOIN car_brand
        ON car_model.brand_id = car_brand.brand_id
WHERE auto_parts.parts_name LIKE '%" . $strKeyword . "%' OR  company_parts.company_name LIKE '%" . $strKeyword . "%' 
limit {$start} , {$perpage} ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td>
          <?php echo $row["parts_name"]; ?>
        </td>
        <td>
          <?php echo number_format($row["parts_price"]); ?>
        </td>
        <td>
          <?php echo $row["company_name"]; ?>
        </td>
        <td>
          <?php echo $row["model"]; ?>
        </td>
        <td>
          <?php echo $row["brand"]; ?>
        </td>
        <td>
          <?php echo $row["parts_year"]; ?>
        </td>
        <td>
          <a href="part_edit.php?id=<?php echo $row["parts_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning btn-block mb-3">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              แก้ไข
            </button>
          </a>
          <a href="part_delete.php?id=<?php echo $row["parts_id"]; ?>" style="text-decoration: none; width: 50px;">
            <button class="btn btn-outline-danger btn-block">
              <i class="fa fa-trash" aria-hidden="true"></i>
              ลบ
            </button>
          </a>
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <div class="row">
            <?php
            $sql = "SELECT * FROM img_parts WHERE parts_id = " . $row['parts_id'];
            $image = $conn->query($sql);
            while ($image_item = $image->fetch_assoc()) {
            ?>
              <img class="col-2" src="./upload/<?php echo $image_item["Img"]; ?>" style="height: 150px;">
            <?php
            }
            ?>
          </div>
        </td>
      </tr>
  <?php
    }
  }
  ?>
</table>
<?php
$sql2 = "SELECT * FROM auto_parts";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin.php?use=part&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=part&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=part&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>