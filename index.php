<?php
    session_start();
    include './DB/connect.php';
?>
<?php

	if (isset($_GET['add'])  ){
      $id = $_GET['add'];
	  echo $id;
	  $sql_sanpham ="select * from sanpham where masanpham = '".$id."'";
	  $query= mysqli_query($conn,$sql_sanpham);
	  $sanpham_cart = mysqli_fetch_array($query);
	  if (!isset($_SESSION['cart'][$id])){
		  $_SESSION['cart'][$id]['name'] = $sanpham_cart['tensanpham'];
		  $_SESSION['cart'][$id]['gia'] = $sanpham_cart['gia'];
		  $_SESSION['cart'][$id]['soluong'] = 1;
	  }else{
		  $_SESSION['cart'][$id]['soluong'] += 1;
	  }
	  echo"<script>alert('Thêm thành công');location.href='cart.php'</script>"; 
	}
	
    //login
    $error = array();
    if(isset($_POST["dangnhapclient"])){
        $useremail = $_POST["usernemail"];
        $userpassword=$_POST["userpassword"];
         $sql = "SELECT * FROM member WHERE useremail = '$useremail' and userpassword = '$userpassword' and level = 0 LIMIT 1 ";
			    $query = mysqli_query($conn,$sql);
			    $num_rows = mysqli_num_rows($query);
          $row_dangnhapclient = mysqli_fetch_array($query);
            if ($num_rows > 0) {
                  $_SESSION['dangnhapclient'] = $row_dangnhapclient['useremail'];
                  $_SESSION['userid'] = $row_dangnhapclient['userid'];
                  echo $_SESSION['userid'];
                  header('Location:index.php');
			      }else{
            $error['check'] = "tên đăng nhập hoặc mật khẩu không đúng !";
         }
    }
    if (isset($_POST["dangky"])) {
      $userid = uniqid();
  		$useremail = $_POST["txtemail"];
  		$userpassword = $_POST["txtpassword"];
  		$useraddress = $_POST["txtaddress"];
      $level = '0';
  	if ($useremail == "" || $userpassword == "" || $useraddress == "") {
		     echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
            $sql="select * from member where useremail='$useremail'";
            $kt=mysqli_query($conn, $sql);
            if(mysqli_num_rows($kt)  > 0){
                echo "Tài khoản đã tồn tại";
            }else{
                $sql = "INSERT INTO member (userid,userpassword,useraddress,useremail,level) VALUES ('$userid','$userpassword','$useraddress','$useremail','$level')";
                   mysqli_query($conn,$sql);
                   header('Location: index.php');
                   echo "Chúc mừng bạn đã đăng ký thành công";
            }
		}
    }
    //Log-out
    if (isset($_GET['login'])){
      $dangxuat = $_GET['login'];
    }else{
      $dangxuat = '';
    }
    if($dangxuat == 'dangxuat'){
      session_destroy();
      header('Location: index.php');
    }
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <?php include 'client/teamp/href.php' ?>
</head>
<body >
    <div id="apply">
        <div class="Nav-hamburger">
          <div class="Nav-hamburger-content" id="lostFormApply">
            <span class="Nav-hamburger-content-icon"></span>
            <span class="Nav-hamburger-content-icon"></span>
          </div>
        </div>
        <?php if(isset($error['check'])) {?>
            <span style="color:red" ><?php echo $error['check'] ?></span>
        <?php } ?>
        <h1>Login</h1>
        <form action="index.php" method="POST">
            <div class="inputBox">
                <input type="text" name="usernemail" required="">
                <label >Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="userpassword" required="">
                <label >Password</label>
                <input type="submit"  name="dangnhapclient" value="login">
            </div>
        </form>
    </div>
    <div id="establish">
        <div class="Nav-hamburger" id="lostFormResister">
          <div class="Nav-hamburger-content" >
            <span class="Nav-hamburger-content-icon"></span>
            <span class="Nav-hamburger-content-icon"></span>
          </div>
        </div>
        <?php if(isset($error['checkuseemail'])) {?>
            <span style="color:red" ><?php echo $error['checkuseemail'] ?></span>
        <?php } ?>
        <h1>Register</h1>
        <form action="index.php" method="POST">
          <div class="inputBox">
              <input type="text" id="txtemail" name="txtemail" required="">
              <label >Username</label>
          </div>
          <div class="inputBox">
              <input type="password" id="txtpassword" name="txtpassword" required="">
              <label >Password</label>
          </div>
          <div class="inputBox">
              <input type="text" id="txtaddress" name="txtaddress" required="">
              <label >Address</label>
              <input type="submit"  name="dangky" value="Register">
          </div>
        </form>
    </div>
    <!--start header-->
        <?php include 'client/teamp/header.php' ?>
    <!--end header-->
    <!--start slice-->
        <?php include 'client/teamp/slice.php' ?>
    <!--end slice-->
    <div class="container">
       <div class="item-title">
                 <h1>THỜI TRANG HOT NHẤT</h1>
                 <p>Danh sách sản phẩm thời trang nam được quan tâm nhiều nhất, trong bộ sưu tập thời trang tại shop</p>
        </div>

        <div class="item">
            <div class="item-product">
        <?php
            $sql_sanpham = mysqli_query($conn,"SELECT * from sanpham ORDER BY masanpham DESC ");
            while($row_sanpham = mysqli_fetch_array($sql_sanpham)){
        ?>
            <div class="wrapper">
                    <div class="box">
                        <div class="card">
                            <a href="chitietsanpham.php?quanly=sanpham&sanphamid=<?php echo $row_sanpham['masanpham'] ?> ">
                              <img name="hinh" src="../../public/upload/<?php echo $row_sanpham['hinh'] ?>" >
                            </a>
                            <p class="name"><a name="tensanpham" href="#"><?php echo $row_sanpham['tensanpham'] ?></a></p>
                            <p class="price" name="">
                              <?php echo number_format($row_sanpham['gia']). 'vnđ'?>
							  <?php if(!isset($row_sanpham['khuyenmai'])){?>
								  <span class="price-cell"></span>
							  <?php } 
									else{
							  ?>
                              <span class="price-cell">
                                <?php echo number_format($row_sanpham['khuyenmai']). 'vnđ'?>
                              </span>
									<?php }?>
                            </p>
                            <p class="addtocart">
							
								
                              <a type="submit"
                                 name="themgiohang"
                                 href="index.php?&add=<?php echo $row_sanpham['masanpham'] ?>">
                                Add To Cart
                              </a>
                            </p>
                        </div>
                    </div>
            </div>
        <?php
            }
        ?>
        </div>

        <div class="category">
            <div class="category-1">
                <img src="public/img/category1.PNG" alt="">
            </div>
            <div class="category-2">
                <div class="category-2-top">
                    <img src="public/img/category2.PNG" alt="">
                </div>
                <div class="category-2-botom">
                    <img src="public/img/category3.PNG" alt="">
                </div>
            </div>
            <div class="category-3">
                <img src="public/img/catelory4.PNG" alt="">
            </div>
        </div>

        <div class="item-title">
                 <h1>THỜI TRANG MỚI NHẤT</h1>
                 <p>Danh sách sản phẩm thời trang nam mới nhất được cập nhật tại shop</p>
        </div>
        <div class="item">
            <div class="item-product">
                <?php
					$sql_sanpham = mysqli_query($conn,"SELECT * from sanpham ORDER BY masanpham DESC ");
					while($row_sanpham = mysqli_fetch_array($sql_sanpham)){
				?>
					<div class="wrapper">
							<div class="box">
								<div class="card">
									<a href="chitietsanpham.php?quanly=sanpham&sanphamid=<?php echo $row_sanpham['masanpham'] ?> ">
									  <img name="hinh" src="../../public/upload/<?php echo $row_sanpham['hinh'] ?>" >
									</a>
									<p class="name"><a name="tensanpham" href="#"><?php echo $row_sanpham['tensanpham'] ?></a></p>
									<p class="price" name="">
									  <?php echo number_format($row_sanpham['gia']). 'vnđ'?>
									  <?php if(!isset($row_sanpham['khuyenmai'])){?>
										  <span class="price-cell"></span>
									  <?php } 
											else{
									  ?>
									  <span class="price-cell">
										<?php echo number_format($row_sanpham['khuyenmai']). 'vnđ'?>
									  </span>
											<?php }?>
									</p>
									<p class="addtocart">
									
										
									  <a type="submit"
										 name="themgiohang"
										 href="index.php?&add=<?php echo $row_sanpham['masanpham'] ?>">
										Add To Cart
									  </a>
									</p>
								</div>
							</div>
					</div>
				<?php
					}
				?>
            </div>
        </div>
    </div>
    <!--end container-->
    <!--start footer-->
        <?php include 'client/teamp/footer.php' ?>
    <!--end footer-->
        <?php include 'client/teamp/js.php' ?>
</body>
</html>
