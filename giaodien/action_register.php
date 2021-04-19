<?php
     session_start();
     $_SESSION['a']=+8;   
     function register() { 
         if(!empty($_POST)){
            $username =$_POST['username'];
            $password =$_POST['pwd'];
            $password=md5($password);
            $email =$_POST['email'];
            $status=1;
        $connect =new mysqli("localhost","root","","doanweb2");
        $connect -> set_charset("utf8");
        //kiem tra ket noi
        if($connect->connect_error){
            var_dump($connect->connect_error);
            die();
        }

        //thuc hien truy van du lieu - chen du lieu vao database 2 bang taikhoan va khachhang
        $query="INSERT INTO taikhoan (MA_TK,TEN_DANG_NHAP,MAT_KHAU,STATUS,EMAIL)
                VALUE('".$_SESSION['a']."','".$username."','".$password."','".$status."','".$email."')";
         $checkemail="SELECT * from taikhoan WHERE EMAIL='".$email."'  ";


       
        echo $query;
        $data=array();
        $data= mysqli_fetch_array(mysqli_query($connect,$checkemail));
         if($data == null){
             mysqli_query($connect,$query);
             header("Location:login.php");
         }
         else {
            echo "email đã tồn tại !! vui lòng chọn email khác";
            /// bắt sự kiện JS hiện thông báo như thế nào  ???

         }


        //dong kêt nối
         $connect->close();        
        }
    }
    register();
   
?>