  
<?php
include'../classes/order.php';
$obj_order = new Order();
$query_result = $obj_order->select_all_order_info();
?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-orginal-title>
            <h2>Manage Order Table</h2>
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
                <thead class="table table-primary">
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php while ($order_info = mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                            <td style="width: 10%;"><?php echo $order_info['order_id'] ?></td>
                            <td style="width: 15%;"><?php echo $order_info['first_name'] . ' ' . $order_info['last_name']; ?></td>
                            <td style="width: 10%;"><?php echo $order_info['order_total'] ?></td>
                            <td style="width: 15%;"><?php echo $order_info['order_status'] ?></td>
                            <td style="width: 10%;"><?php echo $order_info['payment_type'] ?></td>
                            <td style="width: 15%;"><?php echo $order_info['payment_status'] ?> </td>
                            
                            <td class="center">
                                    <a class="btn btn-primary" href="view_order.php?id=<?php echo $order_info['order_id'] ?>" title="View Order"><i class='fas fa-arrow-alt-circle-right'></i></a>
                                    <a class="btn btn-primary" href="view_invoice.php?id=<?php echo $order_info['order_id'] ?>" title="View Invoice"><i class='fas fa-arrow-alt-circle-left'></i></a>
                                    <a class="btn btn-danger" href="?status=delete&&id=<?php echo $order_info['order_id'] ?>" onclick=" return check_delete();" title="Download Invoice"  ><i class="fas fa-download"></i></a>
                                    
                                      
                                        <?php if($_SESSION['access-level']== 1) { ?>
                                    
                                    <a class="btn btn-info" href="edit_order.php?id=<?php echo $order_info['order_id'] ?>" title="Edit Order"><i class="far fa-edit"></i></a>
                                    <a class="btn btn-danger" href="?status=delete&&id=<?php echo $order_info['order_id'] ?>" onclick=" return check_delete();" title="Delete"  ><i class="fas fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                        </tr>
<?php } ?>

                </tbody>

            </table>

        </div>

    </div>
</div>