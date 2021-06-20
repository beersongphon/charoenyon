<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  <div class="container mt-5 mb-5">
    <!-- check tracking number -->
    <center class="mb-5">
      <div style="height: 50px; width:700px;" class="rounded bg-warning mb-2 p-2">
        <h3>สถานะรถ</h3>
      </div>
      <form style="width:700px;" class="border border-light rounded p-4 bg-light" method="get" action="tracking.php">
        <div class="form-gorup">
          <div style="width:100%; text-align: left;">
            <label for="search">
              <h4>กรุณากรอกข้อมูลรหัสสถานะรถ</h4>
            </label>
          </div>
          <input type="text" name="track" class="form-control" placeholder="รหัสสถานะรถ" />
          <div style="text-align: left;">
            <button class="btn btn-warning mt-5">
              ตรวจสอบ
            </button>
          </div>
        </div>
      </form>
    </center>
    <div class="row mb-5" id="about" name="about">
      <div class="col-12 mb-5" style="text-align: center;">
        <h3>เกี่ยวกับ อู่ ส.เจริญยนต์</h3>
        <h4 class="text-warning">" การดูแลใส่ใจทุกรายละเอียด "</h4>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div style="text-align: center;" class="mb-4">
          <i class="fa fa-desktop text-dark" style="font-size:4em;"></i>
        </div>
        <b>การใช้งาน</b>
        <p class="mt-2">
          การเข้าใช้งานง่ายๆได้ผ่านทางเว็บไซต์ ง่ายต่อการค้นหาสถานะการซ่อมรถของคุณโดยไม่้องสมัครสมาชิก
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div style="text-align: center;" class="mb-4">
          <i class="fa fa-heart text-dark" style="font-size:4em;"></i>
        </div>
        <b>การบริการลูกค้า</b>
        <p class="mt-2">
          การบริการให้กับลูกค้าทั้งก่อนและหลังการซ่อมรถ ซึ่งช่วยให้ลูกค้าได้รับประสบการณ์ที่ดีในการใช้บริการจากทางทีมงาน
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div style="text-align: center;" class="mb-4">
          <i class="fa fa-gear text-dark" style="font-size:4em;"></i>
        </div>
        <b>การซ่อมรถ</b>
        <p class="mt-2">
          เปลี่ยนอะไหล่ ชิ้นส่วนต่างๆ การพ่นสีก็ต้องพิธีพิถันและปราณีตใช้สีที่มีคุณภาพสูง ซึ่งมีช่างที่ชำนาญและใส่ใจให้ความสำคัญทุกขั้นตอน
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div style="text-align: center;" class="mb-4">
          <i class="fa fa-bell text-dark" style="font-size:4em;"></i>
        </div>
        <b>การใส่ใจเวลา</b>
        <p class="mt-2">
          เวลาเป็นสิ่งสำคัญที่สุดในการให้บริการ ทั้งตรวจเช็คสถานะรถและการทำงานในการซ่อมรถ เพื่อให้ลูกเกิดความงพอใจสูงสุด
        </p>
      </div>
    </div>
  </div>
  <div class="bg-light mb-3" name="work">
    <div class="row p-2">
      <div class="col-sm-12 col-md-4 col-lg-4">
        <center class="pt-5 pl-5">
          <h4 style="font-size: 2.5em;">การทำงานของอู่ซ่อมรถ ส.เจริญยนต์</h4>
          <p style="font-size: 1.5em;">
            ความเสียหายต่อรถยนต์ กรณีเกิดการชนกับพาหนะทางบก ชนะแบบไม่มีคู่กรณี ความเสียหายต่อรถยนต์ เนื่องจากอุบัติเหตุอื่นๆ
          </p>
        </center>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8" style="text-align: center;">
        <img src="./public/images/pic1.jpg" style="width: 50%" />
      </div>
    </div>
  </div>

  <div class="mb-5" id="work">
    <div class="w3-container" style="padding:80px 10px" id="work">
      <h3 class="w3-center">ขั้นตอนการทำงาน</h3>
      <p class="w3-center w3-large">มี 4 ขั้นตอนการทำงาน</p>

      <div class="w3-row-padding" style="margin: top 20px;">
        <div class="w3-col l3 m6">
          <img src="./public/images/นำรถเข้าซ่อม.png" style="width: 100%" onclick="onClick(this)" class="w3-hover-opacity" alt="นำรถเข้าอู่ซ่อม">
        </div>
        <div class="w3-col l3 m6">
          <img src="./public/images/ดำเนินการซ่อม.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="ดำเนินการซ่อม ">
        </div>
        <div class="w3-col l3 m6">
          <img src="./public/images/ตรวจสอบรถยนต์.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="ตรวจสอบรถยนต์">
        </div>
        <div class="w3-col l3 m6">
          <img src="./public/images/รับรถเรียบร้อยแล้ว.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="รับรถยนต์เรียบร้อยแล้ว">
        </div>
      </div>
    </div>
    <div class="w3-container w3-light-grey w3-padding-64">
      <div class="w3-row-padding">
        <div class="w3-col m6">
          <h3>ขั้นตอนการทำงาน</h3>
          <p><i class="fa fa-circle"></i> ขั้นตอนแรกรถอยู่ระหว่างการซ่อม นำรถเข้าอู่เพื่อตรวจเช็คสภาพ ความเสียหาย
          </p>
          <p><i class="fa fa-circle"></i> ขั้นตอนที่สอง เลือกอะไหล่รถยนต์หรือพ้นสีรถยนต์ ดำเนินการซ่อมรถยนต์<br>
          </p>
          <p><i class="fa fa-circle"></i> ขั้นตอนที่สาม ตรวจเช็คการซ่อมรถยนต์ที่ได้ทำการซ่อมเสร็จเรียบร้อยแล้ว<br>
          </p>
          <p> <i class="fa fa-circle"></i> ขั้นตอนที่สี่ เป็นการที่ลูกค้านำรถยนต์ออกจากอู่ ส.เจริญยนต์ เรียบร้อยแล้ว<br>
          </p>
        </div>
        <div class="w3-col m6">
          <p class="w3-wide"><i class="fa fa-automobile w3-margin-right"></i>นำรถเข้าอู่ซ่อม</p>
          <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-center" style="width:1%">1%</div>
          </div>
          <p class="w3-wide"><i class="fa fa-cogs w3-margin-right"></i>ดำเนินการซ่อม</p>
          <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-center" style="width:60%">60%</div>
          </div>
          <p class="w3-wide"><i class="fa fa-check-square-o w3-margin-right"></i>ตรวจสอบรถยนต์</p>
          <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-center" style="width:80%">80%</div>
          </div>
          <p class="w3-wide"><i class="fa fa-handshake-o w3-margin-right"></i>รับรถยนต์เรียบร้อย</p>
          <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-center" style="width:100%">100%</div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="p-5 mb-5" style="text-align: center;" id="insurance">
    <h2>บริษัทประกันภัย</h2>
    <p style="font-size: 1.5em;">ในกรณีที่รถมีความคุ้มครองประกันภัยรถยนต์</b>
      บริษัทประกันภัยเครือบางส่วน</p>
    <div class="row p-2">
      <div class="card col-2 mr-5">
        <img class="card-img-top" src="./public/images/มิตรแท้ประกันภัย.png">
        <div class="card-body">
          <div class="card-title" style="text-align: left; font-size: 1em;">
            บริษัท มิตรแท้ประกันภัย จำกัด (มหาชน)
          </div>
        </div>
      </div>
      <div class="card col-2 mr-5">
        <img class="card-img-top" src="./public/images/สินมั่นคงประกันภัย.png">
        <div class="card-body">
          <div class="card-title" style="text-align: left; font-size: 1em;">
            บริษัท สินมั่นคงประกันภัย จำกัด (มหาชน)
          </div>
        </div>
      </div>
      <div class="card col-2 mr-5">
        <img class="card-img-top" src="./public/images/ไทยวิวัฒน์ประกัน.png">
        <div class="card-body">
          <div class="card-title" style="text-align: left; font-size: 1em;">
            บมจ. ประกันภัยไทยวิวัฒน์
          </div>
        </div>
      </div>
      <div class="card col-2 mr-5">
        <img class="card-img-top" src="./public/images/ทิพยประกัน.png">
        <div class="card-body">
          <div class="card-title" style="text-align: left; font-size: 1em;">
            บริษัท ทิพยประกันภัย จำกัด (มหาชน)
          </div>
        </div>
      </div>
      <div class="card col-2 mr-5">
        <img class="card-img-top" src="./public/images/กรุงเทพประกัน.jpg">
        <div class="card-body">
          <div class="card-title" style="text-align: left; font-size: 1em;">
            บริษัท กรุงเทพประกันภัย จํากัด (มหาชน)
          </div>
        </div>
      </div>
    </div>
    <div class="bg-light p-2 mb-5" id="sample">
      <center class="mb-5 mt-5">
        <h2>ตัวอย่างผลงาน</h2>
      </center>
      <div class="row">
        <div class="col-4" style="text-align: center;">
          <img src="./public/images/รีวิว1.png">
        </div>
        <div class="col-4" style="text-align: center;">
          <img src="./public/images/รีวิว2.png">
        </div>
        <div class="col-4" style="text-align: center;">
          <img src="./public/images/รีวิว3.png">
        </div>
      </div>
    </div>
    <div id="contract" style="text-align: center;" class="p-5">
      <h1>ช่องทางการติดต่อ</h1>
      <div style="width: 50%; text-align: left;">
        <div class="ml-4 mb-5">
          <i class="fa fa-facebook-official" aria-hidden="true" style="font-size: 2.5em;"></i>
          <span style="font-size: 1.5em;">
            facebook : อู่ ส. เจริญยนต์ ช่างยัน สระบุรี
          </span>
        </div>
        <div class="ml-4 mb-5">
          <i class="fa fa-phone-square" aria-hidden="true" style="font-size: 2.5em;"></i>
          <span style="font-size: 1.5em;">
            โทร : 086-1253509
          </span>
        </div>
        <div class="ml-4 mb-5">
          <i class="fa fa-weixin" aria-hidden="true" style="font-size: 2.5em"></i>
          <span style="font-size: 1.5em;">
            Line : y-yoy2557
          </span>
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