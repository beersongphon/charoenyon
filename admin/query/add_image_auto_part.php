<?php
include('../../connection/connection.php');
$Img = $_POST['Img'];
$parts_id = $_POST['parts_id'];
$sql = "INSERT INTO img_parts (Img, parts_id) VALUES ('" . $Img . "'," . $parts_id . ")";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
