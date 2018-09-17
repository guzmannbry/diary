
   <br/>
    <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="controllers/LoginController.php" method="post">
              <h1>Sign in</h1>
              <div>
                <input type="text" name="owner_username" class="form-control-sm" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="owner_password" class="form-control-sm" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-sm btn-info form-control" value="Login" name="login" style="display: block; margin: 0 auto;" value="sa">
              </div>
              <br/>
              <br/>
              <br/>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Make an account?
                  <a href="resource/views/auth/register.php" class="to_register">Create Account</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>© Dear Diary • 2018</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>