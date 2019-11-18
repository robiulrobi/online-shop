
<?php

require '../classes/application_class.php';
require '../classes/product.php';
$obj_apps=new Application();
$category_query_result=$obj_apps->select_all_published_category();
$manufacture_query_result=$obj_apps->select_published_manufacture();


if(isset($_POST['btn'])){
    $obj_product=new Product();
    $massage=$obj_product->save_product_info($_POST);
}


?>


 <div class="box-header" data-orginal-title>
           <h2>Add Product Information</h2>
           <h4 style="color:green;"><?php if(isset($massage)) {echo $massage;} ?></h4>
   </div>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">  Product  Name</label>
    <input type="text" name="product_name" class="form-control" id="formGroupExampleInput" placeholder="Type Product name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2"> Category Name  </label>
        <select name="category_id">
            <option>---Select Category Name---</option>
            <?php while($category_info = mysqli_fetch_assoc($category_query_result)) { ?>
            <option value="<?php echo $category_info['category_id']?>"><?php echo $category_info['category_name']?></option>
            <?php } ?>
        </select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Manufacture Name</label>
        <select name="manufacture_id">
            <option>---Select Manufacture Name---</option>
            <?php while($manufacture_info = mysqli_fetch_assoc($manufacture_query_result)) { ?>
            <option value="<?php echo $manufacture_info['manufacture_id'] ?>"><?php echo $manufacture_info['manufacture_name'] ?></option>
            <?php } ?>
        </select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Product Price</label>
    <input type="number" name="product_price" class="form-control" id="formGroupExampleInput" placeholder="Type Product Price">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Stock Amount</label>
    <input type="number" name="stock_amount" class="form-control" id="formGroupExampleInput" placeholder="Type Stock Amount">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Minimum Stock</label>
    <input type="number" name="minimum_stock_amount" class="form-control" id="formGroupExampleInput" placeholder="Type Minimum Stock Amount">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Short Description</label>
    <div><textarea name="product_short_description" rows="10" class="form-control" id="ckeditor" ></textarea></div>
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Long Description</label>
    <div><textarea name="product_long_description" rows="10" class="form-control" id="ckeditor" ></textarea></div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Product Image</label>
    <input type="file" name="product_image" class="form-control" id="formGroupExampleInput">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Publication Status</label>
        <select name="publication_status">
            <option>---Select Publication Status---</option>
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
  </div>
  <div class="form-group">
    <input type="submit" name="btn" value="Published Your Product" class="btn btn-primary btn btn-block">
  </div>
  <div class="form-group">
     <input type="reset" name="btn" value="Reset" class="btn btn-danger btn btn-block">
  </div>
</form>

<!--ckeditor code-->

<!--
<script src="../assets/admin-assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('ckeditor');
</script>
-->

<!--ckeditor code-->
