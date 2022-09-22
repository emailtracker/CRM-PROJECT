<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
<section class="menu-area bg-white">
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg navbar-light">

            <ul class="mobile-header-buttons">
                <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
            </ul>

            <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                <img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="61">
            </a>
            <div class="user-box menu-icon-box">
                <div class="icon">
                    <a href="javascript:;">
                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="dropdown user-dropdown corner-triangle top-right radius-10">
                    <ul class="user-dropdown-menu radius-10">

                        <li class="dropdown-user-info">
                            <a href="javascript:;" class="radius-top-10">
                                <div class="clearfix">
                                    <div class="user-image float-start">
                                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            <span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                            <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>
                                        </div>
                                        <div class="user-email">
                                            <span class="email"><?php echo $user_details['email']; ?></span>
                                            <span class="welcome"><?php echo site_phrase("welcome_back"); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="dropdown-user-logout user-dropdown-menu-item radius-bottom-10"><a class="radius-bottom-10 py-3" href="<?php echo site_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('log_out'); ?></a></li>
                    </ul>
                </div>
            </div>



            <span class="signin-box-move-desktop-helper"></span>
            <div class="sign-in-box btn-group d-none">

                <button type="button" class="btn btn-sign-in" data-toggle="modal" data-target="#signInModal">Log In</button>

                <button type="button" class="btn btn-sign-up" data-toggle="modal" data-target="#signUpModal">Sign Up</button>

            </div> <!--  sign-in-box end -->


        </nav>
    </div>
</section>