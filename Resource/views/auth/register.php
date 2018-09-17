<?php include '../layouts/auth-header.php'; ?>

   <br/>
    <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           <form action="../../../controllers/RegisterController.php" method="post">
            <h1>Sign up</h1>
                <div>
                    <input type="text" class="form-control-sm" name="owner_firstname" placeholder="First Name*" required>
                </div>
                <div>
                    <input type="text" class="form-control-sm" name="owner_lastname" placeholder="Last Name*" required>
                </div>
                <div>
                    <input type="text" class="form-control-sm" name="owner_mi" placeholder="Middle Initial">
                </div>
                <div>
                    <input type="text" class="form-control-sm" name="owner_username" placeholder="Username*" required>
                </div>
                <div>
                    <input type="password" class="form-control-sm" name="owner_password" placeholder="Password*" required>
                </div>
                <div>
                     <input type="submit" class="btn btn-sm btn-info form-control" value="Register" name="register" style="display: block; margin: 0 auto;" value="sa">
                </div>
                <br/>
                  <div class="clearfix"></div>
                  <br/>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
              </div>
                <div class="form-group text-center">
                    <span>Already have an account? <a href="../../../index.php">Login now</a></span>
                </div>
                <div>
                  <p>© Dear Diary • 2018</p>
                </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
<body>
     
   </body>
   </html>



     