<?php
include('../../connection/connection.php');
$review_id = $_POST['review_id'];
$sql = "SELECT * FROM img_review WHERE review_id = " . $review_id;
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
