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
<div class="main">

      <form method="POST" action="action_register.php"  class="form" id="form-1">
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
          <input id="email" name="email" type="email" placeholder="VD: email@domain.com" class="form-control">
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="password" class="form-label">Mật Khẩu:</label>
          <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="password_confirmation" class="form-label">Nhập lại Mật Khẩu</label>
          <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
          <span class="form-message"></span>
        </div>

        <button type="submit" class="form-submit" name="submit">Đăng Ký</button>
      </form>



    </div>
   
    <script>

      document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-1',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#username', 'Vui lòng nhập tên đầy đủ của bạn'),
            Validator.isEmail('#email'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#password_confirmation'),
            Validator.isConfirmed('#password_confirmation', function () {
              return document.querySelector('#form-1 #password').value;
            }, 'Mật khẩu nhập lại không chính xác')
          ],
           onSubmit: function () {
            $('form').submit();
             }
         
        });
      });

    </script>

</body>

</html>