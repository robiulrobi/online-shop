<?php
class Admin{
    
    
    //db_connection
    private $db_connect;
    
    public function __construct(){
        $host_name='localhost';
        $user_name='root';
        $password='';
        $db_name='db_online-shop';
        
        $this->db_connect=mysqli_connect($host_name,$user_name,$password,$db_name);
        if(!$this->db_connect){
            die('Connection Fail'.mysqli_error($this->db_connect));
        }
    }
    
    //db_connection
    
    
    
    public function admin_login_check($data){
//        echo'<pre>';
//        print_r($data);
//        exit();
        
        $email_address =$data['email_address'];
        $password=md5($data['password']);
        
        $sql="SELECT * FROM tbl_admin WHERE email_address='$email_address' AND password='$password'";
        if(mysqli_query($this->db_connect, $sql)){
            $query_result=mysqli_query($this->db_connect,$sql);
            $admin_info= mysqli_fetch_assoc($query_result);
            
//            echo'<pre>';
//            print_r($admin_info);
//            exit();
            
            if($admin_info){
                
                session_start();
                
                $_SESSION['admin-name']=$admin_info['admin_name'];
                $_SESSION['admin-id']=$admin_info['admin_id'];
                $_SESSION['access-level']=$admin_info['access_level'];
                
                
                
                
                header('location:admin_master.php');
            }else{
                $massage="Invalid email or password";
                return $massage;
            }
        
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
    }
}



?>