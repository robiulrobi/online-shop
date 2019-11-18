<?php 
class Category{
    
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
    
    
    public function save_category_info($data){
   
        $sql="INSERT INTO tbl_category(category_name,category_description,publication_status) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
        
        if(mysqli_query($this->db_connect,$sql)){
            $massage='Congratulations ! Category info create succesfully';
            return $massage;
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
    }
  
}



?>