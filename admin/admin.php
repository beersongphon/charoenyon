<!doctype html>
<html lang="en">
<?php
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
      <?php include('./sidebar.php'); ?>
    </div>
    <div class="col-9">
      <?php
      if ($_GET) {
        switch ($_GET['use']) {
          case 'customer':
            include('./customers.php');
            break;
          case 'part':
            include('./parts.php');
            break;
          case 'car':
            include('./cars.php');
            break;
          case 'insurance':
            include('./insurance.php');
            break;
          case 'paint':
            include('./paint.php');
            break;
          case 'create_report':
            include('./report_create.php');
            break;
          case 'report':
            include('./report.php');
            break;
          case 'review':
            include('./review.php');
            break;
          case 'fix':
            include('./fix.php');
            break;
          default:
            echo 'none have anything to do';
            break;
        }
      }
      ?>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>