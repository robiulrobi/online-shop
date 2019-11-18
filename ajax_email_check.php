<?php

$email_address=$_GET['email'];

require './classes/super_admin.php';


$obj_sup_admin= new Super_admin();
$email_query=$obj_sup_admin->customer_email_check($email_address);
$customer_info=mysqli_fetch_assoc($email_query);
if ($customer_info) {
    echo 'Email Address Already Exist';
} else {
    echo 'Email Address Available';
}

