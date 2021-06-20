<!doctype html>
<html lang="en">
<?php
include("../connection/connection.php");
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Athiti&display=swap" rel="stylesheet">
  <title>ส.เจริญยนต์</title>
  <style>
    body {
      font-family: 'Athiti', sans-serif;
    }
  </style>
</head>

<body>
  <?php include('./navbar.php'); ?>
  <!-- body -->
  <div class="row p-4">
    <div class="col-3">
      <a href="admin.php?use=car" style="text-decoration: none;">
        <button class="btn btn-warning btn-block">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
          กลับ
        </button>
      </a>
    </div>
    <?php
    if ($_GET) {
      $id = $_GET["id"];
      $sql = "SELECT 
                car.vin,
                car.model_id,
                car.gear_id,
                car.status_id,
                gear.gear_detail,
                car.car_registration,
                car.model_year,
                car.color,
                car.car_type,
                status.status_detail as status,
                CONCAT(customer.firstname , ' ' , customer.lastname) AS customer_name,
                customer.cus_id,
                customer.tel,
                car_brand.brand_name,
                car_model.model_name,
                car_model.model_id
            FROM car
            INNER JOIN customer
            ON car.cus_id = customer.cus_id
            INNER JOIN car_model
            ON car.model_id = car_model.model_id
            INNER JOIN car_brand
            ON car_model.brand_id = car_brand.brand_id
            INNER JOIN status
            ON car.status_id = status.status_id
            INNER JOIN gear
            ON car.gear_id = gear.gear_id
            WHERE car.vin = '" . $id . "'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
    ?>
        <div class="col-9">
          <center>
            <h2>แก้ไขรถยนต์</h2>
            <form method="POST" action="" style="width:50%; text-align: left;">
              <input type="text" name="model_history" id="model_history" value="<?php echo $row['model_id'] ?>" hidden />
              <div class="form-group">
                <label>เลขตัวถัง</label>
                <input class="form-control" name="vin" type="text" placeholder="กรอกเลขตัวถังรถยนต์" readonly value="<?php echo $row["vin"]; ?>">
              </div>
              <div class="form-group">
                <label>เลขทะเบียนรถยนต์</label>
                <input class="form-control" name="car_registration" type="text" placeholder="กรอกทะเบียนรถยนต์" required value="<?php echo $row["car_registration"]; ?>">
              </div>
              <div class="form-group">
                <label>ปี</label>
                <input class="form-control" name="model_year" type="number" placeholder="กรอกปี" required value="<?php echo $row["model_year"]; ?>">
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>ยี่ห้อ</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                      <?php
                      $sql = "SELECT * FROM car_brand";
                      $result = $conn->query($sql);
                      while ($brand = $result->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $brand["brand_id"]; ?>" <?php
                                                                          $sql = "SELECT * FROM car_model WHERE model_id = " . $row['model_id'] . " AND brand_id =" . $brand["brand_id"];
                                                                          $model = $conn->query($sql);
                                                                          if ($model->num_rows > 0) {
                                                                            echo 'selected';
                                                                          }
                                                                          ?>>
                          <?php echo $brand["brand_name"]; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>รุ่น</label>
                    <select name="model_id" id="model_id" class="form-control">

                    </select>
                  </div>
                </div>

              </div>


              <div class="form-group">
                <label>สี</label>
                <select name="color" class="form-control">
                  <option value="ดำ" <?php if ($row["color"] == 'ดำ') echo 'selected'; ?>>ดำ</option>
                  <option value="ขาว" <?php if ($row["color"] == 'ขาว') echo 'selected'; ?>>ขาว</option>
                  <option value="ทอง" <?php if ($row["color"] == 'ทอง') echo 'selected'; ?>>ทอง</option>
                  <option value="เทา" <?php if ($row["color"] == 'เทา') echo 'selected'; ?>>เทา</option>
                  <option value="แดง" <?php if ($row["color"] == 'แดง') echo 'selected'; ?>>แดง</option>
                  <option value="น้ำเงิน" <?php if ($row["color"] == 'น้ำเงิน') echo 'selected'; ?>>น้ำเงิน</option>
                  <option value="เหลือง" <?php if ($row["color"] == 'เหลือง') echo 'selected'; ?>>เหลือง</option>
                  <option value="เขียว" <?php if ($row["color"] == 'เขียว') echo 'selected'; ?>>เขียว</option>
                </select>
              </div>

              <div class="form-group">
                <label>ประเภทรถ</label>
                <select name="car_type" class="form-control">
                  <option value="เก๋งสองตอน" <?php if ($row["car_type"] == 'เก๋งสองตอน') echo 'selected'; ?>>เก๋งสองตอน</option>
                  <option value="รถยนต์สี่ประตู" <?php if ($row["car_type"] == 'รถยนต์สี่ประตู่') echo 'selected'; ?>>รถยนต์สี่ประตู</option>
                  <option value="Van" <?php if ($row["car_type"] == 'Van') echo 'selected'; ?>>Van</option>
                  <option value="กระบะ(ไม่มีหลังคา)" <?php if ($row["car_type"] == 'กระบะ(ไม่มีหลังคา)') echo 'selected'; ?>>กระบะ(ไม่มีหลังคา)</option>
                  <option value="กระบะ(มีหลังคา)" <?php if ($row["car_type"] == 'กระบะ(มีหลังคา)') echo 'selected'; ?>>กระบะ(มีหลังคา)</option>
                </select>
              </div>

              <div class="form-group">
                <label>ประเภทเกียร</label>
                <select name="gear_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM gear";
                  $result = $conn->query($sql);
                  while ($gear = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $gear["gear_id"]; ?>" <?php if ($gear["gear_id"] == $row["gear_id"]) echo 'selected'; ?>>
                      <?php echo $gear["gear_detail"]; ?>
                    </option>
                  <?php

                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label>เจ้าของรถยนต์</label>
                <select name="cus_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM customer";
                  $result = $conn->query($sql);
                  while ($customer = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $customer["cus_id"]; ?>" <?php if ($customer["cus_id"] == $row["cus_id"]) echo 'selected'; ?>>
                      <?php echo $customer["firstname"], ' ', $customer["lastname"]; ?>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>สถานะการซ่อม</label>
                <select name="status_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM status";
                  $result = $conn->query($sql);
                  while ($status = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $status["status_id"]; ?>" <?php if ($status["status_id"] == $row["status_id"]) echo 'selected' ?>>
                      <?php echo $status["status_detail"]; ?>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <button class="btn btn-primary btn-block" type="submit">
                ยืนยัน
              </button>
            </form>
          </center>
        </div>
      <?php
      }
      ?>
    <?php
    }
    ?>
    <?php
    if ($_POST) {
      $vin = $_POST['vin'];
      $car_registration = $_POST['car_registration'];
      $model_year = $_POST['model_year'];
      $model_id = $_POST['model_id'];
      $cus_id = $_POST['cus_id'];
      $color = $_POST['color'];
      $car_type = $_POST['car_type'];
      $status_id = $_POST['status_id'];
      $gear_id = $_POST['gear_id'];
      $sql = "UPDATE car 
                SET cus_id = " . $cus_id . ",
                    model_id = " . $model_id . ",
                    car_registration = '" . $car_registration . "',
                    model_year = " . $model_year . ",
                    color = '" . $color . "',
                    car_type = '" . $car_type . "',
                    status_id = " . $status_id . ",
                    gear_id = " . $gear_id . "
                WHERE vin = '" . $id . "' 
            ";
      $result = $conn->query($sql);
      if ($result == TRUE) {
        echo "<script>
                        window.location.replace('admin.php?use=car');
                    </script>";
      } else {
        echo "<script>alert('เกิดข้อผิดพลาด');</script>";
      }
    }
    ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $('document').ready(function() {
      //
      var brand_id = $('#brand_id').val();
      $.ajax({
        url: 'query/get_model.php',
        data: {
          'brand_id': brand_id
        },
        method: 'post',
        dataType: 'json',
        success: function(result) {
          result.forEach((data) => {
            if (parseInt(data.model_id) == parseInt($('#model_history').val())) {
              $('#model_id').append(`<option value="${data.model_id}" selected>${data.model_name}</option>`);
            } else {
              $('#model_id').append(`<option value="${data.model_id}">${data.model_name}</option>`);
            }
          });
        }
      });

      $('#brand_id').on('change', function() {
        brandChange();
      });
    });

    function brandChange() {
      $('#model_id').empty();
      var brand_id = $('#brand_id').val();
      $.ajax({
        url: 'query/get_model.php',
        data: {
          'brand_id': brand_id
        },
        method: 'post',
        dataType: 'json',
        success: function(result) {
          result.forEach((data) => {
            $('#model_id').append(`<option value="${data.model_id}">${data.model_name}</option>`);
          });
        }
      });
    }
  </script>
</body>

</html>