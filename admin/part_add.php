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
      <a href="admin.php?use=part" style="text-decoration: none;">
        <button class="btn btn-warning btn-block">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
          กลับ
        </button>
      </a>
    </div>
    <div class="col-9">
      <center>
        <h2 class="mb-5">เพิ่มรายการอะไหล่</h2>
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
            <label>ชื่อ</label>
            <input class="form-control" id="parts_name" name="parts_name" type="text" placeholder="กรอกชื่ออะไหล่" required>
          </div>
          <div class="form-group">
            <label>ราคา</label>
            <input class="form-control" id="parts_price" name="parts_price" type="number" placeholder="กรอกราคาต่อชิ้น" required>
          </div>
          <div class="form-group">
            <label for="type">บริษัท</label>
            <select class="form-control" id="company_parts_id" name="company_parts_id" required>
              <?php
              $sql = "SELECT * FROM company_parts";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
              ?>
                <option value="<?php echo $row["company_parts_id"]; ?>">
                  <?php echo $row["company_name"]; ?>
                </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>ช่วงปี</label>
            <select id="parts_year" name="parts_year" class="form-control" required>
              <option value="1990-1995">1990-1995</option>
              <option value="1996-2000">1996-2000</option>
              <option value="2001-2006">2001-2006</option>
              <option value="2007-2010">2007-2010</option>
              <option value="2011-2016">2011-2016</option>
              <option value="2017-2021">2017-2021</option>
              <option value="2022-2025">2022-2025</option>
            </select>
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
          console.log(response);
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
    let parts_name = $('#parts_name').val();
    let parts_price = $('#parts_price').val();
    let company_parts_id = $('#company_parts_id').val();
    let model_id = $('#model_id').val();
    let parts_year = $('#parts_year').val();

    $.ajax({
      url: 'query/add_auto_part.php',
      type: 'post',
      data: {
        'parts_name': parts_name,
        'parts_price': parts_price,
        'company_parts_id': company_parts_id,
        'model_id': model_id,
        'parts_year': parts_year
      },
      success: function(response) {
        console.log(response);
        let parts_id = response;
        listImage.forEach((image) => {
          $.ajax({
            url: 'query/add_image_auto_part.php',
            type: 'post',
            data: {
              'Img': image,
              'parts_id': parts_id
            },
            success: function(response) {
              console.log(response);
            }
          });
        });
        setTimeout(function() {
          window.location.replace('admin.php?use=part');
        }, 300);
      }
    });
  }
</script>