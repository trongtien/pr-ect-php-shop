<?php
  include './DB/connect.php';
    session_start();
  // if(isset($_GET['id'])){
  //   $userid = $_GET['id'];
  // }
  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  }
  if (isset($_GET['xoa'])){
      $xoaid = $_GET['xoa'];
      $status = '3';
      $sql_update = "UPDATE donhang SET status = '$status'  WHERE iddonhang = '".$xoaid."'";
      $update = mysqli_query($conn,$sql_update);
      header('location:donhang.php');
  }
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

    <!--start header-->
        <?php include 'client/teamp/header.php' ?>
    <!--end header-->
    <!--start slice-->
        <?php include 'client/teamp/slice.php' ?>
    <!--end slice-->
    <div class="container">
    		<div class="product">
        		<div class="table-cart-product">
        		  <table>
            			<caption>Đơn hàng đang chờ xác nhận</caption>
            			 <thead>
            			  <tr>
            				<th>STT</th>
            				<th>Mã đơn hàng</th>
            				<th>Amount</th>
            				<th>Ngày đặc hàng</th>
            				<th>Trạng thái</th>
                            <th></th>
                            <th></th>
            			  </tr>
            			</thead>
                    <?php $stt=0;
                      $sql_donhang = "select * from donhang where userid = '".$userid."' and status = 0";
                      $query = mysqli_query($conn,$sql_donhang);
                      while($donhang = mysqli_fetch_array($query)){
                     ?>
        			<tbody id="tbody">
    					   <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $donhang['iddonhang'] ?></td>
                    <td><?php echo $donhang['amount'] ?></td>
                    <td><?php echo $donhang['create_at'] ?></td>
                    <td><?php echo $donhang['status'] == 0 ? 'Đang chờ xử lý' : 'Đã xác nhận ' ?></td>
                    <td><a href="chitietdonhang.php?iddonhang=<?php echo $donhang['iddonhang']?>">Chi tiết</a></td>
                    <td><a href="donhang.php?xoa=<?php echo $donhang['iddonhang'] ?>">Xóa đơn hàng</a></td>
                 </tr>
        			</tbody>
                    <?php $stt++; } ?>
        		    </table>
            </div>
        </div>

        <div class="product">
            <div class="table-cart-product">
              <table>
                  <caption>Đon Hàng Đã Vận Chuyển</caption>
                   <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Amount</th>
                      <th>Ngày đặc hàng</th>
                      <th>Trạng thái</th>
                      <th></th>
                    </tr>
                  </thead>
                    <?php $stt=0;
                      $sql_donhangthanhcong = "select * from donhang where userid = '".$userid."' and status = 1";
                      $query = mysqli_query($conn,$sql_donhangthanhcong);
                      while($sql_donhangthanhcong = mysqli_fetch_array($query)){
                     ?>
              <tbody id="tbody">
                 <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $sql_donhangthanhcong['iddonhang'] ?></td>
                    <td><?php echo $sql_donhangthanhcong['amount'] ?></td>
                    <td><?php echo $sql_donhangthanhcong['create_at'] ?></td>
                    <td><?php echo $sql_donhangthanhcong['status'] == 0 ? 'Đang chờ xử lý' : 'Đã xác nhận chờ giao hàng' ?></td>
                    <td><a href="chitietdonhang.php?iddonhang=<?php echo $sql_donhangthanhcong['iddonhang'] ?>">Chi tiết</a></td>
                 </tr>
              </tbody>
                    <?php $stt++; } ?>
                </table>
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
