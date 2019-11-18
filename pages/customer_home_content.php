
<?php

//session_start();
//$order_id=$_SESSION['order_id'];
//require 'classes/application_class.php';
//$obj_application= new Application();
$query_result=$obj_application->select_customer_info_by_order_id();
$customer_info=mysqli_fetch_assoc($query_result);


?>
<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
                                        <h2 class="text-success text-center"><?php if(isset($massage)){ echo $massage; unset($massage);}?></h2>
						<tr class="cart_menu">
							<td class="image">Customer Name</td>
							<td class="description">Email Address</td>
							<td class="price">Phone Number</td>
							<td class="quantity">Address</td>
							<td class="total">City</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                                           
					</tbody>
				</table>
                           
			</div>
		</div>
	</section> <!--/#cart_items-->
        
      