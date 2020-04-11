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
         <div class="product-left">
             <div class="product-left-title"></div>
             <div class="row">
               <?php
                   if (isset($_GET['quanly'])=='danhmuc'){
                       $id_danhmuc = $_GET['danhmucid'];

                       $sql_cate_home = mysqli_query($conn,"SELECT * FROM sanpham WHERE maloai = '$id_danhmuc' ");
                      while ($row_sanpham = mysqli_fetch_array($sql_cate_home)) {
               ?>
                 <div class="wrapper">
                   <div class="box">

                       <div class="card">
                         <a href="chitietsanpham.php?quanly=sanpham&sanphamid=<?php echo $row_sanpham['masanpham'] ?> ">
                           <img src="public/upload/<?php echo $row_sanpham['hinh'] ?>" >
                         </a>
                         <p class="name"><a href="#"><?php echo $row_sanpham['tensanpham'] ?></a></p>
                         <p class="price"><?php echo number_format($row_sanpham['gia']). 'vnđ'?><span class="price-cell"><?php echo number_format($row_sanpham['khuyenmai']). 'vnđ'?></span></p>
                         <p class="addtocart"><a href="index.php?&add=<?php echo $row_sanpham['masanpham'] ?>">Add To Cart</a></p>
                       </div>

                   </div>
               </div>
               <?php } } ?>
             </div>

             <div class="page">
                 <p><a href="#">1</a></p>
             </div>
             <div class="product-left-title"></div>
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
