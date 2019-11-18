<?php

//save shippin info
if(isset($_POST['save'])){
    $obj_application->save_shipping_info($_POST);
}
//save shipping info

//customer shipping function
    $customer_id=$_SESSION['customer_id'];
    $query_result=$obj_application->select_customer_info_by_id($customer_id);
    $customer_info=mysqli_fetch_assoc($query_result);
//customer shipping function

?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 style="text-align: center;">Congratulations <b><?php echo $_SESSION['customer_name'];?>. You Are Successfully Signin/Signup</b></h2>
                    <h4 style="text-align: center;">If Your Shipping & Billing Information Same,Then Press Save Shipping Info Button otherwise give your shipping information</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="signup-form"><!--sign up form-->   
                        <form action="#" method="POST">
                            <input type="text" value="<?php echo $customer_info['first_name'].' '.$customer_info['last_name'];?>" name="full_name" placeholder="Full Name" />
                            <input type="email" value="<?php echo $customer_info['email_address'];?>" name="email_address" placeholder="Email Address"/>
                            <input type="text" value="<?php echo $customer_info['phone_number'];?>" name="phone_number" placeholder="Contact Number"/>
                            <input type="text" value="<?php echo $customer_info['address'];?>" name="address" placeholder="Address"/>
                            <input type="text" value="<?php echo $customer_info['district'];?>" name="district" placeholder="District"/>
                            <input type="text" value="<?php echo $customer_info['city'];?>" name="city" placeholder="City"/>
                            <button type="submit" name="save" class="btn btn-default btn-block">Save Shipping Info</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </div>
</div>

