  
<?php
include'../classes/order.php';
$obj_order = new Order();
$order_id=$_GET['id'];
$query_result=$obj_order->customer_info_by_order_id($order_id);
$customer_info=mysqli_fetch_assoc($query_result);

$shipping_query_result=$obj_order->shipping_info_by_order_id($order_id);
$shipping_info=mysqli_fetch_assoc($shipping_query_result);

$payment_query_result=$obj_order->payment_info_by_order_id($order_id);
$payment_info=mysqli_fetch_assoc($payment_query_result);

$product_query_result=$obj_order->product_info_by_order_id($order_id);
$product_info=mysqli_fetch_assoc($product_query_result);
?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-orginal-title>
            <h2  style="text-align: center;" class="text-primary">Customer Info Table</h2>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($massage)) {
    echo $massage;
    unset($massage);
} ?></h3>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($_SESSION['massage'])) {
    echo $_SESSION['massage'];
    unset($_SESSION['massage']);
} ?></h3>
            <div class="box-icon">
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Customer Name</td>
                    <td><?php echo $customer_info['first_name'].' '.$customer_info['last_name']?></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><?php echo $customer_info['address']?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $customer_info['phone_number']?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><?php echo $customer_info['email_address']?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $customer_info['city']?></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><?php echo $customer_info['district']?></td>
                </tr>
            </table>

        </div>

    </div>
</div>

<br/>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-orginal-title>
            <h2 style="text-align: center;" class="text-primary">Shipping Info Table</h2>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($massage)) {
    echo $massage;
    unset($massage);
} ?></h3>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($_SESSION['massage'])) {
    echo $_SESSION['massage'];
    unset($_SESSION['massage']);
} ?></h3>
            <div class="box-icon">
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Customer Name</td>
                    <td><?php echo $shipping_info['full_name']?></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><?php echo $shipping_info['address']?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $shipping_info['phone_number']?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><?php echo $shipping_info['email_address']?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $shipping_info['city']?></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><?php echo $shipping_info['district']?></td>
                </tr>
            </table>

        </div>

    </div>
</div>
<br/>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-orginal-title>
            <h2 style="text-align: center;" class="text-primary">Payment Info Table</h2>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($massage)) {
    echo $massage;
    unset($massage);
} ?></h3>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($_SESSION['massage'])) {
    echo $_SESSION['massage'];
    unset($_SESSION['massage']);
} ?></h3>
            <div class="box-icon">
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Payment Type</td>
                    <td><?php echo $payment_info['payment_type']?></td>
                </tr>
                <tr>
                    <td>Payment Status</td>
                    <td><?php echo $payment_info['payment_status']?></td>
                </tr>
            </table>

        </div>

    </div>
</div>


<br/>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-orginal-title>
            <h2 style="text-align: center;" class="text-primary">Product Info Table</h2>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($massage)) {
    echo $massage;
    unset($massage);
} ?></h3>
            <h3 class="text-success" style="text-align:center;"><?php if (isset($_SESSION['massage'])) {
    echo $_SESSION['massage'];
    unset($_SESSION['massage']);
} ?></h3>
            <div class="box-icon">
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
                <a href="#" class="btn-setting"></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Product Id</td>
                    <td><?php echo $product_info['product_id']?></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td><?php echo $product_info['product_name']?></td>
                </tr>
                <tr>
                    <td>Product Image</td>
                    <td><img src="<?php echo $product_info['product_image']?>" alt="<?php echo $product_info['product_name']?>"></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><?php echo $product_info['product_price']?></td>
                </tr>
                <tr>
                    <td>Product Quantity</td>
                    <td><?php echo $product_info['product_quantity']?></td>
                </tr>
            </table>

        </div>

    </div>
</div>