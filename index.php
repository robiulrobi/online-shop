
<?php
ob_start();
session_start();
require'./classes/application_class.php';

$obj_application= new Application();



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="assets/front-end-assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/front-end-assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/front-end-assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/front-end-assets/css/price-range.css" rel="stylesheet">
    <link href="assets/front-end-assets/css/animate.css" rel="stylesheet">
	<link href="assets/front-end-assets/css/main.css" rel="stylesheet">
	<link href="assets/front-end-assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	<?php include'./includes/header_top.php';?>
		
		<?php include'./includes/header_middle.php';?><!--/header-middle-->
	
		<?php include'./includes/header_bottom.php';?><!--/header-bottom-->
	</header><!--/header-->
	
	
	<?php
    if(isset($pages)){
        if($pages=='category'){
            include'./pages/shop_content.php';
            
        }else if($pages=='product-details'){
            include'./pages/product_details_content.php';
            
        }else if($pages=='checkout'){
            include'./pages/checkout_content.php';
            
        }else if($pages=='cart'){
            include'./pages/cart_content.php';
            
        }else if($pages=='login'){
            include'./pages/login_content.php';
            
        }else if($pages=='blog'){
            include'./pages/blog_content.php';
            
        }else if($pages=='blog-single'){
            include'./pages/blog_single.php';
            
        }else if($pages=='contact'){
            include'./pages/contact_content.php';
        }else if($pages=='shipping'){
            include'./pages/shipping_content.php';
        }else if($pages=='payment'){
            include'./pages/payment_content.php';
        }else if($pages=='customer_home'){
            include'./pages/customer_home_content.php';
        }
        
        
    }else{
        include'./pages/home_content.php';
    }
    
    ?>
    
    
    
	<footer id="footer"><!--Footer-->
		<?php include'./includes/footer_top.php';?>
		
		<?php include'./includes/footer_middle.php'?>
		
		<?php include'./includes/footer_bottom.php'?>
		
	</footer><!--/Footer-->
	

  
    <script src="assets/front-end-assets/js/jquery.js"></script>
	<script src="assets/front-end-assets/js/bootstrap.min.js"></script>
	<script src="assets/front-end-assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/front-end-assets/js/price-range.js"></script>
    <script src="assets/front-end-assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/front-end-assets/js/main.js"></script>
</body>
</html>