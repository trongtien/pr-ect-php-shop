<?php
  include './DB/connect.php';
    session_start();
?>
<?php
	if(!isset($_SESSION['userid'])){
		echo "<script>alert('Bạn chưa đăng nhập'); location.href='index.php'</script>";
	}
  $user = "SELECT * FROM member WHERE userid='".$_SESSION['userid']."'";
  $query = mysqli_query($conn,$user);
  $user_cart=mysqli_fetch_array($query);
	if ($_SERVER["REQUEST_METHOD"] == "POST"  ){
		$_SESSION['id_donhang']=$id_donhang = uniqid();
		$amount =$_SESSION['tongtien'];
		$userid = $_SESSION['userid'];
		$note = $_POST['ghichu'];
		$diachigiaohang = $_POST['diachi'];
		$status = 0;
		$sql_InsertDonhang = "INSERT INTO donhang(iddonhang,amount,userid,status,diachigiaohang,note)
		values('$id_donhang','$amount','$userid','$status','$diachigiaohang','$note')";
		$donhang = mysqli_query($conn,$sql_InsertDonhang);
		$id = $_SESSION['id_donhang'];
		if($id>0){
			foreach($_SESSION['cart'] as $key => $value){
				 $iddonhang = $id;
				
				$idgiohang = uniqid();
				
				$giohang = mysqli_query($conn,"INSERT INTO giohang(idgiohang,iddonhang,masanpham,soluong,gia)
			values('$idgiohang','$iddonhang','{$key}','{$value["soluong"]}','{$value["gia"]}')");
			}
		}
		$_SESSION['success']="Lu thong tin thanh cong ".$_SESSION['id_donhang'];
		header('location:donhang.php');
		unset($_SESSION['cart']);
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
		<div class="order">
			<div class="order-title">Thông tin chi tiết</div>
			<div class="order-main">
				<form action="thanhtoan.php" method="post">
					<input class="from-control" name="useremail" readonly="" type="text" value="<?php echo $user_cart['useremail']?>">
					<input class="from-control" name="sodienthoai" readonly="" type="text" value="<?php echo $user_cart['useraddress']?>">
					<input class="from-control" name="sotien" readonly="" type="text" value="<?php echo number_format($_SESSION['tongtien'])?>">
					<input class="from-control" name="diachi" value="Địa chỉ giao hàng">
					<input class="from-control" name="ghichu" value="Thêm thông tin giao hàng">
					<div class="form-action">
						<button class="from-submit" type="submit"  name="order">Xác Nhận</button>
					</div>					
				</form>
			</div>
		</div>
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