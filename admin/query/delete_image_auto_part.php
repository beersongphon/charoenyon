<?php
include('../../connection/connection.php');
$parts_id = $_POST['parts_id'];
$sql = "DELETE FROM img_parts WHERE parts_id = " . $parts_id;
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
