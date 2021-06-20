<div class="mb-5">
  <a href="wage_add.php">
    <button class="btn btn-primary" style="float: right;">
      <i class="fa fa-plus-circle" aria-hidden="true"></i>
      เพิ่มค่าแรง
    </button>
  </a>
  <br style="clear:both;" />
</div>
<table class="table table-striped">
  <tr>
    <th>รายละเอียด</th>
    <th>ค่าแรง</th>
    <th>...</th>
  </tr>
  <?php
  include('../connection/connection.php');
  $sql = "SELECT * FROM wage";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td><?php echo $row['wage_detail']; ?></td>
        <td><?php echo $row['wage_price']; ?></td>
        <td>
          <a href="wage_edit.php?id=<?php echo $row["wage_id"]; ?>" style="text-decoration: none;">
            <button class="btn btn-outline-warning">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              แก้ไข
            </button>
          </a>
          <a href="wage_delete.php?id=<?php echo $row["wage_id"]; ?>" style="text-decoration: none;">
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