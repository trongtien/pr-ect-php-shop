<?php
    include './DB/connect.php';
?>
<?php
  if (isset($_POST['btnsearch'])){
    $tukhoa = $_POST['serchproduct'];
    $sql_product = mysqli_query($conn,"SELECT * FROM sanpham WHERE
                                 tensanpham LIKE '%$tukhoa%' ORDER BY masanpham DESC");
    $title = $tukhoa;
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
       <div class="item-title">
                 <h1><?php echo $title ?></h1>
        </div>

        <div class="item">
            <div class="item-product">
        <?php
            while($row_sanpham = mysqli_fetch_array($sql_product)){
        ?>
            <div class="wrapper">
                    <div class="box">
                        <div class="card">
                            <a href="chitietsanpham.php?quanly=sanpham&sanphamid=<?php echo $row_sanpham['masanpham'] ?> ">
                              <img src="../../public/upload/<?php echo $row_sanpham['hinh'] ?>" >
                            </a>
                            <p class="name"><a href="#"><?php echo $row_sanpham['tensanpham'] ?></a></p>
                            <p class="price"><?php echo number_format($row_sanpham['gia']). 'vnđ'?><span class="price-cell"><?php echo number_format($row_sanpham['khuyenmai']). 'vnđ'?></span></p>
                            <p class="addtocart"><a href="index.php?&add=<?php echo $row_sanpham['masanpham'] ?>">Add To Cart</a></p>
                        </div>
                    </div>
            </div>
        <?php
            }
        ?>
        </div>

    </div>
    <!--end container-->
    <!--start footer-->
        <?php include 'client/teamp/footer.php' ?>
    <!--end footer-->
        <?php include 'client/teamp/js.php' ?>
</body>
</html>
