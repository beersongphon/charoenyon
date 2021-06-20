<?php
include('../connection/connection.php');
if ($_GET) {
  $lv_parts_id = $_GET['lv_parts_id'];
  $lv_paint_id = $_GET['lv_paint_id'];
  $repair_id = $_GET['repair_id'];

  $sql = "DELETE FROM list_parts WHERE Iv_parts_id = " . $lv_paint_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }

  $sql = "DELETE FROM list_painting WHERE Iv_paint_id = " . $lv_paint_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }


  $sql = "DELETE FROM invoice_parts WHERE repair_id = " . $repair_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }


  $sql = "DELETE FROM invoice_painting WHERE repair_id  = " . $repair_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }


  $sql = "SELECT review_id FROM review WHERE repair_id = " . $repair_id;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sql = "DELETE FROM img_review WHERE review_id = " . $row['review_id'];
      $result = $conn->query($sql);
      if ($result == FALSE) {
        echo $sql;
      }
    }
  }

  $sql = "DELETE FROM review WHERE repair_id = " . $repair_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }

  $sql = "DELETE FROM img_repair WHERE repair_id = " . $repair_id;
  $result = $conn->query($sql);

  if ($result == FALSE) {
    echo $sql;
  }

  $sql = "DELETE FROM car_repir WHERE repair_id = " . $repair_id;
  $result = $conn->query($sql);

  if ($result == TRUE) {
    echo "<script>
      window.location.replace('admin.php?use=report');
    </script>";
  } else {
    echo $sql;
  }
}
