<div class="information">
        <div class="contact">
            <p>Đặng Thanh Hiếu</p>
        </div>
        <div class="guide">
            <ul class="list">

                <li><a href="#" >Liên Hệ</a></li>
                <li><a href="#" >Hướng Dẫn Mua Hàng</a></li>
                <li><a href="#" >Giới Thiệu</a></li>
                <?php if(isset($_SESSION['dangnhapclient'])) {

                  ?>

                  <!-- <li  ><a style="color:red; font-weight:bold;font-size: inherit"><?php echo $_SESSION['dangnhapclient']; ?></a></li>
                  <li  ><a href="donhang?id=<?php echo $_SESSION['userid'] ?>" style="color:red; font-weight:bold;font-size: inherit">Đơn hàng của bạn</a></li>
                  <li  ><a href="?login=dangxuat" style="color:blue; text-decoration:underline; font-size: inherit">LogOut</a></li> -->
                  <li class="dropdow">Xin chào: <?php echo $_SESSION['dangnhapclient']; ?>
                      <div class="dropdow-content">
                        <a href="?login=dangxuat">Log Out</a>
                        <a href="donhang.php?id=<?php echo $_SESSION['userid'] ?>">Đơn hàng của bạn</a>
                        <a href="thongtinkhachhang.php?id=<?php echo $_SESSION['userid'] ?>">Cập nhật thông tin</a>
                      </div>
                  </li>
                  <?php
                }
                  else {
                  ?><li ><a id="resister">Đăng Ký</a></li>
                  <li  ><a  id="login">Đăng Nhập</a></li>


                  <?php
                  }
                 ?>


            </ul>
        </div>
    </div>
    <div class="header">

        <div class="Avatar">
            <a href="index.php"><img src="public/img/logo.PNG" alt=""></a>
        </div>
        <div class="nav" >
            <ul class="menu">
            <?php
                $sql_loaisanpham = mysqli_query($conn,"SELECT * from loaisanpham ORDER BY maloai DESC ");
                while($row_loaisanpham = mysqli_fetch_array($sql_loaisanpham)){
            ?>
                <li class="has-submenu"><a href="sanphamdanhmuc.php?quanly=danhmuc&danhmucid=<?php echo $row_loaisanpham['maloai'] ?>"><?php echo $row_loaisanpham['tenloai'] ?></a>
                </li>
            <?php
                }
            ?>
              <li class="has-submenu">
                <form class="form-search" action="timkiem.php" method="post">
                  <input type="search" name="serchproduct" placeholder="search">
                  <button type="submit" name="btnsearch" >search</button>
                </form>
              </li>
                <li class="has-submenu">
					<a href="cart.php" ><i class="fas fa-shopping-cart"></i></a>
				</li>
            </ul>
        </div>
    </div>
