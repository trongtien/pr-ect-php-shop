<?php include '../../DB/connect.php'; ?>
<?php
    if (isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa =  mysqli_query($conn,"DELETE FROM sanpham WHERE masanpham = '$id' ");
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
                            <li><i class="fa fa-th-list"></i>List Product Table</li>
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
                                        <th> Mã sản phẩm </th>
                                        <th> Tên sản phẩm</th>
                                        <th> Hình</th>
                                        <th> Giá</th>
                                        <th> Mã loại</th>
                                        <th> Mẫu</th>
                                        <th> sỉze</th>
                                        <th> Hảng</th>
                                        <th> Tình trạng</th>
                                        <th> Mô tả</th>
                                        <th> Khuyến mãi </th>
                                    </tr>
                                    <?php
                                        $sql_select_sp = mysqli_query($conn,"SELECT * FROM sanpham, loaisanpham
                                                                        where sanpham.maloai = loaisanpham.maloai
                                                                         ORDER BY sanpham.maloai DESC");
                                        $i=0;
                                        while($row_sp = mysqli_fetch_array($sql_select_sp)){
                                            $i++;
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['masanpham'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['tensanpham'] ?>
                                            </td>
                                            <td>
                                                <img src="../../public/upload/<?php echo $row_sp['hinh'] ?>" height="80" width="80">
                                            </td>
                                            <td>
                                                <?php echo number_format($row_sp['gia']). 'vnđ'  ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['tenloai'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['mau'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['size'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['hang'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['tinhtrang'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_sp['mota'] ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($row_sp['khuyenmai']). 'vnđ'  ?>
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-success" href="capnhat.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['masanpham'] ?>"><i class="icon_check_alt2"></i></a>
                                                    <a class="btn btn-danger" href="?xoa=<?php echo $row_sp['masanpham'] ?>"><i class="icon_close_alt2"></i></a>
                                                </div>
                                            </td>
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
