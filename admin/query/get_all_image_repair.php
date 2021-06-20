<?php
include('../../connection/connection.php');
$repair_id = $_POST['repair_id'];
$sql = "SELECT * FROM img_repair WHERE repair_id = " . $repair_id;
$result = $conn->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
  array_push($data, $row);
}

if ($result == True) {
  echo json_encode($data);
} else {
  echo $sql;
}
