        <?php
if(isset($_GET['status'])){
    if($_GET['status']=='logout'){
        $obj_application->customer_logout();
    }
}

if(isset($_GET['status'])){
    if($_GET['status']=='login'){
        $obj_application->customer_login();
    }
}


?>


<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img src="assets/front-end-assets/images/home/logo.png" alt="" /></a>
						</div>						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                                                <?php 
                                                                if(isset($_SESSION['customer_id'])) { ?>
								<li><a href="?status=logout"><i class="fa fa-lock"></i> Logout</a></li>
                                                                <?php }else { ?>
                                                                <li><a href="?status=login"><i class="fa fa-lock"></i> Login</a></li>
                                                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>