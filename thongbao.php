<?php
  include './DB/connect.php';
    session_start();
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
		<div class="alert">		
			<?php
				if (isset($_SESSION['success'])):
			?>
				<p class="notification"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
			<?php
				endif
			?>
			<p class="notification">Cám ơn bạn đã đặc hàng chúng tôi sẻ liên lạc với bạn sớm nhất <a href="index.php">Quay lại trang chủ</a></p>
			
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