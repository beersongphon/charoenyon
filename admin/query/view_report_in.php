<?php
include('../../connection/connection.php');
require_once('../../lib/ThaiPDF/thaipdf.php');
$insurance_name = $_GET['insurance_name'];
$customer_name = $_GET['customer_name'];
$customer_tel = $_GET['customer_tel'];
$car_registration = $_GET['car_registration'];
$car_type = $_GET['car_type'];

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
    <p>รับรถเข้าซ่อม</p>
  </div>
  <br />
  <div style="text-align: right;">
    <span>วันที่</span>.....<?php echo date("d"); ?>....<span>เดือน</span>.....<?php echo date("m"); ?>........<span>พ.ศ.</span>....<?php echo date("Y") + 543; ?>.......
  </div>
  <br />
  <br />
  <br />
  <div>
    <span><b>ประกันภัยบริษัทฯ : </b></span> <?php echo $insurance_name ?>
  </div>
  <br />
  <br />
  <div style="text-align: left;">
    <span><b>เลขที่กรรมธรรม์ : </b></span> .................................................................................. <span><b>ชื่อผู้ครอบครอง : </b></span> <?php echo $customer_name; ?>
  </div>
  <br />
  <br />
  <div>
    <span><b>เบอร์โทรศัพท์ : </b> </span> <?php echo $customer_tel ?> <span><b>ประเภทรถ : </b></span> <?php echo $car_type; ?> <span><b>หมายเลขทะเบียนรถ : </b></span> <?php echo $car_registration; ?>
  </div>
  <br />
  <br />
  <table>
    <tr>
      <td>
        <input type="checkbox">
        <span for="vehicle1">รถประกัน</label><br>
      </td>
      <td>
        <input type="checkbox">
        <span for="vehicle1">คู่กรณี</label><br>
      </td>
      <td>
        <input type="checkbox">
        <span for="vehicle1">รถเงินสด</label><br>
      </td>
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