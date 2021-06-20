<?php
require('../lib/ThaiPDF/thaipdf.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <?php
  for ($i = 1; $i <= 6; $i++) {
    echo "<h$i> ฟอนต์ขนาด </h$i>";
  }
  ?>
</body>
</html>
<?php
$html = ob_get_clean();
pdf_html($html);
pdf_pagenum_show(false);
pdf_echo();
?>