<?php
include('../../connection/connection.php');
require_once('../../lib/ThaiPDF/thaipdf.php');
$customer_name = $_GET['customer_name'];
$car_registration = $_GET['car_registration'];

ob_start();
?>
<html>

<head>
  <style>
    table {
      margin: auto;
    }

    td {
      padding: 10px;
    }
  </style>
</head>

<body>
  <div style="text-align: center;">
    <p>อู่ ส. เจริญยนต์</p>
    <p>เลขที่ 64 หมู่ที่ 3 ตำบล บ้านแก้ง อำเภอเฉลิมพระเกียรติ จังหวัดสระบุรี Tel. 0861253509</p>
    <hr>
    <p>ใบรับรถกลับ</p>
  </div>
  <br />
  <div style="text-align: right;">
    <span>วันที่</span>.....<?php echo date("d"); ?>....<span>เดือน</span>.....<?php echo date("m"); ?>........<span>พ.ศ.</span>....<?php echo date("Y") + 543; ?>.......
  </div>
  <br />
  <br />
  <br />
  <div>
    <span><b>ข้าพเจ้า นาย/นาง/นางสาว</b></span>.................................................................................<span><b>อยู่เลขที่</b></span>......................<span><b>หมู่</b></span>..........................
  </div>
  <br />
  <br />
  <div>
    <span><b>ตำบล/แขวง</b></bo></span>...................................................<span><b>อำเภอ</b></span>...................................................<span><b>จังหวัด</b></span>..............................................
  </div>
  <br />
  <br />
  <div>
    <span><b>ได้รับมอบหมายจาก</b></span> <?php echo $customer_name; ?>
  </div>
  <br />
  <br />
  <div>
    <span>เพื่อรับรถยนต์หมายเลขทะเบียนรถ</span>................<?php echo $car_registration; ?>.................<span>ซึ่งซ่อมเสร็จอยู่ในสภาพที่สมบูรณ์แล้ว</span>
  </div>
  <br />
  <br />
  <br />
  <br />
  <div style="text-align: right; margin-right: 10px;">
    <div style="text-align: center;">
      <p>ลายมือชื่อ..........................................ผู้รับรถ</p>
      <p>(.....................................)</p>
    </div>
  </div>
  <br />
  <br />
  <div style="text-align: right; margin-right: 10px;">
    <div style="text-align: center;">
      <p>ลายมือชื่อ...........................................พยาน</p>
      <p>(.....................................)</p>
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