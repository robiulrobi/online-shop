<?php

$enc_customer_id=$_GET['id'];
$customer_id=base64_decode($enc_customer_id);

require './classes/application_class.php';
$obj_application=new Application();
$obj_application->update_customer_status($customer_id);