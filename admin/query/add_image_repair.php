<?php
include('../../connection/connection.php');
$id = $_POST['repair_id'];
$type = $_POST['type'];
$Img_detail = $_POST['Img_detail'];

$sql = "INSERT INTO img_repair (repair_id, Img_detail, type_img) VALUES (". $id.", '". $Img_detail ."', ". $type .")";

$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
