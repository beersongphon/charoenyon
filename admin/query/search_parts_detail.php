<?php
include('../../connection/connection.php');
$id = $_GET['id'];
$sql = "SELECT 
        auto_parts.parts_id,
        auto_parts.parts_name,
        auto_parts.parts_price,
        company_parts.company_name
        FROM auto_parts 
        INNER JOIN company_parts 
        ON auto_parts.company_parts_id = company_parts.company_parts_id
        WHERE auto_parts.parts_id = " . $id . "";
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
  $data = array(
    'parts_id' => $row["parts_id"],
    'parts_name' => $row["parts_name"],
    'parts_price' => $row["parts_price"],
    'company_name' => $row['company_name']
  );
}
$js = json_encode($data);
echo $js;
?>