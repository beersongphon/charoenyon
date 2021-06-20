<?php
include('../../connection/connection.php');

$painting_id = $_POST['painting_id'];
$amount = $_POST['amount'];
$total_paint = $_POST['total_paint'];
$Iv_paint_id = $_POST['Iv_paint_id'];

$sql = "INSERT INTO list_painting
            (painting_id, amount, total_paint, Iv_paint_id)
            VALUES (
                " . $painting_id . ",
                " . $amount . ",
                " . $total_paint . ",
                " . $Iv_paint_id . "
            )";

$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
