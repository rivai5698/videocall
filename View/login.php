<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link rel="stylesheet" href="../Style/common/b-ground.css"/>
</head>
<body style="margin: 0" >

<div class="bg-left">
    <div class="logo">
    </div>


    <div class="text_welcome">
        VIDEO CALL BANKING AGENT LOGIN
    </div>
</div>


<?php
if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" )
    {
        echo '<script language="javascript">';
        echo 'alert(" Bạn chưa nhập tài khoản")';
        echo '</script>';
    }
    elseif( $password =="")
    {
        echo '<script language="javascript">';
        echo 'alert(" Bạn chưa nhập mật khẩu")';
        echo '</script>';
    }
    else{
        $server_username = "carticket";
        $server_password = "Carticket#2020";
        $server_host = "123.31.17.59";
        $database = "cheap";

        $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");

        mysqli_query($conn,"SET NAMES 'UTF8'");
        $sql = "select * from scco_user where username = '$username' and password = '$password' ";
        $query = mysqli_query($conn,$sql);

        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo '<script language="javascript">';
            echo 'alert(" Tên đăng nhập hoặc mật khẩu chưa đúng!")';
            echo '</script>';
        }else{
            while($rows = $query->fetch_assoc()){
                $name = $rows["name"];
            }
            $_SESSION['name'] = $name;
            header('Location: index.php');
        }
    }
}
?>
<div class="bg-right">
    <div class="text_welcome2">Đăng nhập Video Call</div>
    <div class="form-login">
        <form method="POST" action="login.php">
        <fieldset style="font-size: 50px">
<!--           <legend style="font-size:25px" >Đăng nhập</legend>-->
            <table style="font-size: 25px; width: 550px">
               <tr>
                   <td style="height: 55px">Tài Khoản</td>
                  <td><input style="height: 20px" type="text" name="username" size="45"></td>
                </tr>
              <tr>
                  <td>Mật Khẩu</td>
                  <td><input style="height: 20px" type="password" name="password" size="45"></td>
                </tr>
                <tr style="height: 85px">
                    <td colspan="2" align="center" > <input type="submit" name="btn_submit" class="btn-login" value="Đăng nhập"></td>
                </tr>
            </table>
        </fieldset>
        </form>
    </div>
    <div class="text-cr">Copyright © 2021</div>

</div>
</body>
</html>