<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="../public/images/logo_o.png" width="80px" class="rounded" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if (isset($_SESSION['user'])) {
      ?>
        <a href="logout.php">
          <button class="btn btn-outline-danger my-2 my-sm-0" type="button">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            ออกจากระบบ
          </button>
        </a>
      <?php

      } ?>
    </form>
  </div>
</nav>