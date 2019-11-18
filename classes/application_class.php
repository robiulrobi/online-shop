<?php
class Application{
    
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
    
    
    //published_category
    
    public function select_all_published_category(){
        $sql="SELECT * FROM tbl_category WHERE publication_status=1";
        if(mysqli_query($this->db_connect,$sql)){
            $query_published=mysqli_query($this->db_connect,$sql);
            return $query_published;
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    
    //published_category
    
     //published_manufacture
    
    public function select_published_manufacture(){
        $sql="SELECT * FROM tbl_manufacture WHERE publication_status=1";
        if(mysqli_query($this->db_connect,$sql)){
            $query_published=mysqli_query($this->db_connect,$sql);
            return $query_published;
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    
       //published_manufacture
    
    
    //latest product show
    
    public function select_latest_product(){
          $sql="SELECT * FROM tbl_product WHERE publication_status=1 ORDER BY product_id DESC LIMIT 9";
        if(mysqli_query($this->db_connect,$sql)){
            $query_published=mysqli_query($this->db_connect,$sql);
            return $query_published;
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
     //latest product show
    
    //product details by id
    public function product_details_by_id($product_id){
        $sql="SELECT p.*,c.category_name,m.manufacture_name FROM tbl_product as p,tbl_category as c,tbl_manufacture as m WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id AND product_id=$product_id";
         if(mysqli_query($this->db_connect,$sql)){
            $query_details=mysqli_query($this->db_connect,$sql);
            return $query_details;
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
     //product details by id
    
    
    //add to cart
    public function add_to_cart($data){
        $product_id=$data['product_id'];
        $sql="SELECT product_name,product_price,product_image FROM tbl_product WHERE product_id='$product_id'";
         if(mysqli_query($this->db_connect,$sql)){
            $query_result=mysqli_query($this->db_connect,$sql);
            $cart_info=mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($cart_info);
//            exit();
            session_start();
            $session_id=session_id();
            $sql="INSERT INTO tbl_tmp_cart(session_id,product_id,product_name,product_price,product_quantity,product_image)VALUES('$session_id','$product_id','$cart_info[product_name]','$cart_info[product_price]','$data[product_quantity]','$cart_info[product_image]')";
            mysqli_query($this->db_connect,$sql);
            header('location:cart.php');
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    //add to cart
    
    //get cart information
    public function select_cart_info_by_session_id($session_id){
        $sql="SELECT * FROM tbl_tmp_cart WHERE session_id='$session_id'";
          if(mysqli_query($this->db_connect,$sql)){
            $query_result=mysqli_query($this->db_connect,$sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    //get cart information
    
    //update cart quantity and amount
    public function update_cart_info($data){
        $sql="UPDATE tbl_tmp_cart SET product_quantity='$data[product_quantity]' WHERE tmp_cart_id='$data[tmp_cart_id]'";
         if(mysqli_query($this->db_connect,$sql)){
           $massage='Cart Update Successfully';
           return $massage ;
            
        }else{
            die('Query Problem'.mysqli_error($this->db_connect));
        }
    }
    //update cart quantity and amount
   
    //delete cart
    public function delete_tmp_info_by_id($tmp_cart_id){
          $sql="DELETE FROM tbl_tmp_cart WHERE tmp_cart_id='$tmp_cart_id'";
        if(mysqli_query($this->db_connect,$sql)){
             $massage='Cart Delete Successfully';
                return $massage;
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }
    //delete cart
    
    
    //category wise published
    public function select_all_published_product_by_category_id($category_id){
          $sql="SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1 ORDER BY product_id DESC";
        if(mysqli_query($this->db_connect,$sql)){
             $query_result=mysqli_query($this->db_connect,$sql);
             return $query_result;
               
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }
    //category wise published
    
    //customer signup
    public function save_customer_info($data){
        $password=md5($data['password']);
           $sql="INSERT INTO tbl_customer (first_name,last_name,email_address,password,phone_number,address,district,city) VALUES ('$data[first_name]','$data[last_name]','$data[email_address]','$password','$data[phone_number]','$data[address]','$data[district]','$data[city]')";
        if(mysqli_query($this->db_connect,$sql)){
            $customer_id=mysqli_insert_id($this->db_connect);
//            session_start();
            $_SESSION['customer_id']=$customer_id;
            $_SESSION['customer_name']=$data['first_name'].' '.$data['last_name'];
            
            //email verification
            $enc_customer_id= base64_encode($customer_id);
            $to=$data['email_address'];
            $subject="Customer Email Varification";
            $message="
                <span>Dear $data[last_name]. Thanks for joining our community</span><br/>
                <span>Your login information goes here....</span><br/>
                <span>Your Email Address:</span>$data[email_address].<br/>
                <span>Your Email Address:</span>$data[password]<br/>
                <span>To active your account please click the link:</span><br/>
                <a href='http://localhost/online-shop/update_customer_status.php?id=$enc_customer_id'>http://http:/localhost/online-shop/update_customer_status.php?id=$enc_customer_id</a>

                    ";
            $headers='Form:info@online_shop.com';
            mail($to, $subject, $message, $headers);
            echo $message;
            exit();
            
            //email verification
           // header('Location:shipping.php');
               
        }else{
              die('Query problem'.mysqli_error($this->db_connect));
        }
    }
    //customer signup
    
    
    //update customer
    public function update_customer_status($customer_id){
                $sql = "UPDATE tbl_customer SET activation_status=1 WHERE customer_id='$customer_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location:shipping.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //update customer
    
    
    //customer shipping function
    public function select_customer_info_by_id($customer_id) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    //customer shipping function
    
    
    
    //save shippping info
    public function save_shipping_info($data) {
        $sql = "INSERT INTO tbl_shipping (full_name,email_address,phone_number,address,district,city)VALUES('$data[full_name]','$data[email_address]','$data[phone_number]','$data[address]','$data[district]','$data[city]')";
        if (mysqli_query($this->db_connect, $sql)) {
             $shipping_id=mysqli_insert_id($this->db_connect);
            session_start();
            $_SESSION['shipping_id']=$shipping_id;
            header('Location:payment.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //save shippping info
    
    //save payment info
    public function save_order_info($data) {
        $payment_type = $data['payment'];
        if ($payment_type == 'cash') {
            session_start();
            $customer_id = $_SESSION['customer_id'];
            $shipping_id = $_SESSION['shipping_id'];
            $order_total = $_SESSION['order_total'];
            $sql = "INSERT INTO tbl_order (customer_id,shipping_id,order_total) VALUES ('$customer_id','$shipping_id','$order_total')";
            if (mysqli_query($this->db_connect, $sql)) {
                $order_id = mysqli_insert_id($this->db_connect);

                $sql = "INSERT INTO tbl_payment (order_id,payment_type) VALUES ('$order_id','$payment_type')";
                if (mysqli_query($this->db_connect, $sql)) {
                    $session_id= session_id();
                    $sql="SELECT * FROM tbl_tmp_cart WHERE session_id='$session_id'";
                    if(mysqli_query($this->db_connect, $sql)){
                        $query_result=mysqli_query($this->db_connect, $sql);
                        while ($product_info= mysqli_fetch_assoc($query_result)){
                            $sql="INSERT INTO tbl_order_details (order_id,product_id,product_name,product_price,product_quantity,product_image) VALUES ('$order_id','$product_info[product_id]','$product_info[product_name]','$product_info[product_price]','$product_info[product_quantity]','$product_info[product_image]')";
                            mysqli_query($this->db_connect, $sql);
                        }
                        $sql="DELETE FROM tbl_tmp_cart WHERE session_id='$session_id'";
                        mysqli_query($this->db_connect, $sql);
                        unset($_SESSION['order_total']);
                        header('Location:customer_home.php');
                    }else{
                        die('Query problem'. mysqli_error($this->db_connect));
                    }
                    
                } else {
                    die('Query problem' . mysqli_error($this->db_connect));
                }
            } else {
                die('Query problem' . mysqli_error($this->db_connect));
            }
        }
    }

    //save payment info
    
    
    
    
    //customer login
  
    public function customer_login_check($data){
        $email=$data['email_address'];
        $password=$data['password'];
       $enc_password= md5($password);
        $sql="SELECT email_address,password FROM tbl_customer WHERE email_address='$email' AND password='$enc_password'";
         if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            $customer_info=mysqli_fetch_assoc($query_result);
            if($customer_info){
                session_start();
                $_SESSION['customer_id']="hi";
                $_SESSION['customer_name']=$customer_info['customer_name'];
                $_SESSION['email_address']=$customer_info['email_address'];
               header('Location: index.php');
            } else {
                $massage='Your Email Address or Password Invalid';
                return $massage;
            }
            
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    //customer login
  
    
    //customer logout
    
    public function customer_logout(){
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['shipping_id']);
        
        header('Location: index.php');
    }
    //customer logout
    
    public function customer_login(){
         header('Location: checkout.php');
     
         
    }
    
    //for customer home
    
    public function select_customer_info_by_order_id(){
         $sql="SELECT* FROM tbl_customer ORDER BY customer_id DESC LIMIT 1";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
  }
?>