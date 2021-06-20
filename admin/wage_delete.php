<?php
include('../connection/connection.php');
if ($_GET) {
  $id = $_GET['id'];
  $sql = "DELETE FROM wage WHERE wage_id = '" . $id . "'";
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "<script>
      window.location.replace('admin.php?use=wage');
    </script>";
  } else {
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
  }
}
