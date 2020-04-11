<?php include './DB/connect.php'; session_start();?>
<?php
    if (isset($_POST['capnhatmember'])){
        $id_update = $_POST['userid'];
        $useremail = $_POST['useremail'];
        $useraddress = $_POST['address'];
        $userpassword = $_POST['password'];
            $sql_update_member = "UPDATE member SET
                userpassword ='$userpassword',
                useraddress = '$useraddress',
                useremail = '$useremail'
                WHERE userid = '$id_update'
            ";
        mysqli_query($conn,$sql_update_member);
        header('Location: index.php');
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
		<div class="order">
            <div class="order-title">Thông tin khách hàng</div>
             
            <div class="order-main">
            <?php
                if (isset($_GET['id'])){
                $id_capnhat = $_GET['id'];
                $sql_capnhat = mysqli_query($conn,"SELECT * FROM member WHERE
                                             userid = '".$id_capnhat."' ");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
            ?>
                <form action="thongtinkhachhang.php" method="post">
                    <input type="hidden" name="userid" value="<?php echo $row_capnhat['userid'] ?>">
                    <input class="from-control" name="useremail" type="text" value="<?php echo $row_capnhat['useremail'] ?>">
                    <input class="from-control" name="password" type="text" value="<?php echo $row_capnhat['userpassword'] ?>">
                    <input class="from-control" name="address" value="<?php echo $row_capnhat['useraddress'] ?>">
                    <input type="hidden" name="level" value="<?php echo $row_capnhat['level'] ?>">
                    <div class="form-action">
                        <button class="from-submit" type="submit"  name="capnhatmember">Cập nhật</button>
                    </div>                  
                </form>
            <?php
                }
            ?>
            </div>
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