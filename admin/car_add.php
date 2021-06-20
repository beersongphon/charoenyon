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
    <div class="col-9">
      <center>
        <h2>เพิ่มรถยนต์</h2>
        <form method="POST" action="" style="width:50%; text-align: left;">
          <div class="form-group">
            <label>เลขตัวถัง</label>
            <input class="form-control" name="vin" type="text" placeholder="กรอกเลขตัวถังรถยนต์" required>
          </div>
          <div class="form-group">
            <label>เลขทะเบียนรถยนต์</label>
            <input class="form-control" name="car_registration" type="text" placeholder="กรอกทะเบียนรถยนต์" required>
          </div>
          <div class="form-group">
            <label>ปี</label>
            <input class="form-control" name="model_year" type="number" placeholder="กรอกปี" required>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>ยี่ห้อ</label>
                <select name="brand_id" id="brand_id" class="form-control">
                  <?php
                  $sql = "SELECT * FROM car_brand";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row["brand_id"]; ?>">
                      <?php echo $row["brand_name"]; ?>
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
              <option value="ดำ">ดำ</option>
              <option value="ขาว">ขาว</option>
              <option value="ขาวมุก">ขาวมุก</option>
              <option value="ทอง">ทอง</option>
              <option value="เทา">เทา</option>
              <option value="แดง">แดง</option>
              <option value="น้ำเงิน">น้ำเงิน</option>
              <option value="เหลือง">เหลือง</option>
              <option value="ส้ม">ส้ม</option>
              <option value="เขียว">เขียว</option>
            </select>
          </div>

          <div class="form-group">
            <label>ประเภทรถ</label>
            <select name="car_type" class="form-control">
              <option value="เก๋งสองตอน">เก๋งสองตอน</option>
              <option value="รถยนต์สี่ประตู">รถยนต์สี่ประตู</option>
              <option value="Van">Van</option>
              <option value="กระบะ(ไม่มีหลังคา)">กระบะ(ไม่มีหลังคา)</option>
              <option value="กระบะ(มีหลังคา)">กระบะ(มีหลังคา)</option>
            </select>
          </div>

          <div class="form-group">
            <label>ประเภทเกียร</label>
            <select name="gear_id" class="form-control">
              <?php
              $sql = "SELECT * FROM gear";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
              ?>
                <option value="<?php echo $row["gear_id"]; ?>">
                  <?php echo $row["gear_detail"]; ?>
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
              while ($row = $result->fetch_assoc()) {
              ?>
                <option value="<?php echo $row["cus_id"]; ?>"><?php echo $row["firstname"], ' ', $row["lastname"], ' ', $row["address"]; ?></option>
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
    if ($_POST) {
      $vin = $_POST['vin'];
      $car_registration = $_POST['car_registration'];
      $model_year = $_POST['model_year'];
      $model_id = $_POST['model_id'];
      $cus_id = $_POST['cus_id'];
      $color = $_POST['color'];
      $car_type = $_POST['car_type'];
      $gear_id = $_POST['gear_id'];
      $sql = "INSERT INTO car (vin, cus_id, model_id , car_registration, model_year, color, car_type,gear_id) 
                    VALUES (
                        '" . $vin . "',
                        " . $cus_id . ",
                        " . $model_id . ",
                        '" . $car_registration . "',
                        " . $model_year . ",
                        '" . $color . "',
                        '" . $car_type . "',
                        " . $gear_id . "
                    )";
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