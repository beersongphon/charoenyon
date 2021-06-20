<?php
include('../connection/connection.php');
if ($_GET) {
  $id = $_GET['id'];
  $sql = "DELETE FROM insurance WHERE insurance_id = " . $id;
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "<script>
      window.location.replace('admin.php?use=insurance');
    </script>";
  } else {
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
  }
}
?>
