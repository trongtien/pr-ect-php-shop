<?php
    include '../../DB/connect.php';
?>
<?php
    if (isset($_POST['capnhatsanpham'])){
        $id_update = $_POST['id_update'];
        echo $id_update;
        // $masanpham = $_POST['masanpham'];
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
        $path = '../../public/upload/';
        if($hinh ==''){
            $sql_update_no_hinh = "UPDATE sanpham SET
                tensanpham ='$tensanpham',
                gia = '$gia',
                maloai = '$maloai',
                mau = '$mau',
                size = '$size',
                hang = '$hang',
                tinhtrang = '$tinhtrang',
                mota = '$mota',
                khuyenmai = '$khuyenmai'
                WHERE masanpham = '$id_update'
            ";
        }else{

            $sql_update_no_hinh = "UPDATE sanpham SET
                tensanpham ='$tensanpham',
                hinh = '$hinh',
                gia = '$gia',
                maloai = '$maloai',
                mau = '$mau',
                size = '$size',
                hang = '$hang',
                tinhtrang = '$tinhtrang',
                mota = '$mota',
                khuyenmai = '$khuyenmai'
                WHERE masanpham = '$id_update'
            ";
        }
        mysqli_query($conn,$sql_update_no_hinh);
        move_uploaded_file($hinh_tmp, $path.$hinh);
        header('Location: danhsach.php');
        echo $id_update;
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
                        <li><i class="fa fa-file-text-o"></i>Forms Update Product</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">
                        <!-- start -->
                <?php
                    if (isset($_GET['quanly'])=='capnhat'){
                        $id_capnhat = $_GET['capnhat_id'];
                        $sql_capnhat = mysqli_query($conn,"SELECT * FROM sanpham WHERE
                                                     masanpham = '$id_capnhat' ");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                        $id_loaisanpham = $row_capnhat['maloai']
                ?>
                        <form class="form-horizontal " method="POST" action="capnhat.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control"
                                    name="id_update"
                                    value="<?php echo $row_capnhat['masanpham'] ?>"
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên sãn phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        name="tensanpham"
                                        value="<?php echo $row_capnhat['tensanpham'] ?>"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hình</label>
                                <div class="col-sm-10">
                                    <input type="file" name="hinh">
                                    <img src="../../../public/upload/<?php echo $row_capnhat['hinh'] ?>" height="80" width="80">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giá</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        name="gia"
                                        value="<?php echo $row_capnhat['gia'] ?>"
                                    >
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
                                            if($id_loaisanpham = $row_danhmuc['maloai'])
                                    ?>
                                
                                        <option selected value="<?PHP echo $row_danhmuc['maloai'] ?>"><?PHP echo $row_danhmuc['tenloai'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Màu</label>
                                <div class="col-sm-10">
                                <?php
                                    $sql_mau = mysqli_query($conn,"SELECT mau From loaisanpham ")
                                ?>
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
                                    <input type="text"
                                            class="form-control"
                                            name="hang"
                                            value="<?php echo $row_capnhat['hang'] ?>"
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tình trạng</label>
                                <div class="col-sm-10">
                                    <select name="tinhtrang" >
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        name="mota"
                                        value="<?php echo $row_capnhat['mota'] ?>"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Khuyến mãi</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        placeholder="placeholder"
                                        name="khuyenmai"
                                        value="<?php echo $row_capnhat['khuyenmai'] ?>"
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="capnhatsanpham" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    <?php
                        }
                    ?>
                            </div>
                    </div>
                    </section>
            </section>
    <?php include "../teamp/js.php" ?>
</body>
