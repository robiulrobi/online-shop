<?php
class Manufacture{
    
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
    
    //add manufacture code
      public function save_manufacture_info($data){
         $sql="INSERT INTO tbl_manufacture(manufacture_name,manufacture_description,publication_status) VALUES('$data[manufacture_name]','$data[manufacture_description]','$data[publication_status]')";
        
        if(mysqli_query($this->db_connect,$sql)){
            $massage='Congratulations ! Manufacture info Save succesfully';
            return $massage;
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
      }
    
     //add manufacture code
    
    
    //manage manufacture code
    
    public function select_all_manufacture_info(){
         $sql="SELECT * FROM tbl_manufacture";
        
        if(mysqli_query($this->db_connect,$sql)){
            $query_result=mysqli_query($this->db_connect,$sql);
            return $query_result;
                
           
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
        
    }
        
    //manage manufacture code
    
    
    
    //unpublished code
    
    public function unpublished_manufacture_info_by_id($manufacture_id){
         $sql="UPDATE tbl_manufacture SET publication_status= 0 WHERE manufacture_id=$manufacture_id ";
        
        if(mysqli_query($this->db_connect,$sql)){
           $massage='Manufacture Unpublished Successfully';
            return $massage;
                
           
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
    }    
    //unpublished code
    
    
    //published code
    
    public function published_manufacture_info_by_id($manufacture_id){
         $sql="UPDATE tbl_manufacture SET publication_status= 1 WHERE manufacture_id=$manufacture_id ";
        
        if(mysqli_query($this->db_connect,$sql)){
           $massage='Manufacture Published Successfully';
            return $massage;
                
           
        }else{
            die('Query problem'.mysqli_error($this->db_connect));
        }
    }
    
    
    //published code
    
    //edit code
    
    public function edit_manufacture_info_by_id($manufacture_id){
        $sql="SELECT * FROM  tbl_manufacture WHERE manufacture_id='$manufacture_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    //edit code
    
    //edit save
    
    public function update_manufacture_info($data){
          $sql="UPDATE tbl_manufacture SET manufacture_name='$data[manufacture_name]', 	manufacture_description='$data[manufacture_description]', publication_status='$data[publication_status]' WHERE manufacture_id='$data[manufacture_id]'";
        
            if(mysqli_query($this->db_connect,$sql)){
                
        
                $_SESSION['massage']='Manufacture Info Update Succesfully';
        
                header('Location: manage_manufacture.php');

            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    //edit save code
    
    
    //delete code
    
    public function delete_manufacture_info_by_id($manufacture_id){
         $sql="DELETE FROM tbl_manufacture WHERE manufacture_id='$manufacture_id'";
        if(mysqli_query($this->db_connect,$sql)){
             $massage='Manufacture Delete Successfully';
                return $massage;
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }
}



?>