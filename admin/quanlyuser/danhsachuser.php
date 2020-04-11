<?php include '../../DB/connect.php'; ?>
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
                            <li><i class="fa fa-th-list"></i>List Product Type</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th> STT </th>
                                        <th> USER ID </th>
                                        <th> USER PASSWORD</th>
                                        <th> Address</th>
                                        <th> UserEmail</th>
                                    </tr>
                                    <?php
                                        $sql_select_user = mysqli_query($conn,"SELECT * FROM member  ORDER BY userid DESC");
                                        $i=0;
                                        while($row_user = mysqli_fetch_array($sql_select_user)){
                                            $i++;
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td>
                                                <?php echo $row_user['userid'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_user['userpassword'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_user['useraddress'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_user['useremail'] ?>
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
