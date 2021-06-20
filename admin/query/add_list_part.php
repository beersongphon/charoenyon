<?php
include('../../connection/connection.php');

$parts_id = $_POST['parts_id'];
$Iv_parts_id = $_POST['Iv_parts_id'];
$amount = $_POST['amount'];
$total_part = $_POST['total_part'];

$sql = "SELECT * FROM list_parts";
$result = $conn->query($sql);
$sql = "INSERT INTO list_parts
            (parts_id, amount, total_part, Iv_parts_id)
            VALUES( 
                " . $parts_id . ",
                " . $amount . ",
                " . $total_part . ",
                " . $Iv_parts_id . "
            )";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
