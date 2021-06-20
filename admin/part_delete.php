<?php
include('../connection/connection.php');
if ($_GET) {
  $id = $_GET['id'];
  $sql = "DELETE FROM img_parts WHERE parts_id = " . $id;
  $conn->query($sql);
  $sql = "DELETE FROM auto_parts WHERE parts_id = " . $id;
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "<script>
      window.location.replace('admin.php?use=part');
    </script>";
  } else {
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
  }
}
