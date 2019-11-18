<?php
ob_start();
class Manage_category{
    
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
    public function select_all_category_info(){
        $sql="SELECT * FROM tbl_category";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
        
        
    }
    
    //unpublish category code
    
    public function unpublished_category_by_id($category_id){
          $sql="UPDATE tbl_category SET publication_status= 0 WHERE category_id='$category_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $massage='Category info unpublished';
                return $massage;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    
    //unpublish category code
    
     //publish category code
    
    public function published_category_by_id($category_id){
          $sql="UPDATE tbl_category SET publication_status= 1 WHERE category_id='$category_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $massage='Category info published';
                return $massage;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    
    //publish category code
    
    //edit category information code
    public function update_category_info_by_id($category_id){
        $sql="SELECT * FROM  tbl_category WHERE category_id='$category_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
        
    }
    //edit category information code
    
    //save edit category code
    
    
    public function Update_category_info($data){
            $sql="UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', publication_status='$data[publication_status]' WHERE category_id='$data[category_id]'";
        
            if(mysqli_query($this->db_connect,$sql)){
                
                $_SESSION['massage']='Category Info Update Succesfully';
                header('Location: manage_category.php');

            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
     //save edit category code
    
    //delete category code
    
    public function delete_category_by_id($category_id){
        $sql="DELETE FROM tbl_category WHERE category_id='$category_id'";
        if(mysqli_query($this->db_connect,$sql)){
             $massage='Category Delete Successfully';
                return $massage;
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }
    
    
    //delete category code
    
    
    
    
    
}


?>