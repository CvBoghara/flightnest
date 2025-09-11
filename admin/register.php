<?php include_once 'header.php'; ?>
<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid Email")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if($_GET['error'] === 'usernameexists') {
        echo '<script>alert("Username already exists")</script>';
    } else if($_GET['error'] === 'emailexists') {
        echo '<script>alert("Email already exists")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo "<script>alert('Database error')</script>";
    }
}
?>
<link rel="stylesheet" href="../assets/css/form.css">
<style>
  body {
    /* padding-top: 20px; */
    background: #485563;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #29323c, #485563);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #29323c, #485563); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
  }    
  input {
    border :0px !important;
    border-bottom: 2px solid #424242 !important;
    color :#424242 !important;
    border-radius: 0px !important;
    font-weight: bold !important;
    background-color: whitesmoke !important;    
  }
  *:focus {
    outline: none !important;
  }
  label {
    color : #828282 !important;
    font-size: 19px;
  }
  h5.form-name {
    color: #424242;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 50;
    margin-bottom: 0px !important;
    margin-top: 10px;
  }
  h1 {
    font-size: 45px !important;
    margin-bottom: 20px;  
    font-family :'product sans';
    font-weight: bolder;
  }
  div.form-out {
    /* border-radius: 40px; */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: whitesmoke !important;
    padding: 40px;
    margin-top: 80px;
  }
  .input-group {
  position: relative;
  display: inline-block;
  width: 100%;
  }
  select {
    float: right;
    font-weight: bold !important;
    color :#424242 !important;
  }
  @media screen and (max-width: 900px){
    body {
      background-color: lightblue;
      background-image: none;
    }
    div.form-out {
    padding: 20px;
    background-color: none !important;
    margin-top: 20px;
  }  
}  
</style>
<main>
<div class="container mt-0">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="bg-light form-out col-md-6">
      <h1 class="text-secondary text-center">ADMINISTRATOR REGISTRATION</h1>
      
      <form method="POST" class=" text-center" 
        action="../includes/admin/register.inc.php">

        <div class="form-row">  
            <div class="col-1 p-0 mr-1">
                <i class="fa fa-user text-secondary" 
                    style="float: right;margin-top:35px;"></i>
            </div> 
          <div class="col-10 mb-2">              
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
              </div>              
          </div>       
          <div class="col-1 p-0 mr-1">
                <i class="fa fa-envelope text-secondary" 
                    style="float: right;margin-top:35px;"></i>
          </div>                
          <div class="col-10 mb-2">
            <div class="input-group">
                <label for="email_id">Email</label>
                <input type="email" name="email_id" id="email_id" required>
              </div>            
          </div>
          <div class="col-1 p-0 mr-1">
                <i class="fa fa-lock text-secondary" 
                    style="float: right;margin-top:35px;"></i>
          </div>                
          <div class="col-10 mb-2">
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
              </div>            
          </div>
          <div class="col-1 p-0 mr-1">
                <i class="fa fa-lock text-secondary" 
                    style="float: right;margin-top:35px;"></i>
          </div>                
          <div class="col-10">
            <div class="input-group">
                <label for="password_repeat">Confirm Password</label>
                <input type="password" name="password_repeat" id="password_repeat" required>
              </div>            
          </div>          
        </div>              

        <div class="d-flex justify-content-between mt-5">
        <button name="signup_submit" type="submit" class="btn btn-danger d-flex align-items-center px-4">
            <i class="fa fa-lg fa-user-plus me-2"></i>
            <span style="font-size: 1.2rem;">Register</span>
        </button>
        <button type="button" class="btn btn-secondary d-flex align-items-center px-4" onclick="window.location.href='login.php'">
            <i class="fa fa-lg fa-arrow-right me-2"></i>
            <span style="font-size: 1.2rem;">Login</span>
        </button>
        </div>

       <div class="mt-3">
        
        </div>

      </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</div>    
</main>

<?php include_once 'footer.php'; ?>

<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
});
</script>