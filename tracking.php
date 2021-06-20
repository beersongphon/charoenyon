<!doctype html>
<html lang="en">
<?php
include('./connection/connection.php');
$track = $_GET['track'];
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
      color: #000;
      overflow-x: hidden;
      height: 100%;
      background-repeat: no-repeat;
      font-family: 'Athiti', sans-serif;
    }

    .card {
      z-index: 0;
      background-color: #ECEFF1;
      padding-bottom: 20px;
      margin-top: 90px;
      margin-bottom: 90px;
      border-radius: 10px
    }

    .top {
      padding-top: 40px;
      padding-left: 13% !important;
      padding-right: 13% !important
    }

    #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      color: #455A64;
      padding-left: 0px;
      margin-top: 30px
    }

    #progressbar li {
      list-style-type: none;
      font-size: 13px;
      width: 25%;
      float: left;
      position: relative;
      font-weight: 400
    }

    #progressbar .step0:before {
      font-family: FontAwesome;
      content: "\f10c";
      color: #fff
    }

    #progressbar li:before {
      width: 40px;
      height: 40px;
      line-height: 45px;
      display: block;
      font-size: 20px;
      background: #C5CAE9;
      border-radius: 50%;
      margin: auto;
      padding: 0px
    }

    #progressbar li:after {
      content: '';
      width: 100%;
      height: 12px;
      background: #C5CAE9;
      position: absolute;
      left: 0;
      top: 16px;
      z-index: -1
    }

    #progressbar li:last-child:after {
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      position: absolute;
      left: -50%
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {
      left: -50%
    }

    #progressbar li:first-child:after {
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
      position: absolute;
      left: 50%
    }

    #progressbar li:last-child:after {
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px
    }

    #progressbar li:first-child:after {
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
      background: #651FFF
    }

    #progressbar li.active:before {
      font-family: FontAwesome;
      content: "\f00c"
    }

    .icon {
      width: 60px;
      height: 60px;
      margin-right: 15px
    }

    .icon-content {
      padding-bottom: 20px
    }

    @media screen and (max-width: 992px) {
      .icon-content {
        width: 50%
      }
    }
  </style>
</head>

<body class="bg-warning">
  <?php include('./navbar.php'); ?>
  <!-- body -->
  <div class="container mt-5 mb-5">
    <!-- check tracking number -->
    <div class="container px-1 px-md-4 py-5 mx-auto">
      <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
          <div class="d-flex">
            <h5>เลขตัวถัง <span class="text-primary font-weight-bold"><?php echo $track; ?></span></h5>
          </div>
          <div class="d-flex flex-column text-sm-right">
          </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
          <?php
          $sql = "SELECT 
                            car.vin,
                            car.model_id,
                            car.gear_id,
                            car.status_id,
                            status.status_detail as status,
                            gear.gear_detail,
                            car.car_registration,
                            car.model_year,
                            car.color,
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
                        WHERE car.vin = '" . $track . "'";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            switch ($row['status']) {
              case 'นำรถเข้าอู่ซ่อม':
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="active step0"></li>
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
              case 'ดำเนินการซ่อม':
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
              case 'ตรวจสอบรถยนต์':
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
              case 'รับรถยนต์เรียบร้อย':
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
              case 'เสร็จสิ้น':
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                                <li class="active step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
              default:
                echo '
                                        <div class="col-12">
                                            <ul id="progressbar" class="text-center">
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                                <li class="step0"></li>
                                            </ul>
                                        </div>
                                    ';
                break;
            }
          }
          ?>
        </div>
        <div class="row justify-content-between top">
          <div class="row d-flex icon-content">
            <i class="fa fa-handshake-o" aria-hidden="true" style="font-size: 50px; margin-right: 10px;"></i>
            <div class="d-flex flex-column">
              <p class="font-weight-bold">นำรถเข้าอู่ซ่อม</p>
            </div>
          </div>
          <div class="row d-flex icon-content">
            <i class="fa fa-wrench" aria-hidden="true" style="font-size: 50px; margin-right: 10px;"></i>
            <div class="d-flex flex-column">
              <p class="font-weight-bold">ดำเนินการซ่อม</p>
            </div>
          </div>
          <div class="row d-flex icon-content">
            <i class="fa fa-search" aria-hidden="true" style="font-size: 50px; margin-right: 10px;"></i>
            <div class="d-flex flex-column">
              <p class="font-weight-bold">ตรวจสอบรถยนต์</p>
            </div>
          </div>
          <div class="row d-flex icon-content">
            <i class="fa fa-car" aria-hidden="true" style="font-size: 50px; margin-right: 10px;"></i>
            <div class="d-flex flex-column">
              <p class="font-weight-bold">รับรถยนต์เรียบร้อย</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>