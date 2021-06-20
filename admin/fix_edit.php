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
      <a href="admin.php?use=fix" style="text-decoration: none;">
        <button class="btn btn-warning btn-block">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
          กลับ
        </button>
      </a>
    </div>
    <?php
    if ($_GET) {
      $id = $_GET['id'];
    ?>
      <div class="col-9">
        <center>
          <h2 class="mb-5">แก้ไขรูปภาพการซ่อม</h2>
          <div style="width: 70%;" class="mb-3 mt-3">
            <div class="row">
              <input type="text" name="repair_id" id="repair_id" hidden value="<?php echo $id; ?>" />
              <div class="col-8">
                <input id="file" name="file" type="file" class="form-control-file" required>
              </div>
              <div class="col-4">
                <button onclick="uploadImage()" class="btn btn-primary" id="btn_upload" name="btn_upload" type="button">
                  อัปโหลดรูปภาพก่อนซ่อม
                </button>
              </div>
            </div>
            <div class="row p-5">
              <table id="image_list" class="table">
              </table>
            </div>
          </div>
          <div style="width: 70%;" class="mb-3 mt-3">
            <div class="row">
              <div class="col-8">
                <input id="file2" name="file" type="file" class="form-control-file" required>
              </div>
              <div class="col-4">
                <button onclick="uploadImage2()" class="btn btn-primary" id="btn_upload" name="btn_upload2" type="button">
                  อัปโหลดรูปภาพหลังซ่อม
                </button>
              </div>
            </div>
            <div class="row p-5">
              <table id="image_list2" class="table">
              </table>
            </div>
          </div>
          <button class="btn btn-primary" type="button" onclick="editImageRepair()">
            บันทึก
          </button>
        </center>
      </div>
    <?php
    }
    ?>
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

  var listImage2 = new Array();

  var image_list = $("#image_list");
  var image_list2 = $('#image_list2');

  $(document).ready(function() {
    let repair_id = $('#repair_id').val();
    $.ajax({
      url: 'query/get_all_image_repair.php',
      type: 'post',
      data: {
        'repair_id': repair_id
      },
      dataType: 'json',
      success: function(result) {
        result.forEach((data) => {
          console.log(data.type_img);
          if (data.type_img == 0) {
            listImage.push(data.Img_detail);
            image_list.append(`
                            <tr>
                                <td>
                                    <img src="upload/${data.Img_detail}" style="width: 150px;"> 
                                </td>    
                                <td>
                                    <button class="btn btn-danger" onclick="deleteImage('${data.Img_detail}')">
                                        ลบ 
                                    </button>
                                </td>
                            </tr>
                        `);
          } else {
            listImage2.push(data.Img_detail);
            image_list2.append(`
                            <tr>
                                <td>
                                    <img src="upload/${data.Img_detail}" style="width: 150px;"> 
                                </td>    
                                <td>
                                    <button class="btn btn-danger" onclick="deleteImage2('${data.Img_detail}')">
                                        ลบ 
                                    </button>
                                </td>
                            </tr>
                        `);
          }
        });
      }
    });
  });

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


  async function uploadImage2() {
    var fd = new FormData();
    var files = $('#file2')[0].files;
    if (files.length > 0) {
      fd.append('file', files[0]);
      $.ajax({
        url: 'upload_image.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          image_list2.empty();
          listImage2.push(response);
          listImage2.forEach((response) => {
            image_list2.append(`
                        <tr id="${response}" name="${response}">
                            <td>
                                <img src="upload/${response}" style="width: 150px;">
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage2('${response}')">ลบ</button>
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
    listImage.forEach((data) => {
      image_list.append(`
                        <tr>
                            <td>
                                <img src="upload/${data}" style="width: 150px;"> 
                            </td>    
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage('${data}')">
                                    ลบ 
                                </button>
                            </td>
                        </tr>
                    `);
    });
  }

  function deleteImage2(data) {
    listImage2 = listImage2.filter((value) => value != data);
    image_list2.empty();
    listImage2.forEach((data) => {
      image_list2.append(`
                        <tr>
                            <td>
                                <img src="upload/${data}" style="width: 150px;"> 
                            </td>    
                            <td>
                                <button class="btn btn-danger" onclick="deleteImage('${data}')">
                                    ลบ 
                                </button>
                            </td>
                        </tr>
                    `);
    });
  }

  function editImageRepair() {
    let repair_id = $('#repair_id').val();
    $.ajax({
      url: 'query/delete_image_repair.php',
      type: 'post',
      data: {
        'repair_id': repair_id
      },
      success: function(response) {
        if (response) {
          listImage.forEach((value) => {
            addImage(value, repair_id, 0);
          });
          listImage2.forEach((value) => {
            addImage(value, repair_id, 1);
          });
          setTimeout(function() {
            window.location.replace('admin.php?use=fix');
          }, 300);
        }
      }
    });
  }

  async function addImage(image, repair_id, type) {
    await $.ajax({
      url: 'query/add_image_repair.php',
      type: 'post',
      /*
      $id = $_POST['repair_id'];
      $type = $_POST['type'];
      $Img_detail = $_POST['Img_detail'];
      */
      data: {
        'repair_id': repair_id,
        'type': type,
        'Img_detail': image
      },
      success: function(response) {
        console.log(response);
      }
    });
  }
</script>