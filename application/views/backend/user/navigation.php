<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>
		<?php if (get_settings('allow_campaign_manager') == 1) : ?>
			<?php if ($this->session->userdata('is_campaign_manager')) : ?>
				<li class="side-nav-item">
					<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link <?php if ($page_name == 'dashboard') echo 'active'; ?>">
						<i class="dripicons-view-apps"></i>
						<span><?php echo get_phrase('dashboard'); ?></span>
					</a>
				</li>
				
			<?php else : ?>
				
			<?php endif; ?>
		<?php endif; ?>



		<li class="side-nav-item">
			<a href="<?php echo site_url('home/profile/user_profile'); ?>" class="side-nav-link">
				<i class="dripicons-user"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>

		

	</ul>
</div>