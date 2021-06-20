<?php
include('../../connection/connection.php');
$repair_id = $_POST['repair_id'];
$user_id = $_POST['user_id'];

$sql = "SELECT * FROM review";

$result = $conn->query($sql);

$sql = "SELECT * FROM review";
$id = $conn->query($sql)->num_rows + 1;

$sql = "INSERT INTO review (review_id, repair_id, user_id) VALUES (" . $id . ", " . $repair_id . ", " . $user_id . ")";

$result = $conn->query($sql);

if ($result == True) {
  echo $id;
} else {
  echo $sql;
}
