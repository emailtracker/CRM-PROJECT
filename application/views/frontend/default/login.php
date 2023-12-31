<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<section class="category-course-list-area">
    <div class="container">
      <div class="row mb-5 mt-3">
        <div class="col-md-12 text-center">
          <h1 class="fw-700"><?php echo site_phrase('login'); ?></h1>
          <p class="text-14px"><?php echo site_phrase('provide_your_valid_login_credentials'); ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 d-none d-lg-block text-center">
           
          </div>
          <div class="col-lg-6">
          <div class="sign-up-form">
            <?php if(get_settings('fb_social_login')) include "facebook_login.php"; ?>

            <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post" id="sign_up">
              <div class="form-group">
                <label for="login-email"><?php echo site_phrase('email'); ?></label>
                <div class="input-group">
                  <span class="input-group-text bg-white" for="email"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="<?php echo site_phrase('email'); ?>" aria-label="<?php echo site_phrase('email'); ?>" aria-describedby="<?php echo site_phrase('email'); ?>" id="login-email" required>
                </div>
              </div>

              <div class="form-group">
                <label for="login-password"><?php echo site_phrase('password'); ?></label>
                <div class="input-group">
                  <span class="input-group-text bg-white" for="password"><i class="fas fa-key"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="<?php echo site_phrase('password'); ?>" aria-label="<?php echo site_phrase('password'); ?>" aria-describedby="<?php echo site_phrase('password'); ?>" id="login-password" required>
                </div>
                
              </div>

              <div class="form-group">
                <button type="submit" class="btn red mt-4 w-100"><?php echo site_phrase('login'); ?></button>
              </div>

             
            </form>
          </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block text-center">
           
          </div>
      </div>
    </div>
</section>