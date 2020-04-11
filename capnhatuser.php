<?php
  include './DB/connect.php';
    session_start();
?>
<?php
    if (isset($_POST['capnhatuser'])){
        $userid = $_POST['id_update'];
        $pass = $_POST['userpassword'];
        $address =$_POST['useraddress'];
        $email=$_POST['useremail'];

            $sql_update_member = "UPDATE member SET
                userid  =$userid,
                userpass ='$pass',
                useremail=$email,
                useraddress=$address

                WHERE userid = '$id_update'";
        }
        mysqli_query($conn,$sql_update_loaisp);
        header('Location: detailuser.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <?php include 'client/teamp/href.php' ?>
</head>
<body>

    <!--start header-->
        <?php include 'client/teamp/header.php' ?>
    <!--end header-->
    <!--start slice-->
        <?php include 'client/teamp/slice.php' ?>
    <!--end slice-->
    <div class="container">
		<div class="table-cart-product">
          <table>
            <caption>Change Infomation Account</caption>
			 <thead>
			 	<?php
                    if (isset($_POST['capnhatuser'])){
                        $sql_capnhat = mysqli_query($conn,"SELECT * FROM member WHERE
                                                     userid = '$id_update'");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                ?>
              <form action="capnhatuser.php" method="post">
					<input class="from-control" name="userid" readonly="" type="text" value="<?php echo $row_capnhat['usereid']?>">
					<input class="from-control" name="userpassword" readonly="" type="text" value="<?php echo $row_capnhat['userpassword']?>">
					<input class="from-control" name="useraddress" value="<?php echo $row_capnhat['useraddress']?>">
					<input class="from-control" name="useremail" value="<?php echo $row_capnhat['useremail']?>">
					
					<div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="capnhatuser" class="btn btn-primary">Update</button>
                                </div>
                            </div>			
				</form>
				<?php
                        }
                    ?>
            </thead>
          </table>
			

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