<?php
     session_start();
     $_SESSION['a']=3;   
     function register() { 
         if(!empty($_POST)){
            $username =$_POST['username'];
            $password =$_POST['pwd'];
            $password=md5($password);
            $email =$_POST['email'];
            $status=1;
            include("../db/MySQLConnect.php");

        //thuc hien truy van du lieu - chen du lieu vao database 2 bang taikhoan va khachhang
        $query="INSERT INTO taikhoan (TEN_DANG_NHAP,MAT_KHAU,EMAIL)
                VALUE('".$username."','".$password."','".$email."')";
        $query1= "INSERT INTO khachhang (TEN_KH,EMAIL)
        VALUE('".$username."','".$email."')";
         $checkemail="SELECT * from taikhoan WHERE EMAIL='".$email."'  ";
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
            echo "email đã tồn tại !! vui lòng chọn email khác";
            /// bắt sự kiện JS hiện thông báo như thế nào  ???

         }


        //dong kêt nối
         $connect->close();        
        }
    }
    register();
   
?>