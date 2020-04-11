<?php
    include '../../DB/connect.php';
?>
<?php
    if (isset($_POST['themsanpham'])){
        // $_POST['masanpham']
        $masanpham = uniqid();
        $tensanpham = $_POST['tensanpham'];
        $hinh = $_FILES['hinh']['name'];
        $hinh_tmp = $_FILES['hinh']['tmp_name'];
        $gia = $_POST['gia'];
        $maloai = $_POST['maloai'];
        $mau = $_POST['mau'];
        $size = $_POST['size'];
        $hang = $_POST['hang'];
        $tinhtrang = $_POST['tinhtrang'];
        $mota = $_POST['mota'];
        $khuyenmai = $_POST['khuyenmai'];
        $path = '../../../public/upload/';

        $sql = "INSERT INTO sanpham(
                masanpham,
                tensanpham,
                hinh,
                gia,
                maloai,
                mau,
                size,
                hang,
                tinhtrang,
                mota,
                khuyenmai
            ) VALUES (
                '$masanpham',
                '$tensanpham',
                '$hinh',
                '$gia',
                '$maloai',
                '$mau',
                '$size',
                '$hang',
                '$tinhtrang',
                '$mota',
                '$khuyenmai'
            )";
            mysqli_query($conn,$sql);
        move_uploaded_file($hinh_tmp, $path.$hinh);
        header('Location: danhsach.php');
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
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Forms</li>
                        <li><i class="fa fa-file-text-o"></i>Create Product</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">
                        <!-- start -->
                        <form class="form-horizontal " method="POST" action="them.php" enctype="multipart/form-data">

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="masanpham">
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên sãn phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tensanpham">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hình</label>
                                <div class="col-sm-10">
                                    <input type="file" name="hinh">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giá Khuyến Mãi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="gia">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">mã loại</label>
                                <div class="col-sm-10">
                                <?php
                                    $sql_danhmuc = mysqli_query($conn,"SELECT * From loaisanpham ORDER BY maloai DESC")
                                ?>
                                    <select name="maloai" >
                                    <?php
                                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                    ?>
                                        <option value="<?PHP echo $row_danhmuc['maloai'] ?>"><?PHP echo $row_danhmuc['tenloai'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Màu</label>
                                <div class="col-sm-10">
                                    <!-- <input type="text" class="form-control round-input" name="mau"> -->
                                    <select name="mau" >
                                        <option value="xam">Xám</option>
                                        <option value="do">Đỏ</option>
                                        <option value="vang">Vàng</option>
                                        <option value="xanh">Xanh</option>
                                        <option value="den">Đen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">size</label>
                                <div class="col-sm-10">
                                    <!-- <input type="text" class="form-control round-input" name="size"> -->
                                    <select name="size" >
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hãng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="placeholder" name="hang">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tình trạng</label>
                                <div class="col-sm-10">
                                    <select name="tinhtrang" >
                                        <option value="Còn hàng">Còn hàng</option>
                                        <option value="Hết hàng">Hết hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="placeholder" name="mota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giá gốc</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="placeholder" name="khuyenmai">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="themsanpham" class="btn btn-primary">Create</button>
                                </div>
                            </div>

                        </form>
                            </div>
                    </div>
                    </section>
            </section>
    <?php include "../teamp/js.php" ?>
</body>
