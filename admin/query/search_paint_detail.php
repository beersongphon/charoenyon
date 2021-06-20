<?php
include('../../connection/connection.php');
$id = $_GET['id'];
$sql = "SELECT 
        *
        FROM car_painting 
        WHERE painting_id = " . $id . "";
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
  $data = array(
    'paint_id' => $row["painting_id"],
    'pt_detail' => $row["pt_detail"],
    'pt_part' => $row["pt_part"],
    'paint_price' => $row["paint_price"]
  );
}
$js = json_encode($data);
echo $js;
