<?php
session_start();
if ($_SESSION['user_id'] == "") {
  echo "Please Login!";
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project_2";

// Create connection
$objCon = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($objCon->connect_error) {
  die("Connection failed: " . $objCon->connect_error);
}

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
$strSQL = "SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "' ";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Student</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <!-- ตัวติดตั้ง Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/2aba01f14f.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="../assets/img/favicons/IS.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../assets/img/favicons/IS.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="../assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="../assets/img/favicons/IS.png">
  <meta name="theme-color" content="#7952b3">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    body {
      font-size: .875rem;
    }

    .feather {
      width: 16px;
      height: 16px;
      vertical-align: text-bottom;
    }

    /*
    * Sidebar
    */

    .sidebar {
      position: fixed;
      top: 0;
      /* rtl:raw:
      right: 0;
      */
      bottom: 0;
      /* rtl:remove */
      left: 0;
      z-index: 100;
      /* Behind the navbar */
      padding: 48px 0 0;
      /* Height of navbar */
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
      .sidebar {
        top: 5rem;
      }
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: .5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link .feather {
      margin-right: 4px;
      color: #727272;
    }

    .sidebar .nav-link.active {
      color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
      color: inherit;
    }

    .sidebar-heading {
      font-size: .75rem;
      text-transform: uppercase;
    }

    /*
    * Navbar
    */

    .bg-purple {
      background-color: rgb(71, 6, 68);
    }

    .navbar-brand {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: 1rem;
      background-color: rgb(71, 6, 68);
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
      top: .25rem;
      right: 1rem;
    }

    .navbar .form-control {
      padding: .75rem 1rem;
      border-width: 0;
      border-radius: 0;
    }

    .form-control-dark {
      color: #fff;
      background-color: rgba(255, 255, 255, .1);
      border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
      border-color: transparent;
      box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }
  </style>


  <!-- Custom styles for this template -->

</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-purple flex-md-nowrap p-0 shadow" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ผู้ดูแลระบบ</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav me-auto mb-2 mb-md-0">

    </ul>
    <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item text-nowrap">
          <a class="nav-link"><?php echo $objResult["user"]; ?></a>
        </li>
      </ul>
    </form>

    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../logout.php">Sign out</a>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page">
                <span data-feather="users"></span>
                เมนูหลัก
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                </svg>
                ย้อนกลับ
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">ข้อมูลนักศึกษา</h1>
        </div>
        <div class="table-responsive">
          <form class="d-flex" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <div class="input-group">
              <tr>
                <!-- input ค้นหา -->
                <input class="form-control" type="search" name="txtSearch" id="search" placeholder="Search" aria-label="Search" value="<?php echo $strKeyword; ?>">
                <div class="input-group-append"></div>
                <button class="input-group-text fas fa-search-plus fa-1x" name="Search" type="submit" value="Search"></button>
                <a class="btn btn-success" name="Add" href="add_student.php"><i class="fas fa-plus"></i></a>
              </tr>
            </div>
          </form>
          <!-- ตารางฐานข้อมูลนักศึกษา -->
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">รหัสประจำตัวนักศึกษา</th>
                <th scope="col">ชื่อ - นามสกุล</th>
                <th scope="col">คณะ</th>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">แขนงวิชา</th>
                <th scope="col">กลุ่ม</th>
                <th scope="col">อาจารย์ที่ปรึกษา</th>
                <th scope="col">เบอร์โทรศัพท์</th>
                <th scope="col">รหัสผ่าน</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM student INNER JOIN user ON user.User_ID = student.Student_ID INNER JOIN teacher ON teacher.Teacher_ID = student.Teacher_ID WHERE student.Student_ID LIKE '%" . $strKeyword . "%' ";
              $result = $objCon->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <th scope="row"><?php echo $row["Student_ID"]; ?></th>
                    <td><?php echo $row["Student_Name"]; ?></td>
                    <td><?php echo $row["Faculty"]; ?></td>
                    <td><?php echo $row["Brand"]; ?></td>
                    <td><?php echo $row["Field_of_Study"]; ?></td>
                    <td><?php echo $row["Student_Group"]; ?></td>
                    <td><?php echo $row["Teacher_Name"]; ?></td>
                    <td><?php echo $row["Phone"]; ?></td>
                    <td><?php echo $row["Password"]; ?></td>
                    <td>
                      <a href="detail_student.php?Student_ID=<?php echo $row["Student_ID"]; ?>" class="bg btn-info btn-sm"><i class="fas fa-eye"></i></a> |
                      <a href="edit_student.php?Student_ID=<?php echo $row["Student_ID"]; ?>" class="bg btn-warning btn-sm"><i class="fas fa-edit"></i></a> |
                      <a href="delete_student.php?Student_ID=<?php echo $row['Student_ID']; ?>" class="del-btn bg btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
              <?php
                } //while condition closing bracket
              }  //if condition closing bracket
              ?>
            </tbody>
          </table>
          <!-- ตารางฐานข้อมูลนักศึกษา -->
          <?php
          if (isset($_GET['m'])) { ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
          <?php } ?>
        </div>
      </main>
    </div>
  </div>
  <script>
    $('.del-btn').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: 'คุณจะไม่สามารถเปลี่ยนกลับได้!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    })

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'success',
        title: 'ลบข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 2000
      }).then((result) => {
        if (result.isDismissed) {
          window.location.href = 'student.php';
        }
      })
    }
  </script>
</body>

</html>