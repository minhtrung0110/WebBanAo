<?php
//session_start();
//if(isset($_SESSION['login'])) $checklogin = $_SESSION['login'];
//var_dump($checklogin);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Đăng Nhập Tài Khoản </title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <script src="../js/validate.js"> </script>
</body>
<?php
      session_start();
      $checklogin;
      $mess_error="";

      if(!empty($_POST) &&isset($_POST)){
            $password =$_POST['pwd'];
            $password=md5($password);
            $email =$_POST['email'];
         
        $connect =new mysqli("localhost","root","","doanweb2");
        $connect -> set_charset("utf8");
        //kiem tra ket noi
        if($connect->connect_error){
            #var_dump($connect->connect_error);
            die();
        }

        //thuc hien truy van du lieu - chen du lieu vao database
        $query="SELECT  EMAIL, MAT_KHAU,TEN_DANG_NHAP FROM taikhoan WHERE EMAIL= '".$email."' AND MAT_KHAU ='".$password."'";
        $checkname ="SELECT TEN_DANG_NHAP FROM taikhoan WHERE EMAIL= '".$email."' AND MAT_KHAU ='".$password."'";
        $result=mysqli_query($connect,$query);
        $resultname =mysqli_query($connect,$checkname);
        #var_dump($result);
        $data=array();
        while($row = mysqli_fetch_array($result,1)){
            $data[] =$row;
        }
       
        //dong kêt nối
         $connect->close();
        if($data!=null && count($data)>0){
           //Lấy Tên Người Dùng
          $username = mysqli_fetch_assoc($resultname);
          $name=$username['TEN_DANG_NHAP'];
            $_SESSION['customer_name'] = $name;//lay tên người dùng
            $_SESSION['login']=true;
            $_SESSION['alert_login']=true;
            header("Location: ../index.php");// có thể bỏ dn= true vì người dùng có thể sữa dn thành false hoặc true 
        }
        else{        
            $_SESSION['login']=false;
            //header("Location: ../index.php");
            $mess_error="TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU SAI !!!";
            }
        }

?>
<div class="main">

       <form action="" method="POST" class="form" id="form-2">
        <h3 class="heading">ĐĂNG NHẬP</h3>
        <p class="desc">Chúc quý khách mua hàng vui vẻ ❤️</p>

        <div class="spacer"></div>

        <div class="form-group">
          <label for="email" class="form-label">Email:</label>
          <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Mật Khẩu:</label>
          <input id="password" name="pwd" type="password" placeholder="Nhập mật khẩu" class="form-control">
          <span class="form-message"></span>
        </div>

        <button type="submit" class="form-submit2">Đăng Nhập</button>
        <br>
        <span class="error"><?php echo $mess_error ?></span>
      </form>
      
    </div>
   
    <script>

      document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-2',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isEmail('#email'),
            Validator.minLength('#password', 5),
          ],
        });
      });

    </script>
    <!--<script type="text/javascript">
var check = "<?php echo $checklogin; ?>" ; 
  if(check==false)
    alert("Đăng Nhập Thất Bại!Vui lòng nhập đúng Mật Khẩu. Nếu bạn chưa có Tài Khoản Vui Lòng Đăng Ký Tài Khoản?");
</script>-->

</body>

</html>

// 