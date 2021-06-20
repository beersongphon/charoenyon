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
      <a href="admin.php?use=wage" style="text-decoration: none;">
        <button class="btn btn-warning btn-block">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
          กลับ
        </button>
      </a>
    </div>
    <div class="col-9">
      <center>
        <h2>เพิ่มค่าแรง</h2>
        <form method="POST" action="" style="width:50%; text-align: left;">
          <div class="form-group">
            <label>รายละเอียด</label>
            <textarea name="wage_detail" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label>ค่าแรง</label>
            <input class="form-control" name="wage_price" type="number" placeholder="กรอกค่าแรง" required>
          </div>
          <button class="btn btn-primary btn-block" type="submit">
            ยืนยัน
          </button>
        </form>
      </center>
    </div>
    <?php
    if ($_POST) {
      $wage_detail = $_POST['wage_detail'];
      $wage_price = $_POST['wage_price'];
      $sql = "SELECT * FROM wage";
      $result = $conn->query($sql);
      $sql = "INSERT INTO wage (wage_id, wage_detail, wage_price) 
                    VALUES (
                        " . ($result->num_rows + 1) . ",
                        '" . $wage_detail . "',
                        " . $wage_price . "
                    )";
      $result = $conn->query($sql);
      if ($result == TRUE) {
        echo "<script>
                        window.location.replace('admin.php?use=wage');
                    </script>";
      } else {
        echo "<script>alert('เกิดข้อผิดพลาด');</script>";
      }
    }
    ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>