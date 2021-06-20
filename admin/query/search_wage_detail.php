<?php
include('../../connection/connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM wage WHERE wage_id = " . $id;
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
  $data = array(
    'wage_id' => $row["wage_id"],
    'wage_detail' => $row["wage_detail"],
    'wage_price' => $row["wage_price"]
  );
}
$js = json_encode($data);
echo $js;
?>