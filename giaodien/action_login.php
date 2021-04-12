
<?php
      session_start();
     function login() { 
         if(!empty($_POST) &&isset($_POST)){
            $password =$_POST['pwd'];
            $email =$_POST['email'];

            echo $email;
            echo $password;
         
        $connect =new mysqli("localhost","root","","threeclothing");
        $connect -> set_charset("utf8");
        //kiem tra ket noi
        if($connect->connect_error){
            var_dump($connect->connect_error);
            die();
        }

        //thuc hien truy van du lieu - chen du lieu vao database
        $query="SELECT  EMAIL, MAT_KHAU FROM taikhoan WHERE EMAIL= '".$email."' AND MAT_KHAU ='".$password."'";
        $checkname ="";
        $result=mysqli_query($connect,$query);
        var_dump($result);
        $data=array();
        while($row = mysqli_fetch_array($result,1)){
            $data[] =$row;
        }

        //dong kêt nối
         $connect->close();
        if($data!=null && count($data)>0){
            $_SESSION['login']=false;
            header("Location: ../index.php?dn=true");// có thể bỏ dn= true vì người dùng có thể sữa dn thành false hoặc true 
        }
        else{
            $_SESSION['customer_name'] = $checkname;

            $_SESSION['login']=true;}
            header("Location: ../index.php?dn=false");
        }
           
    }
    login();
?>
