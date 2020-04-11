<?php include '../../DB/connect.php'; ?>
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "select * from donhang where iddonhang = '".$id."' ";
$EditDonHang = mysqli_query($conn,$sql);
$update_status = mysqli_fetch_array($EditDonHang);



$status = $update_status['status'] == 0 ? '1' : '0';
$sql_update = "UPDATE donhang SET status = '$status'  WHERE iddonhang = '".$id."'";
$update = mysqli_query($conn,$sql_update);
header('location: danhsachdonhang.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "../teamp/href.php" ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">

<!-- header -->
<header class="header dark-bg">
<?php include "../teamp/header.php" ?>
</header>

<!--sidebar start-->
<aside>
<div id="sidebar" class="nav-collapse ">
<?php include "../teamp/menu.php" ?>
</div>
</aside>
<!-- main -->
<section id="main-content">
<section class="wrapper">
<div class="row">
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
    <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
    <li><i class="fa fa-table"></i>Table</li>
    <li><i class="fa fa-th-list"></i>List To wait confirm</li>
    </ol>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<table class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
    <th> stt </th>
    <th> Mã đơn hàng </th>
    <th> User Id</th>
    <th> Email</th>
    <th> Số điện thoại</th>
    <th> Amount </th>
    <th> Địa chỉ giao hàng</th>
    <th> Note</th>
    <th> Ngày đặc hàng </th>
    <th> Trạng thái</th>
    <th> Action</th>
    <th></th>
    <?php
    $sql_select_donhang = mysqli_query($conn,"SELECT * FROM donhang inner join member on donhang.userid = member.userid where donhang.status = 1 ");
    $i=0;
    while($row_donhang = mysqli_fetch_array($sql_select_donhang)){
    $i++;
    ?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row_donhang['iddonhang'] ?></td>
    <td><?php echo $row_donhang['userid'] ?></td>
    <td><?php echo $row_donhang['useremail'] ?></td>
    <td><?php echo $row_donhang['useraddress'] ?></td>
    <td><?php echo number_format($row_donhang['amount']). 'VNĐ'?></td>
    <td><?php echo $row_donhang['diachigiaohang'] ?></td>
    <td><?php echo $row_donhang['note'] ?></td>
    <td><?php echo $row_donhang['create_at'] ?></td>
    <td>
        <a  
            class="<?php echo $row_donhang['status']==1 ? 'btn btn-success':''?>"
            >
            <?php  echo $row_donhang['status']==1 ? 'Đã xác nhận' : ''?>
        </a>
    </td>
    <th>
    <div class="btn-group">
    </div>
    <div class="btn-group">
    <a class="btn btn-danger" href="chitietdonhang.php?id=<?php echo $row_donhang['iddonhang'] ?>">Chi tiết</i></a>
    </div>
    </th>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</section>
</div>
</div>
</section>
</section>
</section>
<?php include "../teamp/js.php" ?>
</body>
