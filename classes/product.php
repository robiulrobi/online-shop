<?php
class Product {
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
    
    
    //save product code
    
    public function save_product_info($data){
        //for image upload
        
        $directory="../assets/images/";
        $target_file=$directory.$_FILES['product_image']['name'];
        
        $file_type=pathinfo($target_file,PATHINFO_EXTENSION);
//        echo $file_type;
        $file_size=$_FILES['product_image']['size'];
        //echo $file_size;
        
        $image=getimagesize($_FILES['product_image']['tmp_name']);
//        echo '<pre>';
//        print_r($image);
        
        if($image){
            if(file_exists($target_file)){
                die('This image already exist');
            }else{
                if($file_size > 5242880){
                    die('File size is too large');
                }else{
                    if($file_type!='jpg'&& $file_type!='png'&& $file_type!='PNG'&& $file_type!='JPEG'){
                        die('File type is invalid');
                    }else{
                        
                              $sql="INSERT INTO tbl_product(product_name,category_id,manufacture_id,product_price,stock_amount,minimum_stock_amount,product_short_description,product_long_description,product_image,publication_status) VALUES('$data[product_name]','$data[category_id]','$data[manufacture_id]','$data[product_price]','$data[stock_amount]','$data[minimum_stock_amount]','$data[product_short_description]','$data[product_long_description]','$target_file','$data[publication_status]')";
        
        if(mysqli_query($this->db_connect,$sql)){
            move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
            $massage='Congratulations ! Product info save succesfully';
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
        
        //for image upload with product
}
   //save product code

//manage product
 public function select_all_product_info(){
        $sql="SELECT p.product_name,p.product_id,p.category_id,p.manufacture_id,p.product_price,p.stock_amount,p.publication_status,c.category_name,m.manufacture_name FROM tbl_product as p,tbl_category as c,tbl_manufacture as m WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
        
        
    }
    //manage product
  
    //view product
    public function view_product_by_id($product_id){
        $sql="SELECT p.*,c.category_name,m.manufacture_name FROM tbl_product as p,tbl_category as c,tbl_manufacture as m WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id AND p.product_id=$product_id";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    //view product


    //unpublish category code
    
    public function unpublished_product_by_id($product_id){
          $sql="UPDATE tbl_product SET publication_status= 0 WHERE product_id='$product_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $massage='Product info unpublished';
                return $massage;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    
    //unpublish category code
    
     //publish category code
    
    public function published_product_by_id($product_id){
          $sql="UPDATE tbl_product SET publication_status= 1 WHERE product_id='$product_id'";
            if(mysqli_query($this->db_connect,$sql)){
                $massage='Product info published';
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
    
    public function delete_product_by_id($product_id){
        $sql="DELETE FROM tbl_product WHERE product_id='$product_id'";
        if(mysqli_query($this->db_connect,$sql)){
             $massage='Product Delete Successfully';
                return $massage;
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }

    //delete category code
    
 
    
}
