<?php
include('../../connection/connection.php');
$parts_name = $_POST['parts_name'];
$parts_price = $_POST['parts_price'];
$company_id = $_POST['company_parts_id'];
$model_id = $_POST['model_id'];
$parts_year = $_POST['parts_year'];

$sql = "SELECT * FROM auto_parts";
$result = $conn->query($sql);
$parts_id = ($result->num_rows + 1);
$sql = "INSERT INTO auto_parts (parts_name , parts_price , company_parts_id, model_id, parts_year) VALUES 
        (
           '" . $parts_name . "',
           " . $parts_price . ",
           " . $company_id . ",
           " . $model_id . ",
           '" . $parts_year . "'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT parts_id FROM auto_parts WHERE parts_name = '" . $parts_name . "' AND parts_price = " . $parts_price . " AND company_parts_id = " . $company_id . " AND model_id = " . $model_id . " AND parts_year = '" . $parts_year . "'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['parts_id'];
  }
  echo $id;
} else {
  echo $sql;
}
