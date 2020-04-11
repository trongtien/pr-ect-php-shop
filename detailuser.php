<?php
  include './DB/connect.php';
    session_start();
    if (isset($_GET['login'])){
      $dangxuat = $_GET['login'];
    }else{
      $dangxuat = '';
    }
    if($dangxuat == 'dangxuat'){
      session_destroy();
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
		<div class="table-cart-product">
          <table>
            <caption>Account Detail</caption>
			 <thead>
              <tr>
                  <th> USER ID </th>
                  <th> USER PASSWORD</th>
                  <th> Address</th>
                  <th> UserEmail</th>
                  <th></th>
              </tr>
              <?php
                                        $id=$_SESSION['userid'];
                                        $sql_select_user = mysqli_query($conn,"SELECT * FROM member  where userid =$id ");
                                        $i=0;
                                        while($row_user = mysqli_fetch_array($sql_select_user)){ ?>
                                          <tr>
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
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-success" href="capnhatuser.php?id_update=<?php echo $row_user['userid'] ?>"><i class="icon_check_alt2">Change</i></a>
                                                </div>
                                            </td>
                                            </tr>
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