<?php
include('../../connection/connection.php');
$parts_id = $_POST['parts_id'];
$parts_name = $_POST['parts_name'];
$parts_price = $_POST['parts_price'];
$company_id = $_POST['company_parts_id'];
$model_id = $_POST['model_id'];
$parts_year = $_POST['parts_year'];

$sql = "UPDATE auto_parts 
        SET parts_name = '" . $parts_name . "',
            parts_price = " . $parts_price . ",
            company_parts_id = " . $company_id . ",
            model_id = " . $model_id . ",
            parts_year = '" . $parts_year . "'
        WHERE parts_id = " . $parts_id . "
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
