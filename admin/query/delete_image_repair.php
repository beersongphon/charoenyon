<?php
include('../../connection/connection.php');
$repair_id = $_POST['repair_id'];
$sql = "DELETE FROM img_repair WHERE repair_id = " . $repair_id;
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
