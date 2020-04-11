<?php
  include './DB/connect.php';
    session_start();
	if(isset($_GET['id_key'])){
		$id_key = $_GET['id_key'];
		unset($_SESSION['cart'][$id_key]);
		$_SESSION['success'] = "Xóa sản phẩm thành công";
	}
	if(isset($_GET['key']) && isset($_GET['soluong'])){
		$key = $_GET['key'];
		$soluong = $_GET['soluong'];
		$_SESSION['cart'][$key]['soluong']= $soluong;
		echo "1";
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
		<?php if (isset($_SESSION['cart'])): ?>

		<div class="table-cart-product">

		  <table>
			<caption>Giỏ hàng của bạn</caption>
			 <thead>
			  <tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Tổng tiền</th>
				<th>Action</th>
			  </tr>
			</thead>

			<tbody id="tbody">
				<?php $stt=1;foreach($_SESSION['cart'] as $key => $value):  ?>
					<tr>
						<td><?php echo $stt ?></td>
						<td><?php echo $value['name'] ?></td>
						<td>
							<input type="number"
								   name="soluong"
								   id ="soluong"
								   value="<?php echo $value['soluong'] ?>"
								   style="width:50px;"
							>
						</td>
						<td><?php echo $value['gia'] ?></td>
						<td><?php echo number_format( $value['gia']*$value['soluong']) .'VNĐ' ?></td>
						<td>
							<a href="cart.php?id_key=<?php echo $key ?>"><i class="fas fa-trash-alt"></i>Remove</a>
							<a href="" class="updatecart" data-key=<?php echo $key?>><i class="far fa-edit"></i>Update</a>
						</td>
					</tr>
					<?php
						$sum=0;
						$sum = $sum + ($value['gia']*$value['soluong']);
						$_SESSION['tongtien'] = $sum;
					?>
				<?php $stt++;endforeach;?>
			</tbody>
		  </table>
		  <div class="information-user">
				<a class="btn-backward" href="index.php">Tiếp tục mua hàng</a>
				<a class="btn-next" href="thanhtoan.php">
					Thanh Toán
				</a>
		  </div>
		</div>
		<?php else: ?>
				<div class="table-cart-product">
		  <table>
			<caption>Bạn chưa chọn sản phẩm nào</caption>
			 <thead>
			  <tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Tổng tiền</th>
				<th>Action</th>
			  </tr>
			</thead>
		  </table>
		  <div class="information-user">
				<a class="btn-backward" href="index.php">Quay lại trang chủ</a>
		  </div>
			</div>
		<?php endif ?>
		<div class="product-right-header">
			 <div class="product-right-title">
				 <h1>SẢN PHẨM NEW</h1>
			 </div>
			 <div class="product-right-hot">
				 <a href="#"><img src="public/img/produce1.PNG" alt=""></a>
				 <div class ="title">
					 <p style="font-size: 16px">name</p>
					 <p1 style="font-size: 20px">giá</p1>
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
        
        <script type="text/javascript" >
        $(function(){
          $updatecart = $(".updatecart");
        	$updatecart.click(function(e){
        		e.preventDefault();
            $s1 = $("#tbody input").val();
            console.log($s1);
        		//$soluong = $(this).parents("#tbody input").find(".soluong").val();
        		$key = $(this).attr("data-key");
            console.log($key);
        		$.ajax({
        			url: 'cart.php',
        			type: 'GET',
        			data: {
        				'soluong': $s1,
        				'key' : $key
        			},
        			success:function(data){
        					alert("Cập nhật thành công");
        					location.href='cart.php';
        			}
        		})
        	})
        })
        </script>
</body>
</html>
