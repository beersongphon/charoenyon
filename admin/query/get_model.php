<?php
include('../../connection/connection.php');
$brand_id = $_POST['brand_id'];
$sql = "SELECT * FROM car_model WHERE brand_id = " . $brand_id;
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
  array_push($data, array(
    'model_id' => $row['model_id'],
    'model_name' => $row['model_name']
  ));
}
$js = json_encode($data);
echo $js;

?>