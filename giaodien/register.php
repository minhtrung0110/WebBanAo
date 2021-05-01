<?php
session_start();
if(isset( $_SESSION['mail_error']) && !empty( $_SESSION['mail_error']) ) $checkmail =  $_SESSION['mail_error'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Đăng Ký Tài Khoản </title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <script src="../js/validate.js"> </script>
</body>
<?php
     $_SESSION['a']=3; 
     $mess_error="";  
     //function register() { 
         if(isset($_POST['register']) && !empty($_POST['register']) ){
            $username =$_POST['username'];
            $password =$_POST['pwd'];
            $password=md5($password);
            $email =$_POST['email'];
           // $status=1;
            $quyen=3;
            include("../db/MySQLConnect.php");

        //thuc hien truy van du lieu - chen du lieu vao database 2 bang taikhoan va khachhang
        $query="INSERT INTO taikhoan (TEN_DANG_NHAP,MAT_KHAU,EMAIL,MA_GROUP_QUYEN)
                VALUE('".$username."','".$password."','".$email."','".$quyen."')";
        $query1= "INSERT INTO khachhang (TEN_KH,EMAIL)
        VALUE('".$username."','".$email."')";
         $checkemail="SELECT TEN_DANG_NHAP from taikhoan WHERE EMAIL='".$email."'  ";
        $result=mysqli_query($connect,$query1);

       
       
        $data=array();
        $data= mysqli_fetch_array(mysqli_query($connect,$checkemail));
         if($data == null){
             mysqli_query($connect,$query);
             echo $query1;
             echo $query;
             header("Location:login.php");
         }
         else {
            $mess_error="Email đã tồn tại !! vui lòng chọn Email khác";
            /// bắt sự kiện JS hiện thông báo như thế nào  ???

         }


        //dong kêt nối
         $connect->close();        
        }
    //}
    //register();
   
?>
<div class="main">

    <form action="action_register.php" method="post"  class="form" id="form-1">
        <h3 class="heading">Đăng Ký Tài Khoản</h3>
        <p class="desc"></p>

        <div class="spacer"></div>

       <div class="form-group">
          <label for="username" class="form-label">Họ và Tên:</label>
          <input id="username" name="username" type="text" placeholder="VD: Minh Trung" class="form-control">
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="email" class="form-label">Email:</label>
          <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
          <span class="form-message"><?php echo $mess_error  ?></span>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Mật Khẩu:</label>
          <input id="password" name="pwd" type="password" placeholder="Nhập mật khẩu" class="form-control">
          <span class="form-message"></span>
        </div>
       <div class="form-group">
          <label for="password_confirmation" class="form-label">Nhập lại Mật Khẩu</label>
          <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
          <span class="form-message"></span>
        </div>

        <input type="submit" name="register" class="form-submit2" value="Đăng Ký">
      </form>



    </div>
   
    <script>
      /* document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-1',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#username', 'Vui lòng nhập tên đầy đủ của bạn'),
            Validator.isEmail('#email'),
            Validator.minLength('#password', 5),
            Validator.isRequired('#password_confirmation'),
            Validator.isConfirmed('#password_confirmation', function () {
              return document.querySelector('#form-1 #password').value;
            }, 'Mật khẩu nhập lại không chính xác')
          ],
        });
      });*/

      document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-1',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#username', 'Vui lòng nhập tên đầy đủ của bạn'),
            Validator.isEmail('#email'),
            Validator.minLength('#password', 5),
            Validator.isRequired('#password_confirmation'),
            Validator.isConfirmed('#password_confirmation', function () {
              return document.querySelector('#form-1 #password').value;
            }, 'Mật khẩu nhập lại không chính xác')
          ],
        });
      });

    </script>
<script>
var mail = "<?php echo $_SESSION['mail_error']; ?>" ;
console.log(mail);
if(mail==false){
    alert("EMAIL ĐÃ TỒN TẠI VUI LÒNG CHỌN EMAIL KHÁC !!!");
<?php   $_SESSION['mail_error']=true ?>
}
</script>

</body>

</html>