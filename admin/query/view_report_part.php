<?php
include('../../connection/connection.php');
require_once('../../lib/ThaiPDF/thaipdf.php');
$repir_id = $_GET['repir_id'];
$Iv_parts_id = $_GET['iv_parts_id'];
$customer_name = $_GET['customer_name'];
$customer_addr = $_GET['customer_addr'];
$total = $_GET['total'];
ob_start();

?>
<html>

<head>
  <style>
    table {
      border-collapse: collapse;
      margin: auto;
    }

    th,
    td {
      padding: 10px;
      width: 150px;
    }

    td {
      vertical-align: top;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div style="text-align: center;">
    <h1>อู่ส.เจริญยนต์(สายันต์เซอร์วิส)</h1>
    <h2 style="font-weight: normal;">64 หมู่ที่ 3 ตำบลบ้านแก้ง อำเภอเฉลิมพระเกียรติ จังหวัดสระบุรี 18000</h2>
    <h2 style="font-weight: normal;">Tel. 086-1253509 ช่างยันต์</h2>
    <br />
    <h2 style="text-decoration: underline;">
      ใบเสนอราคาอะไหล่
    </h2>
  </div>
  <br />
  <div>
    <div style="text-align: right;">
      <span>วันที่</span>.....<?php echo date("d"); ?>....<span>เดือน</span>.....<?php echo date("m"); ?>........<span>พ.ศ.</span>....<?php echo date("Y") + 543; ?>.......
    </div>
    <b style="font-size: 18px;">เรียน : </b> <?php echo $customer_name; ?>
    <br>
    <br>
    <b style="font-size: 18px;">ที่อยู่ : </b> <?php echo $customer_addr; ?>
  </div>
  <br>
  <br>
  <table border="1">
    <tr>
      <th>ลำดับ</th>
      <th style="width: 200px;">รายการอะไหล่เปลี่ยน</th>
      <th>จำนวน</th>
      <th>ราคา</th>
    </tr>
    <?php

    $sql = "SELECT 
                            list_parts.amount,
                            list_parts.total_part as total,
                            list_parts.Iv_parts_id as iv_parts_id,
                            list_parts.parts_id,
                            auto_parts.parts_name
                            FROM list_parts
                            INNER JOIN auto_parts
                            ON list_parts.parts_id = auto_parts.parts_id
                            WHERE list_parts.Iv_parts_id = " . $Iv_parts_id . "
                    ";
    $result = $conn->query($sql);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td>
          <?php echo $i; ?>
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
    <tr>
      <td>
        รวม
      </td>
      <td colspan="3" style="text-align: right;">
        <?php echo number_format($total); ?>
      </td>
    </tr>
  </table>
  <br />
  <br />
  <div>
    <p>ทางอู่ ส.เจริญยนต์ จึงขอเสนอราคาและเงื่อนไขในการซ่อมตาใบเสนอราคาต่อไปนี้</p>
    <div style="text-align: right;">
      <span>
        ผู้เสนอราคา อู่ ส.เจริญยนต์
      </span>
    </div>
  </div>
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