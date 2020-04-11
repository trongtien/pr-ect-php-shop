<?php
  include './DB/connect.php';
    session_start();
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
<?php
  // session_destroy();
  if (isset($_GET['add'])  ){
      $id = $_GET['add'];
      $_SESSION['cart_'.$id] +=1;
  }
  if (isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $_SESSION['cart_'.$id]=0;
  }
  if (isset($_GET['them'])) {
    $id = $_GET['them'];
    $_SESSION['cart_'.$id] += 1;
  }
  if (isset($_GET['giam'])){
    $id = $_GET['giam'];
    $_SESSION['cart_'.$id] --;
  }


  if (isset($_POST['guidonhang'])){
      $idgiohang = uniqid();
      $soluongsp = $_POST['soluongsp'];
      $masanpham = $_POST['masanpham'];
      $userid = $_POST['userid'];
      $thanhtien = $_POST['thanhtien'];
      $tensanpham = $_POST['tensanpham'];
      $diachi = $_POST['diachi'];
      $sql = "INSERT INTO giohang(
              idgiohang,
              soluongsp,
              userid,
              masanpham,
              thanhtien,
              tensanpham,
              diachi
          ) VALUES (
              '$idgiohang',
              '$soluongsp',
              '$userid',
              '$masanpham',
              '$thanhtien',
              '$tensanpham',
              '$diachi'
          )";
          mysqli_query($conn,$sql);
		  echo '<script>alert("Thêm Thành công quay lại trang chủ")</script>';
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

    <!--start header-->
        <?php include 'client/teamp/header.php' ?>
    <!--end header-->
    <!--start slice-->
        <?php include 'client/teamp/slice.php' ?>
    <!--end slice-->
    <div class="container">
              <?php
              if(!isset($_SESSION['dangnhapclient']) && !isset($_SESSION['userid'])){
                echo '<script>alert("Bạn hãy đăng nhập trước")</script>';
                echo '<script>window.location="index.php"</script>';
              }else{
                $tongcong =0;
                $soluongsanpham = 0;
                foreach ($_SESSION as $name => $value){
                  if ($value>0){
                     if (substr($name,0,5)=='cart_'){
                       $id = substr($name,5,(strlen($name)-5));
                  $sql = "SELECT * FROM sanpham WHERE masanpham='".$id."'";
                  $query = mysqli_query($conn,$sql);
                  while ($dong=mysqli_fetch_array($query)) {
              ?>
		<div class="table-cart-product">
          <table>
            <caption>Giỏ hàng của bạn</caption>
			 <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th><?php echo $dong['masanpham'] ?></th>
                <th><?php echo $dong['tensanpham'] ?></th>
                <th>
                  <a href="?giam=<?php echo $dong['masanpham'] ?>">[-]</a>
                  <?php echo $soluong = $value ?>
                  <a href="?them=<?php echo $dong['masanpham'] ?>">[+]</a>
                </th>
                <th><?php echo number_format($tongtien = $dong['gia']*$value). 'VNĐ' ?></th>
                <th ><a href="giohang.php?xoa=<?php echo $dong['masanpham'] ?>">Xoa</a></th>
              </tr>
              <?php $tongcong += $tongtien ?>
              <?php $soluongsanpham  += $soluong ?>
            </tbody>
          </table>
          <p >Tổng cộng: <?php echo number_format($tongcong). 'VNĐ'; ?></p>
          <p >Tổng cộng: <?php echo $soluongsanpham; ?></p>
          <form  action="" method="post">
            <input type="hidden" name="soluongsp" value="<?php echo $soluong = $value ?>">
            <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
            <input type="hidden" name="masanpham" value="<?php echo $dong['masanpham'] ?>">
            <input type="hidden" name="thanhtien" value="<?php echo $tongcong ?>">
            <input type="hidden" name="tensanpham" value="<?php echo $dong['tensanpham'] ?>">
            <div class="information-user-form-group">
              <label class="label-group">Địa chỉ giao hàng</label>
              <input name="diachi" class="input-group" type="text" name="" value="">
            </div>
            <div class="information-user-form-group">
              <button class="information-user-form-group" type="submit"  name="guidonhang">Gửi</button>
            </div>
          </form>
          <?php
        }}}else{
			?>
			<p
				style=" text-align: center;
						font-size: 32px;
						font-weight: bold;"
			>
				Giỏ hàng trống, mời bạn chọn sản phẩm
			</p>
			<p
				style=" text-align: center;
						font-size: 20px;
						color: #333333;"
			>
				<a  href="index.php"
					style=" text-decoration:none;
						color: #333333;"
				>
					Quay lại trang chủ
				</a>
			</p>
		<?php
			  }}}
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
