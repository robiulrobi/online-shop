<?php
include'../classes/product.php';

$obj_view_product = new Product();

$product_id=$_GET['id'];
$query_result=$obj_view_product->view_product_by_id($product_id);

$view_product=mysqli_fetch_assoc($query_result);


?>


<div class="row-fluid sortable">
    <div class="box span12">
       <div class="box-header" data-orginal-title>
           <h2>View Product Table</h2>
           <h3 class="text-success" style="text-align:center;"><?php if(isset($massage)) {echo $massage; unset($massage);}?></h3>
           <h3 class="text-success" style="text-align:center;"><?php if(isset($_SESSION['massage'])) {echo $_SESSION['massage']; unset($_SESSION['massage']);}?></h3>
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
                  <td><?php echo $view_product['product_id']?></td>
              </tr>
               <tr>
                  <td>Product Name</td>
                  <td><?php echo $view_product['product_name']?></td>
              </tr>
               <tr>
                  <td>Category Name</td>
                  <td><?php echo $view_product['category_name']?></td>
              </tr>
               <tr>
                  <td>Manufacture Name</td>
                  <td><?php echo $view_product['manufacture_name']?></td>
              </tr>
               <tr>
                  <td>Product Price</td>
                  <td><?php echo $view_product['product_price']?></td>
              </tr>
               <tr>
                  <td>Stock Amount</td>
                  <td><?php echo $view_product['stock_amount']?></td>
              </tr>
               <tr>
                  <td>Minimum Stock Id</td>
                  <td><?php echo $view_product['minimum_stock_amount']?></td>
              </tr>
               <tr>
                  <td>Short Description</td>
                  <td><?php echo $view_product['product_short_description']?></td>
              </tr>
               <tr>
                  <td>Long Description</td>
                  <td><?php echo $view_product['product_long_description']?></td>
              </tr>
               <tr>
                  <td>Product Image</td>
                  <td><img src="<?php echo $view_product['product_image']?>" alt="<?php echo $view_product['product_name']?>"></td>
              </tr>
               <tr>
                  <td>Publication Status</td>
                  <td>
                      
                           <?php
                         if($view_product['publication_status']==1){
                             echo 'Published';
                         }else{
                             echo 'Unpublished';
                         }
                         
                         ?>
                  </td>
              </tr>
          </table>
           
       </div>
        
    </div>
</div>