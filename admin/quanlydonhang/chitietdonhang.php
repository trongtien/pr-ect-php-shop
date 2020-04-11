<?php include '../../DB/connect.php'; ?>
<?php
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from giohang  where iddonhang = '".$id."' ";
    $sanphamdonhang = mysqli_query($conn,$sql);
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
                            <li><i class="fa fa-th-list"></i>List Order Table</li>
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
                                        <th> Mã sản phẩm</th>
																				<th> Số lượng</th>
																				<th> Giá</th>
																				<th></th>
                    <?php
                        $i=0;
                        foreach ($sanphamdonhang as $key => $item):
                            $i++;
                    ?>
                        <tr>
                          <td><?php echo $i ?></td>
													<td><?php echo $item['masanpham'] ?></td>
                          <td><?php echo $item['soluong'] ?></td>
                          <td><?php echo $item['gia'] ?></td>
                    </tr>
                  <?php  endforeach;  ?>
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
