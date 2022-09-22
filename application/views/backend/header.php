<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo'));?>" alt="" height="61">
            </span>
            <span class="topnav-logo-sm">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('small_logo'));?>" alt="" height="61">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
      
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" class="rounded-circle">
                </span>
                <span  style="color: #fff;">
                    <?php
                    $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
                    ?>
                    <span class="account-user-name"><?php echo $logged_in_user_details['first_name'].' '.$logged_in_user_details['last_name'];?></span>
                    <span class="account-position">
                        <?php
                            if(strtolower($this->session->userdata('role')) == 'user'){
                                if($this->session->userdata('is_instructor')){
                                    echo get_phrase('instructor');
                                }else{
                                    echo get_phrase('student');
                                }
                            }else{
                                echo get_phrase('admin');
                            }
                        ?>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
            aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0"><?php echo get_phrase('welcome'); ?> !</h6>
            </div>

            <!-- Account -->
            <?php if($this->session->userdata('admin_login') == 1): ?>
                <a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span><?php echo get_phrase('my_account'); ?></span>
                </a>
            <?php else: ?>
                <a href="<?php echo site_url('home/profile/user_profile'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span><?php echo get_phrase('my_account'); ?></span>
                </a>
            <?php endif; ?>


            <!-- Logout-->
            <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span><?php echo get_phrase('logout'); ?></span>
            </a>

        </div>
    </li>
</ul>
<a class="button-menu-mobile disable-btn">
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
</a>

</div>
</div>
<!-- end Topbar -->