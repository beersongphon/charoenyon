<!doctype html>
<html lang="en">
<?php
include("../connection/connection.php");
session_start();
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
      <input type="text" id="user_id" name="user_id" hidden value="<?php echo $_SESSION['user_id']; ?>">
      <a href="admin.php?use=review" style="text-decoration: none;">
        <button class="btn btn-warning btn-block">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
          กลับ
        </button>
      </a>
    </div>
    <div class="col-9">
      <center>
        <h2 class="mb-5">เพิ่มผลงาน</h2>
        <div style="width: 50%;" class="mb-3 mt-3">
          <div class="row">
            <div class="col-8">
              <input id="file" name="file" type="file" class="form-control-file" required>
            </div>
            <div class="col-4">
              <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                อัปโหลดรูปภาพ
              </button>
            </div>
          </div>
          <div class="row p-5">
            <table id="image_list" class="table"></table>
          </div>
        </div>
        <form method="POST" action="" enctype="multipart/form-data" style="width:50%; text-align: left;">
          <div class="form-group">
            <label for="type">การซ่อม</label>
            <select class="form-control" id="repair_id" name="repair_id" required>
              <?php
              $sql = "SELECT
                                    car_repir.repair_id,
                                    car_repir.vin,
                                    car.model_id,
                                    car.car_registration,
                                    CONCAT(customer.firstname ,' ' ,customer.lastname) as customer_name,
                                    car_model.model_name,
                                    car_brand.brand_name 
                                    FROM car_repir
                                    INNER JOIN car
                                    ON car_repir.vin = car.vin
                                    INNER JOIN customer
                                    ON car.cus_id = customer.cus_id
                                    INNER JOIN car_model
                                    ON car.model_id = car_model.model_id
                                    INNER JOIN car_brand
                                    ON car_model.brand_id = car_brand.brand_id
                                    ";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                $checkReviewSQL = "SELECT * FROM review INNER JOIN car_repir ON review.repair_id = " . $row['repari_id'];
                $haveSomeReview = $conn->query($checkReviewSQL);
                if ($haveSomeReview->num_rows == 0) {
              ?>
                  <option value="<?php echo $row["repair_id"]; ?>">
                    <?php echo $row['car_registration'], ' : ', $row['brand_name'], '[', $row['model_name'], '] ', $row["customer_name"]; ?>
                  </option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <button class="btn btn-primary btn-block" type="button" onclick="createAutoPart()">
            ยืนยัน
          </button>
        </form>
      </center>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<script>
  var listImage = new Array();
  var image_list = $("#image_list");
  var upload = $("#btn_upload");
  var model_list = $("#model_id");

  async function uploadImage() {
    var fd = new FormData();
    var files = $('#file')[0].files;
    if (files.length > 0) {
      fd.append('file', files[0]);
      $.ajax({
        url: 'upload_image.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          image_list.empty();
          listImage.push(response);
          listImage.forEach((response) => {
            image_list.append(`
                        <tr id="${response}" name="${response}">
                            <td>
                                <img src="upload/${response}" style="width: 150px;">
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage('${response}')">ลบ</button>
                            </td>
                        </tr>`);
          });
        }
      });
    }
  }

  function deleteImage(data) {
    listImage = listImage.filter((value) => value != data);
    image_list.empty();
    listImage.forEach((response) => {
      image_list.append(`<tr id="${response}" name="${response}"><td><img src="upload/${response}" style="width: 150px;"></td><td><button class="btn btn-danger" onclick="deleteImage('${response}')">ลบ</button></td></tr>`);
    });
  }

  function createAutoPart() {
    let repair_id = $('#repair_id').val();
    let user_id = $('#user_id').val();
    console.log(`debug userid = ${user_id}`);
    $.ajax({
      url: 'query/add_review.php',
      type: 'post',
      data: {
        'repair_id': repair_id,
        'user_id': user_id
      },
      success: function(response) {
        let review_id = response;
        console.log(`review_id = ${response}`);
        listImage.forEach((image) => {
          $.ajax({
            url: 'query/add_image_review.php',
            type: 'post',
            data: {
              'Img_review': image,
              'review_id': review_id
            },
            success: function(response) {
              console.log(response);
            }
          });
        });

        setTimeout(function() {
          window.location.replace('admin.php?use=review');
        }, 500);

      }
    });
  }
</script>