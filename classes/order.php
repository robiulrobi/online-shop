<?php
class Order {
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
    
       //order manage
    public function select_all_order_info(){
         $sql="SELECT o.*,c.first_name,c.last_name,p.payment_type,p.payment_status FROM  tbl_order as o,tbl_customer as c,tbl_payment as p WHERE o.customer_id = c.customer_id AND o.order_id = p.payment_id";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    //order manage
    
    
    //customer info by order id
    
    public function customer_info_by_order_id($order_id){
         $sql="SELECT o.order_id, o.customer_id, c.* FROM tbl_order as o,tbl_customer as c WHERE o.customer_id = c.customer_id AND o.order_id = $order_id";
            if(mysqli_query($this->db_connect,$sql)){
                $query_result=mysqli_query($this->db_connect,$sql);
                return $query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
    }
    
     //customer info by order id
    
    
    //shipping info by order id
     public function shipping_info_by_order_id($order_id){
           $sql="SELECT o.order_id, o.shipping_id, s.* FROM tbl_order as o,tbl_shipping as s WHERE o.shipping_id = s.shipping_id AND o.order_id = $order_id";
            if(mysqli_query($this->db_connect,$sql)){
                $shipping_query_result=mysqli_query($this->db_connect,$sql);
                return $shipping_query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
     }
    //shipping info by order id
     
     
     //payment info by order id
     
     public function payment_info_by_order_id($order_id){
          $sql="SELECT o.order_id, p.* FROM tbl_order as o,tbl_payment as p WHERE o.order_id = p.order_id AND o.order_id = $order_id";
            if(mysqli_query($this->db_connect,$sql)){
                $payment_query_result=mysqli_query($this->db_connect,$sql);
                return $payment_query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
     }
     
     //payment info by order id
     
     
     //product info by order id
     
       public function product_info_by_order_id($order_id){
          $sql="SELECT o.order_id, od.* FROM tbl_order as o,tbl_order_details as od WHERE o.order_id = $order_id";
            if(mysqli_query($this->db_connect,$sql)){
                $product_query_result=mysqli_query($this->db_connect,$sql);
                return $product_query_result;
                
            }else{
                die('Query problem'.mysqli_error($this->db_connect));
            }
     }
     //product info by ordern id
}
