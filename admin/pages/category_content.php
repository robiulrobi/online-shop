
<?php


require'../classes/category_class.php';
$obj_category= new Category();

if(isset($_POST['btn'])){
 $massage =$obj_category->save_category_info($_POST);
}



?>

  
  
<!--
  <div class="form-group">
   <h3 class="text-primary">Add Category Form</h3>
   <h4 style="color:green;"></h4>
   </div>
-->
   <div class="box-header" data-orginal-title>
           <h2>Add Category Information</h2>
           <h4 style="color:green;"><?php if(isset($massage)) {echo $massage;} ?></h4>
   </div>
    <form action="" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="formGroupExampleInput" placeholder="Type Category name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Category Description</label>
    <div><textarea name="category_description" rows="10" class="form-control" id="ckeditor" ></textarea></div>
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
    <input type="submit" name="btn" value="Published Your Category" class="btn btn-primary">
     <input type="reset" name="btn" value="Reset" class="btn btn-danger">
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
