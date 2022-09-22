<section class="menu-area bg-white">
  <div class="container-xl">
    <nav class="navbar navbar-expand-lg bg-white">

      <ul class="mobile-header-buttons">
        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav"><?php echo site_url('menu'); ?><span></span></a></li>
        <li><a class="mobile-search-trigger" href="#mobile-search"><?php echo site_url('search'); ?><span></span></a></li>
      </ul>

      <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" height="61"></a>
      <?php if ($this->session->userdata('admin_login')): ?>
        <div class="instructor-box menu-icon-box">
          <div class="icon">
            <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 8px;"><?php echo site_phrase('administrator'); ?></a>
          </div>
        </div>
      <?php endif; ?>

		
      <span class="signin-box-move-desktop-helper"></span>
      <div class="sign-in-box btn-group">

        <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php echo site_phrase('log_in'); ?></a>


      </div> <!--  sign-in-box end -->
    </nav>
  </div>
</section>
