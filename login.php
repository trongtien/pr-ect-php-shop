<?php
    session_start();
    include 'DB/connect.php';
?>
<?php
    $error = array();
    if(isset($_POST["dangnhap"])){
        $useremail = $_POST["usernemail"];
        $userpassword=$_POST["userpassword"];
         $sql = "SELECT * FROM member WHERE useremail = '$useremail' and userpassword = '$userpassword' and  level= 1 LIMIT 1 ";
			     $query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
          $row_dangnhap = mysqli_fetch_array($query);
            if ($num_rows > 0) {
                  $_SESSION['dangnhap'] = $row_dangnhap['useremail'];
                  header('Location: admin/quanlysanpham/danhsach.php');
			      }else{
            $error['check'] = "tên đăng nhập hoặc mật khẩu không đúng !";
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/style1.css">
    <title>User Login</title>
</head>
<body>

    <div class="box">
        <?php if(isset($error['check'])) {?>
            <span style="color:red" ><?php echo $error['check'] ?></span>
        <?php } ?>
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="inputBox">
                <input type="text" name="usernemail" required="">
                <label >Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="userpassword" required="">
                <label >Password</label>
            </div>
            <input type="submit"  name="dangnhap" value="login">
            <button class="resister"><a href="register.php">Register</a></button>
        </form>
    </div>

    </form>
</body>
</html>
