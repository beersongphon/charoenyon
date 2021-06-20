<?php
include('../../connection/connection.php');
$Img_review = $_POST['Img_review'];
$review_id = $_POST['review_id'];
$sql = "INSERT INTO img_review (Img_review, review_id) VALUES ('" . $Img_review . "'," . $review_id . ")";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo False;
}
