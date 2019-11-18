<?php
//session_start();
include'../classes/product.php';


$obj_manage_product = new Product();




//unpublished code
if(isset($_GET['status'])){
    $product_id=$_GET['id'];
    if($_GET['status']=='unpublished'){
        $massage=$obj_manage_product->unpublished_product_by_id($product_id);
    }
}

//unpublished code

//published category code
if(isset($_GET['status'])){
    $product_id=$_GET['id'];
    if($_GET['status']=='published'){
        $massage=$obj_manage_product->published_product_by_id($product_id);
    }
}

//published category code

//delete category

if(isset($_GET['status'])){
    $product_id=$_GET['id'];
    if($_GET['status']=='delete'){
        $massage=$obj_manage_product->delete_product_by_id($product_id);
    }
}




//delete category


$query_result=$obj_manage_product->select_all_product_info();

//    while($product_info=mysqli_fetch_assoc($query_result)){
//        echo "<pre>";
//        print_r($product_info);
//    }
//    exit();
//    




?>
   

   
   <div class="row-fluid sortable">
    <div class="box span12">
       <div class="box-header" data-orginal-title>
           <h2>Manage Product Table</h2>
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
             <thead class="table table-primary">
                 <tr>
                     <th>Product Name</th>
                     <th>Category Name</th>
                     <th>Manufacture Name</th>
                     <th>Price</th>
                     <th>Stock</th>
                     <th>Status</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                <?php while($product_info=mysqli_fetch_assoc($query_result)) { ?>
                 <tr>
                     <td style="width: 10%;"><?php echo $product_info['product_name']?></td>
                     <td style="width: 15%;"><?php echo $product_info['category_name']?></td>
                     <td style="width: 15%;"><?php echo $product_info['manufacture_name']?></td>
                     <td style="width: 15%;"><?php echo $product_info['product_price']?></td>
                     <td style="width: 10%;"><?php echo $product_info['stock_amount']?></td>
                     <td style="width: 15%;">
                        <?php
                         if($product_info['publication_status']==1){
                             echo 'Published';
                         }else{
                             echo 'Unpublished';
                         }
                         
                         ?>
                        
                    </td>
                     <td class="center" style="width: 30%;">
                         <a class="btn btn-primary" href="view_product.php?id=<?php echo $product_info['product_id']?>" title="view_product"><i class='fas fa-arrow-alt-circle-right'></i></a>
                         
                        <?php if($product_info['publication_status']==1){?>
                        
                         <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $product_info['product_id']?>" title="unpublished">
                         <i class="fas fa-arrow-down"></i></a>
                         
                         <?php }else{?>
                         
                         <a class="btn btn-danger" href="?status=published&&id=<?php echo $product_info['product_id']?>" title="published"><i class="fas fa-arrow-up"></i></a>
                         
                         <?php } ?>
                         
                         <a class="btn btn-info" href="edit_product.php?id=<?php echo $product_info['product_id']?>" title="edit_product"><i class="far fa-edit"></i></a>
                         
                         <a class="btn btn-danger" href="?status=delete&&id=<?php echo $product_info['product_id']?>" onclick=" return check_delete();" title="Delete"  ><i class="fas fa-trash"></i></a>
                     </td>
                 </tr>
                 <?php } ?>
                 
             </tbody>
              
          </table>
           
       </div>
        
    </div>
   </div>