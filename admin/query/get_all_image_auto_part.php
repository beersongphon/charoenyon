<?php
include('../../connection/connection.php');
$parts_id = $_POST['parts_id'];
$sql = "SELECT * FROM img_parts WHERE parts_id = " . $parts_id;
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
