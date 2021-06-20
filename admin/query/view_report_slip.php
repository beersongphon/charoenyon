<?php
include('../../connection/connection.php');
require_once('../../lib/ThaiPDF/thaipdf.php');
ob_start();
$repair_id = $_GET['repair_id'];
$cus_id = $_GET['cus_id'];
$customer_name = $_GET['customer_name'];
$customer_addr = $_GET['customer_addr'];
$brand_name = $_GET['brand_name'];
$model = $_GET['model'];
$color = $_GET['color'];
$iv_parts_id = $_GET['iv_parts_id'];
$iv_paint_id = $_GET['iv_paint_id'];
$wage_detail = $_GET['wage_detail'];
$wage_price = $_GET['wage_price'];
$part_total = $_GET['part_total'];
$paint_total = $_GET['paint_total'];
$total_repir = $_GET['total_repir'];
?>
<html>

<head>
  <style>
    table {
      border-collapse: collapse;
      margin: auto;
      width: 100%;
    }


    td {
      padding: 10px;
      vertical-align: top;
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <td style="width: 50%;">
        <p>
          บริษัท อู่ ส. เจริญยนต์
        </p>
        <br>
        <p>
          ที่อยู่ : เลขที่ 64 หมู่ที่ 3 ตำบล บ้านแก้ง <br><br> อำเภอเฉลิมพระเกียรติ จังหวัดสระบุรี
        </p>
        <br>
        <p>
          โทร : 0861253509
        </p>
        <br>
      </td>
      <td style="width: 40%; text-align: right;">
        <h1 style="padding: 5px; border: solid 1px black;">ใบเสร็จรับเงิน</h1>
      </td>
    </tr>
    <tr>
      <td>เลขที่ใบเสร็จ <?php echo $repair_id; ?></td>
      <td>วันที่ <?php echo date('d'), '/', date('m'), '/', (date('Y') + 543); ?></td>
    </tr>

  </table>
  <br>
  <br>
  <table style="border: solid 1px black; padding: 10px;">
    <tr>
      <th style="width: 60%;">เจ้าของรถ</th>
      <th style="width: 40%;">ข้อมูลรถยนต์</th>
    </tr>
    <tr>
      <td>
        รหัสลูกค้า <?php echo $cus_id; ?>
      </td>
      <td>
        ยี่ห้อ <?php echo $brand_name; ?>
      </td>
    </tr>
    <tr>
      <td>
        ชื่อ <?php echo $customer_name; ?>
      </td>
      <td>
        รุ่น <?php echo $model; ?>
      </td>
    </tr>
    <tr>
      <td>
        ที่อยู่ <?php echo $customer_addr; ?>
      </td>
      <td>
        สี <?php echo $color; ?>
      </td>
    </tr>
  </table>
  <br>
  <h4>ค่าอะไหล่</h4>
  <table border="1">
    <tr>
      <th>
        ลำดับ
      </th>
      <th>
        รหัส
      </th>
      <th>
        รายการอะไหล่
      </th>
      <th>
        จำนวน
      </th>
      <th>
        ราคา
      </th>
    </tr>
    <?php
    $sql = "SELECT 
                            list_parts.amount,
                            list_parts.total_part as total,
                            list_parts.Iv_parts_id,
                            list_parts.parts_id,
                            auto_parts.parts_name
                            FROM list_parts
                            INNER JOIN auto_parts
                            ON list_parts.parts_id = auto_parts.parts_id
                            WHERE list_parts.Iv_parts_id = " . $iv_parts_id . "
                    ";
    echo $sql;
    $result = $conn->query($sql);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td>
          <?php echo $i; ?>
        </td>
        <td>
          <?php echo $row["parts_id"]; ?>
        </td>
        <td style="text-align: left;">
          <?php echo $row["parts_name"]; ?>
        </td>
        <td>
          <?php echo $row["amount"]; ?>
        </td>
        <td style="text-align: right;">
          <?php echo number_format($row["total"]); ?>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <br>
  <h4>ค่าเคาะพ่นสี</h4>
  <table border="1">
    <tr>
      <th>
        ลำดับ
      </th>
      <th>
        รหัส
      </th>
      <th>
        รายการ
      </th>
      <th>
        จำนวน
      </th>
      <th>
        ราคา
      </th>
    </tr>
    <?php

    $sql = "SELECT 
                            list_painting.amount,
                            list_painting.total_paint,
                            list_painting.Iv_paint_id,
                            list_painting.painting_id,
                            car_painting.pt_detail,
                            car_painting.pt_part
                            FROM list_painting
                            INNER JOIN car_painting 
                            ON list_painting.painting_id = car_painting.painting_id
                            WHERE list_painting.Iv_paint_id = " . $iv_paint_id . "
                    ";
    echo $sql;
    $result = $conn->query($sql);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td>
          <?php echo $i; ?>
        </td>
        <td>
          <?php echo $row['painting_id']; ?>
        </td>
        <td style="text-align: left;">
          <?php echo $row["pt_detail"], ' ', $row['pt_part']; ?>
        </td>
        <td>
          <?php echo $row["amount"]; ?>
        </td>
        <td style="text-align: right;">
          <?php echo number_format($row["total_paint"]); ?>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <br>
  <br>
  <table>
    <tr>
      <td style="width:80%;">ค่าแรง(<?php echo $wage_detail; ?>)</td>
      <td style="width:20%; text-align:right;"><?php echo number_format($wage_price); ?> บาท</td>
    </tr>
    <tr>
      <td style="width:80%;">ค่าอะไหล่รวม</td>
      <td style="width:20%; text-align:right;"><?php echo number_format($part_total); ?> บาท</td>
    </tr>
    <tr>
      <td style="width:80%;">ค่าเคาะพ่นสีรวม</td>
      <td style="width:20%; text-align:right;"><?php echo number_format($paint_total); ?> บาท</td>
    </tr>
    <tr>
      <td style="width:80%;">รวม</td>
      <td style="width:20%; text-align:right;"><?php echo number_format($total_repir); ?> บาท</td>
    </tr>
  </table>
</body>

</html>

<?php
$html = ob_get_clean();
pdf_pagenum_show(true);
pdf_pagenum_position("TOP", "RIGHT", "RIGHT");
pdf_pagenum_line(false);
pdf_html($html);
pdf_echo();
?>