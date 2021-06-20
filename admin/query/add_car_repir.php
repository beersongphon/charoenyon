<?php
include('../../connection/connection.php');

$vin = $_GET['vin'];

$sql = "SELECT * FROM car_repir";

$result = $conn->query($sql);

$id = ($result->num_rows + 1);

$sql = "INSERT INTO car_repir (
            repair_id,
            vin
        )
        VALUES (
            " . ($result->num_rows + 1) . ",
            '" . $vin . "'
       );
  ";

$result = $conn->query($sql);

echo $id; 

//echo $sql;