<?php
  include './DB/connect.php';
    session_start();
  // if(isset($_GET['id'])){
  //   $userid = $_GET['id'];
  // }
  if(isset($_GET['iddonhang'])){
    $iddonhang = $_GET['iddonhang'];
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
                  <caption>Chi tiết đơn hàng</caption>
                   <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Mã loại</th>
                      <th>Giá</th>
                      <th>Màu</th>
                      <th>Size</th>
                      <th>Hãng</th>
                    </tr>
                  </thead>
                    <?php $stt=0;
                      $sql_chitietdonhang = "select sanpham.gia,sanpham.masanpham,sanpham.tensanpham,sanpham.maloai,sanpham.mau,sanpham.size,sanpham.hang from giohang join sanpham on giohang.masanpham = sanpham.masanpham where giohang.iddonhang = '$iddonhang'";
                      $query = mysqli_query($conn,$sql_chitietdonhang);
                      while($sql_chittietdonhang = mysqli_fetch_array($query)){
                     ?>
              <tbody id="tbody">
                 <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $sql_chittietdonhang['masanpham'] ?></td>
                    <td><?php echo $sql_chittietdonhang['tensanpham'] ?></td>
                    <td><?php echo $sql_chittietdonhang['maloai'] ?></td>
                    <td><?php echo $sql_chittietdonhang['gia'] ?></td>
                    <td><?php echo $sql_chittietdonhang['mau'] ?></td>
                    <td><?php echo $sql_chittietdonhang['size'] ?></td>
                    <td><?php echo $sql_chittietdonhang['hang'] ?></td>
                 </tr>
              </tbody>
                    <?php $stt++; } ?>
                    <a href="donhang.php">BACK</a>
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
