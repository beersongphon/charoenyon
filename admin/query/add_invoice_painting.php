<?php
include('../../connection/connection.php');

$Insurance_id = $_POST['Insurance_id'];
$Isr_type_id = $_POST['Isr_type_id'];
$wage = $_POST['wage'];
$Iv_total = $_POST['Iv_total'];
$repair_id = $_POST['repair_id'];

$sql = "SELECT * FROM invoice_painting";

$result = $conn->query($sql);

$id = ($result->num_rows + 1);

$sql = "INSERT INTO `invoice_painting` 
                (Iv_paint_id, Insurance_id, Isr_type_id, wage, Iv_total, repair_id) 
            VALUE (
                " . $id . ",
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
