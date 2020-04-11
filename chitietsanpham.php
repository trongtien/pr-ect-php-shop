<?php
    include './DB/connect.php';
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
      <div class="product-item">
        <div class="product-item-left">
           <img src="public/img/category1" >
        </div>
        <?php
            if (isset($_GET['quanly'])=='sanpham'){
                $id_sanpham = $_GET['sanphamid'];
                $sql_sanphamid = mysqli_query($conn,"SELECT * FROM sanpham WHERE
                                             masanpham = '$id_sanpham' ");
                $row_sanpham = mysqli_fetch_array($sql_sanphamid);
                $id_loaisanpham = $row_sanpham['maloai']
        ?>
        <div class="product-item-right">
           <p class="product-item-right-name"><?php echo $row_sanpham['tensanpham'] ?></p>
           <p class="product-item-right-price"><?php echo $row_sanpham['gia'] ?></p>
           <p class="product-item-right-them"><a href="index.php?&add=<?php echo $row_sanpham['masanpham'] ?>">Thêm vào giỏ hàng</a></p><spant></spant>
           <p class="product-item-right-muangay"><a href="#">Mua ngay</a></p>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="mota">
        <h1>Mô Tả</h1>
        <?php echo $row_sanpham['mota'] ?>
      </div>
    </div>
    <!--end container-->
    <!--start footer-->
        <?php include 'client/teamp/footer.php' ?>
    <!--end footer-->
        <?php include 'client/teamp/js.php' ?>
</body>
</html>
