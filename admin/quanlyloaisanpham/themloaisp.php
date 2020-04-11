<?php
    include '../../DB/connect.php';
?>
<?php
    if (isset($_POST['themloaisp'])){
        $maloai = uniqid($_POST['maloai']);
        $tenloai = $_POST['tenloai'];

        $sql = "INSERT INTO loaisanpham(
                maloai,
                tenloai
            ) VALUES (
                '$maloai',
                '$tenloai'
            )";
            mysqli_query($conn,$sql);
        header('Location: ../quanlysanpham/danhsach.php');
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
                        <li><i class="fa fa-file-text-o"></i>Create Product Type</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">
                        <!-- start -->
                        <form class="form-horizontal " method="POST" action="themloaisp.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mã loại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="maloai">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên loại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tenloai">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="themloaisp" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                            </div>
                    </div>
                    </section>
            </section>
    <?php include "../teamp/js.php" ?>
</body>
