<?php
include('../../connection/connection.php');
$review_id = $_POST['review_id'];
$sql = "DELETE FROM img_review WHERE review_id = " . $review_id;
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
