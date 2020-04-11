<?php
    include '../../DB/connect.php';
?>
<?php
    if (isset($_POST['capnhatloaisp'])){
        $id_update = $_POST['id_update'];
        $maloai = $_POST['maloai'];
        $tenloai = $_POST['tenloai'];

            $sql_update_loaisp = "UPDATE loaisanpham SET
                maloai  =$maloai,
                tenloai ='$tenloai',

                WHERE maloai = '$id_update'";
        }
        mysqli_query($conn,$sql_update_loaisp);
        header('Location: danhsachloaisp.php');

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
                        <li><i class="fa fa-file-text-o"></i>Forms Update Product Type</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            
                            <div class="panel-body">
                        <!-- start -->
                <?php
                    if (isset($_GET['quanly'])=='capnhatloaisp'){
                        $id_capnhat = $_GET['capnhatloaisp_id'];
                        $sql_capnhat = mysqli_query($conn,"SELECT * FROM loaisanpham WHERE
                                                     maloai = '$id_capnhat' ");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                        $id_loaisanpham = $row_capnhat['maloai']
                ?>
                        <form class="form-horizontal " method="POST" action="capnhatloaisp.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control"
                                    name="id_update"
                                    value="<?php echo $row_capnhat['maloai'] ?>"
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control"
                                        name="tensanpham"
                                        value="<?php echo $row_capnhat['tenloai'] ?>"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="capnhatloaisp" class="btn btn-primary">Update</button>
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
