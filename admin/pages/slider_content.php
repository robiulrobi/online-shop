
<?php

if(isset($_POST['btn'])){
    require '../classes/super_admin.php';
    $obj_sup_admin=new Super_admin();
   $massage= $obj_sup_admin->save_slider_image($_POST);
}


?>

<h4 style="color:green;"><?php if(isset($massage)) {echo $massage;} ?></h4>
<form action="" method="POST" enctype="multipart/form-data" >
    
  <div class="form-group">
   Add Your Image: <input type="file" name="image">

  </div>
  <div class="form-group">
    <input type="submit" name="btn" value="Update Your Slider" class="btn btn-primary">
  </div>
</form>