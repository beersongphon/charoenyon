<?php
include('../connection/connection.php');
$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>
<form method="post" action="<?php echo 'admin.php?use=report'; ?>">
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
    <th>รหัสการซ่อม</th>
    <th>เลชทะเบียน</th>
    <th>เจ้าของ</th>
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
        car_repir.vin,
        car_repir.date_repir,
        `invoice_parts`.Iv_parts_id,
        `invoice_parts`.Insurance_id,
        `invoice_parts`.Iv_total as part_total,
        invoice_parts.wage as part_wage,
        `invoice_painting`.Iv_paint_id,
        `invoice_painting`.Insurance_id,
        `invoice_painting`.Iv_total as paint_total,
        invoice_painting.wage as paint_wage,
        (invoice_painting.wage + invoice_parts.wage) as wage_price,
        (invoice_parts.Iv_total + invoice_painting.Iv_total + invoice_painting.wage + invoice_parts.wage) as total_repir, 
        insurance.name as insurance_name,
        insurance_type.type as insurance_type,
        customer.firstname,
        customer.lastname,
        customer.cus_id,
        customer.tel,
        customer.address,
        car.car_registration,
        car.model_year,
        car.color,
        car_brand.brand_name,
        car_model.model_id,
        car.car_type,
        car_model.model_name 
        FROM car_repir 
        INNER JOIN `invoice_parts`
        ON car_repir.repair_id = `invoice_parts`.repair_id
        INNER JOIN `invoice_painting`
        ON car_repir.repair_id = `invoice_painting`.repair_id
        INNER JOIN insurance
        ON `invoice_painting`.Insurance_id = insurance.insurance_id
        INNER JOIN car
        ON car_repir.vin = car.vin
        INNER JOIN customer
        ON customer.cus_id = car.cus_id  
        INNER JOIN insurance_type
        ON invoice_parts.Isr_type_id = insurance_type.Isr_type_id
        INNER JOIN car_model
        ON car.model_id = car_model.model_id
        INNER JOIN car_brand
        ON car_model.brand_id = car_brand.brand_id
        WHERE car.car_registration LIKE '%" . $strKeyword . "%' OR  customer.firstname LIKE '%" . $strKeyword . "%' 
        limit {$start} , {$perpage} 
    ";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <tr>
        <td><?php echo $row['repair_id']; ?></td>
        <td><?php echo $row['car_registration']; ?></td>
        <td><?php echo $row['firstname'], ' ', $row['lastname']; ?></td>
        <td>
          <a href="query/view_report_part.php?repir_id=<?php echo $row['repair_id']; ?>&customer_addr=<?php echo $row['address']; ?>&customer_name=<?php echo $row["firstname"], ' ', $row['lastname']; ?>&iv_parts_id=<?php echo $row['Iv_parts_id']; ?>&total=<?php echo intval($row['part_total']); ?>" class="btn btn-outline-primary">
            ใบเสนอราคาอะไหล่
          </a>
          <a href="query/view_report_paint.php?repir_id=<?php echo $row['repair_id']; ?>&customer_addr=<?php echo $row['address']; ?>&customer_name=<?php echo $row['firstname'], ' ', $row['lastname']; ?>&iv_paint_id=<?php echo $row['Iv_paint_id']; ?>&total=<?php echo intval($row['paint_total']); ?>" class="btn btn-outline-primary">
            ใบเสนอราคาเคาะพ่นสี
          </a>
          <a href="query/view_report_in.php?insurance_name=<?php echo $row['insurance_name']; ?>&customer_name=<?php echo $row['firstname'], ' ', $row['lastname']; ?>&customer_tel=<?php echo $row['tel']; ?>&car_registration=<?php echo $row['car_registration']; ?>&car_type=<?php echo $row['car_type']; ?>" class="btn btn-outline-primary">
            ใบรับรถเข้าซ่อม
          </a>
          <a href="query/view_report_out.php?insurance_name=<?php echo $row['insurance_name']; ?>&customer_name=<?php echo $row['firstname'], ' ', $row['lastname']; ?>&customer_tel=<?php echo $row['tel']; ?>&car_registration=<?php echo $row['car_registration']; ?>" class="btn btn-outline-primary">
            ใบรับรถกลับ
          </a>
          <a href="query/view_report_slip.php?cus_id=<?php echo $row['cus_id']; ?>&repair_id=<?php echo $row['repair_id']; ?>&customer_name=<?php echo $row['firstname'], ' ', $row['lastname']; ?>&brand_name=<?php echo $row['brand_name']; ?>&customer_addr=<?php echo $row['address']; ?>&model=<?php echo $row['model_name']; ?>&color=<?php echo $row['color']; ?>&iv_parts_id=<?php echo $row['Iv_parts_id']; ?>&iv_paint_id=<?php echo $row['Iv_paint_id']; ?>&wage_detail=<?php echo 'อะไหล่ ', number_format(intval($row['part_wage'])), ', เคาะพ่นสี ', number_format(intval($row['paint_wage'])), ''; ?>&wage_price=<?php echo intval($row['wage_price']); ?>&part_total=<?php echo intval($row['part_total']); ?>&paint_total=<?php echo $row['paint_total']; ?>&total_repir=<?php echo intval($row['total_repir']); ?>" class="btn btn-outline-primary">
            ใบเสร็จรับเงิน
          </a>
          <a href="report_delete.php?lv_parts_id=<?php echo $row["Iv_parts_id"]; ?>&lv_paint_id=<?php echo $row['Iv_paint_id']; ?>&repair_id=<?php echo $row['repair_id']; ?>">
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
      <a class="page-link" href="admin.php?use=report&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="admin.php?use=report&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" href="admin.php?use=report&page=<?php echo $total_page; ?>">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>