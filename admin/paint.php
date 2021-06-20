<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=paint'; ?>">
  <div class="input-group mb-5">
    <input class="form-control" type="search" name="txtSearch" id="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo $strKeyword; ?>">
    <div class="input-group-append">
      <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
      <a class="btn btn-primary" style="float: right;" href="paint_add.php">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        เพิ่มเคาะพ่นสี
      </a>
      <br style="clear:both;" />
    </div>
  </div>
</form>
<table class="table table-striped">
  <tr>
    <th>รายละเอียด</th>
    <th>ส่วน</th>
    <th>ราคา</th>
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
  $sql = "SELECT * FROM car_painting
        WHERE pt_detail LIKE '%" . $strKeyword . "%' OR  pt_part LIKE '%" . $strKeyword . "%' 
        limit {$start} , {$perpage} ";


  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td>
          <?php echo $row["pt_detail"]; ?>
        </td>
        <td>
          <?php echo $row["pt_part"]; ?>
        </td>
        <td>
          <?php echo number_format($row["paint_price"]); ?>
        </td>
        <td>
          <a href="paint_edit.php?id=<?php echo $row["painting_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              แก้ไข
            </button>
          </a>
          <a href="paint_delete.php?id=<?php echo $row["painting_id"]; ?>" style="text-decoration: none;">
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
$sql2 = "SELECT * FROM car_painting";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin.php?use=paint&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=paint&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=paint&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>