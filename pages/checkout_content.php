<?php
////customer login
if(isset($_POST['btn'])){
    $massage=$obj_application->customer_login_check($_POST);
}
////customer login

//customer signup
if(isset($_POST['signup'])){
    $obj_application->save_customer_info($_POST);
}
//customer signup



?>

<!--ajax email-->
<script> 
    
var xmlHttp= new XMLHttpRequest();
function ajax_email_check(given_email,objID){
//   alert(objID);
   var server_page='ajax_email_check.php?email='+given_email;
        xmlHttp.open('$_GET', server_page);
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById(objID).innerHTML = xmlHttp.responseText;
                if (xmlHttp.responseText == 'Email Address Already Exist') {
                    document.getElementById('ajax').disabled = true;
                } else {
                    document.getElementById('ajax').disabled = false;
                }

            }
        }
        xmlHttp.send(null);
    }

</script>


<!--ajax email-->



<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="login-form"><!--login form-->
                <h2>Login Here</h2>
                <h2 style="color:red;"><?php if(isset($massage)){echo $massage;}?></h2>
                <form action="#" method="POST">
                    <div>
                        <label> Email Address</label>
                        <input type="email" name="email_address" placeholder="Email Address"/>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="********" />
                    </div>

                    <div>
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                    </div>
                    <div>
                        <button type="submit" name="btn" class="btn btn-default btn-block"> Login </button>
                    </div> 
                </form> 
                <hr>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>             
            </div><!--/login form-->
        </div>
        <div class="col-sm-1">
            <h2 class="or">OR</h2>
        </div>
        
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <form action="#" method="POST">                    
                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="First Name"/>
                    </div>
                     <div>
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Last Name"/> 
                    </div>
                    <div>
                        <label>Email Address</label>
                        <input type="email" name="email_address" placeholder="Email Address" onblur="ajax_email_check(this.value, 'res');"/>
                        <span id="res"></span> 
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="********"/>
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" placeholder="Contact Number"/>
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Address"/>
                    </div>
                    <div>
                        <label>District Name</label>
                         <input type="text" name="district" placeholder="District"/>
                    </div>
                     <div>
                        <label>City Name</label>
                         <input type="text" name="city" placeholder="City"/>
                    </div>
                     <div>
                         <button type="submit" id="ajax" name="signup" class="btn btn-default btn-block">Signup</button>
                    </div>
                </form>
                <hr>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
