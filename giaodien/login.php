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
<div class="main">

       <form action="action_login.php" method="POST" class="form" id="form-2">
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