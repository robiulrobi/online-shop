<?php
class Super_admin{
    
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
    
    public function logout (){
        
        unset($_SESSION['admin-name']);
        unset($_SESSION['admin-id']);
        
        header('location:index.php');
    }
    //ajax email check
    public function customer_email_check($email_address){
        $sql="SELECT* FROM tbl_customer WHERE email_address='$email_address'";
        if (mysqli_query($this->db_connect, $sql)) {
            $email_query=mysqli_query($this->db_connect, $sql);
            return $email_query;
        } else {
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    //ajax email check
    
//save slider image
    public function save_slider_image($data){
         $directory='../assets/images/';
    $target_file=$directory.$_FILES['image']['name'];
    $file_type= pathinfo($target_file,PATHINFO_EXTENSION);
    $file_size=$_FILES['image']['size'];
//    echo $file_size;
    $image=getimagesize($_FILES['image']['tmp_name']);
//    echo '<pre>';
//    print_r($image);
//    exit();
  if($image){
      if(file_exists($target_file)){
          die('This image already exist');
      }else{
          if($file_size>5242880){
              die('File size too large');
          }else{
              if($file_type!='jpg'&& $file_type!='png' && $file_type!='JPEG' && $file_type!='PNG'){
                  die('File type not valid');
              }else{
                  $sql="INSERT INTO tbl_slider(image)VALUES ('$target_file')";
                   if(mysqli_query($this->db_connect,$sql)){
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $massage='Congratulations ! Slider save succesfully';
            return $massage;
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
              }
          }
      }
      
      
  }else{
      die('This is not an image');
  }

    }
    
    public function select_slider_image(){
        $sql="SELECT* FROM tbl_slider ORDER BY image_id DESC LIMIT 3";
         if (mysqli_query($this->db_connect, $sql)) {
            $slider=mysqli_query($this->db_connect, $sql);
            return $slider;
        } else {
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
}
?>