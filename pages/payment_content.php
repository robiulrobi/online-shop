
<?php

//save payment info
if(isset($_POST['btn'])){
    $obj_application->save_order_info($_POST);
}
//save payment info


?>

<?php

////delete cart
//if(isset($_GET['status'])){
//    $tmp_cart_id=$_GET['id'];
//    if($_GET['status']=='delete'){
//        $massage=$obj_application->delete_tmp_info_by_id($tmp_cart_id);
//    }
//}



//update cart info
if(isset($_POST['btn'])){
    $massage=$obj_application->update_cart_info($_POST);
}
//update cart info

$session_id=session_id();
$query_result=$obj_application->select_cart_info_by_session_id($session_id);


?>



<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
                                        <h2 class="text-success text-center"><?php if(isset($massage)){ echo $massage; unset($massage);}?></h2>
                                        <h2 class="text-success text-center">Here is Your Cart Product</h2>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                                            <?php $sum=0; while($cart_product=mysqli_fetch_assoc($query_result)) { ?>
                                            
						<tr>
							<td class="cart_product">
                                                            <a href=""><img src="assets/<?php echo $cart_product['product_image']?>" alt="" height="70" width="50"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $cart_product['product_name']?></a></h4>
								<p>Web ID: <?php echo $cart_product['product_id']?></p>
							</td>
							<td class="cart_price">
								<p>BDT <?php echo $cart_product['product_price']?></p>
							</td>
                                                        <td class="cart_quantity">
                                                            <form action="" method="POST">
                                                                <div class="cart_quantity_button">
                                                                    <input class="cart_quantity_input" type="text" name="product_quantity" value="<?php echo $cart_product['product_quantity'] ?>" autocomplete="off" size="2">
                                                                    <input class="cart_quantity_input" type="hidden" name="tmp_cart_id" value="<?php echo $cart_product['tmp_cart_id'] ?>">
                                                                    <input type="submit" name="btn" value="Update" class="cart_quantity_down">
                                                                </div>
                                                            </form>
                                                            </td>
							<td class="cart_total">
                                                            <p class="cart_total_price">
                                                                <?php
                                                                $total=$cart_product['product_price']*$cart_product['product_quantity'];
                                                                echo 'BDT'.' ' . $total;
                                                                ?>
                                                            </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="?status=delete&&id=<?php echo $cart_product['tmp_cart_id']?>" title="Delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                                                
                                            <?php $sum=$sum+$total; } ?>
					</tbody>
				</table>
                            <table class="table table-condensed" style="width: 50%;float: right;text-align: center;">


                                <tr class="cart_menu">
                                    <td>Sub Total</td>
                                    <td>BDT <?php echo $sum; ?></td>
                                </tr>
                                <tr>
                                    <td>Vat Total</td>
                                    <td>
                                        <?php
                                        $vat = ($sum * 10) / 100;
                                        echo 'BDT' . ' ' . $vat;
                                        ?>
                                    </td>
                                </tr>
                                <tr  class="cart_menu">
                                    <td>Grand Total</td>
                                    <td>BDT 
                                        <?php
                                        $grand_total= $sum + $vat;
                                        $_SESSION['order_total']=$grand_total;
                                        echo $grand_total;
                                        ?>
                                    </td>
                                </tr>


                            </table>
			</div>
		</div>
	</section> <!--/#cart_items-->
        
     

	

<section id="cart_items">
    <div class="container">
        <div class="row">
        <div class="col-sm-5.5 col-sm-offset-6">
        <div class="table-responsive cart_info">
            <form action="" method="POST">
                <table class="table table-condensed">
                    <thead>
                    <h2 class="text-black text-center">Payment Method</h2>
                    <tr class="cart_menu">
                        <td>Cash</td>
                        <td style="text-align: center">PayPal</td>
                        <td style="text-align: right">Bkash</td>
                    </tr>
                    </thead>
                    <tbody>

                    <td><input type="radio" name="payment" value="cash"/></td>
                    <td style="text-align: center"><input type="radio" name="payment" value="paypal"/></td>
                    <td style="float: right;"><input type="radio" name="payment" value="bkash"/></td>
                    </tbody>
                </table>
                <button style="color: orange;" type="submit" name="btn" class="btn btn-block"> Confirm Order </button>
            </form>
        </div>
        </div>
        </div>
    </div>
</section>