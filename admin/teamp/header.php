<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location: ../../admin.php');
    }
    if (isset($_GET['login'])){
      $dangxuat = $_GET['login'];
    }else{
      $dangxuat = '';
    }
    if($dangxuat == 'dangxuat'){
      session_destroy();
      header('Location: ../../admin.php');
    }
?>
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <a href="../quanlysanpham/danhsach.php" class="logo">Nice <span class="lite">Admin</span></a>

      <div class="nav search-row" id="top_menu">
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
      </div>

      <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
          <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $_SESSION['dangnhap'] ?></span>
                            <b class="caret"></b>
                        </a>

            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="?login=dangxuat"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
