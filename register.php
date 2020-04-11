<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/style1.css">
    <title>Register</title>
</head>
<body>
<?php
    include 'DB/connect.php';
    $error = array();
    if (isset($_POST["btnregister"])) {
		$useremail = $_POST["txtemail"];
		$userpassword = $_POST["txtpassword"];
		$useraddress = $_POST["txtaddress"];
        $level = '1';
		if ($useremail == "" || $userpassword == "" || $useraddress == "") {
		     echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
            $sql="select * from member where useremail='$useremail'";
            $kt=mysqli_query($conn, $sql);
            if(mysqli_num_rows($kt)  > 0){
                $error['checkuseremail'] = "Tài khoản đã tồn tại";
            }else{
                $sql = "INSERT INTO member(userpassword,useraddress,useremail,level) VALUES ('$userpassword','$useraddress','$useremail',$level)";
                   mysqli_query($conn,$sql);
                   header('Location: ./login.php');
                   echo "Chúc mừng bạn đã đăng ký thành công";
            }	
		}
    }
?>
    <div class="box">
        <?php if(isset($error['checkuseremail'])) {?>
            <span style="color:red" ><?php echo $error['checkuseremail'] ?></span>

        <?php } ?>
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <div class="inputBox">
                <input type="text" id="txtemail" name="txtemail" required="">
                <label >Username</label>
            </div>
            <div class="inputBox">
                <input type="password" id="txtpassword" name="txtpassword" required="">
                <label >Password</label>
            </div>
            <div class="inputBox">
                <input type="text" id="txtaddress" name="txtaddress" required="">
                <label >Address</label>
            </div>
            <input type ="hidden" id="level" name="level" value="0">
            <input type="submit"  name="btnregister" value="Register">
            <button class="resister"><a href="login.php">Back</a></button>

        </form>
    </div>
</body>
</html>