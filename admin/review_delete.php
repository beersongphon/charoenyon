<?php
include('../connection/connection.php');
if ($_GET) {
  $id = $_GET['id'];
  $sql = "DELETE FROM img_review WHERE review_id = " . $id;
  $conn->query($sql);
  $sql = "DELETE FROM review WHERE review_id = " . $id;
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "<script>
      window.location.replace('admin.php?use=review');
    </script>";
  } else {
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
  }
}
