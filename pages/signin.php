
<?php session_start();?>
<!DOCTYPE html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mora Exams | Management Site</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">
  </head>
  <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div style="text-align: center;" class="brand-logo">
                  <img  src="../assets/img/logo.jpg">
                </div>
                <h4 style="text-align: center;">Mora Exams - 2021</h4>
                <h6 style="text-align: center;" class="font-weight-light">Management Site | Log in</h6>
                <?php 
                    if(isset($_SESSION['msg1'])){
                        echo $_SESSION['msg1'];
                    }
                
                
                ?>
                <form method="POST" action="user/login.php" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="uname"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="pw" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                      <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" type="submit">
                  </div>
                  
                
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="signup.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    
    
    
    <!-- endinject -->
    <?php unset( $_SESSION['msg1']);?>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"><template shadowmode="open"><div aria-label="grammarly-integration" tabindex="-1" data-content="{&quot;mode&quot;:&quot;full&quot;,&quot;isActive&quot;:true,&quot;isUserDisabled&quot;:false}"></div></template></grammarly-desktop-integration></html>
