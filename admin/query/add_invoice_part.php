<?php
include('../../connection/connection.php');

$Insurance_id = $_POST['Insurance_id'];
$Isr_type_id = $_POST['Isr_type_id'];
$wage = $_POST['wage'];
$Iv_total = $_POST['Iv_total'];
$repair_id = $_POST['repair_id'];

$sql = "SELECT * FROM `invoice_parts`";

$result = $conn->query($sql);

$id = ($result->num_rows + 1);

$sql = "INSERT INTO `invoice_parts`" .
  "(Iv_parts_id ,Insurance_id, Isr_type_id , wage, Iv_total , repair_id)" .
  "VALUES (
                " . ($result->num_rows + 1) . ",
                " . $Insurance_id . ",
                " . $Isr_type_id . ",
                " . $wage . ",
                " . $Iv_total . ",
                " . $repair_id . "
            )";

$result = $conn->query($sql);

if ($result == True) {
  echo $id;
} else {
  echo $sql;
}
