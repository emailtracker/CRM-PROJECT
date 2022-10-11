
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'] . ' ' . $admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>
		
		<!-- Murugan Added here -->
		<?php if (has_permission('country')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'country' || $page_name == 'country_add' || $page_name == 'country_edit') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'country' || $page_name == 'country_add' || $page_name == 'country_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('country'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('country')) : ?>
						<li class="<?php if ($page_name == 'country' || $page_name == 'country_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/country'); ?>"><?php echo get_phrase('manage_country'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('country')) : ?>
						<li class="<?php if ($page_name == 'country_add') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/country_form/add_country'); ?>"><?php echo get_phrase('add_new_country'); ?></a>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>
		
		<?php if (has_permission('city')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'city' || $page_name == 'city_add' || $page_name == 'city_edit') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'city' || $page_name == 'city_add' || $page_name == 'city_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('city'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('city')) : ?>
						<li class="<?php if ($page_name == 'city' || $page_name == 'city_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/city'); ?>"><?php echo get_phrase('manage_city'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('city')) : ?>
						<li class="<?php if ($page_name == 'city_add') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/city_form/add_city'); ?>"><?php echo get_phrase('add_new_city'); ?></a>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>


		<?php if (has_permission('course')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit' || $page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' || $page_name == 'coupons' || $page_name == 'coupon_add' || $page_name == 'coupon_edit' || $page_name == 'add_bundle' || $page_name == 'manage_course_bundle' || $page_name == 'edit_bundle' || $page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit' || $page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' || $page_name == 'coupons' || $page_name == 'coupon_add' || $page_name == 'coupon_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('courses'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					
					<?php if (has_permission('category')) : ?>
						<li class="<?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('course_category'); ?></a>
						</li>
					<?php endif; ?>		
				</ul>
			</li>
		<?php endif; ?>


		<?php if (has_permission('user')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('admin'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('admins')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" class="<?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>" aria-expanded="false"><?php echo get_phrase('admins'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
									<a href="<?php echo site_url('admin/admins'); ?>" class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>"><?php echo get_phrase('manage_admins'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'admin_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/admin_form/add_admin_form'); ?>"><?php echo get_phrase('add_new_admin'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>			
				</ul>
			</li>
		<?php endif; ?>


		<?php if (has_permission('leads')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'leads' || $page_name == 'leadssource_add' || $page_name == 'leadssource_edit') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'leads' || $page_name == 'leadsource_add' || $page_name == 'leadssource_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('leadsmanagement'); ?> </span>
					<span class="menu-arrow"></span>
				</a>

				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('leads')) : ?>
						<li class="<?php if ($page_name == 'leads_add' || $page_name == 'leads_add') echo 'active'; ?>">
							<a href="<?php echo site_url('leads/leads/leads_view'); ?>"><?php echo get_phrase('leads'); ?></a>
						</li>
					<?php endif; ?>


				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('leads')) : ?>
						<li class="<?php if ($page_name == 'leadssource_add' || $page_name == 'leadssource_add') echo 'active'; ?>">
							<a href="<?php echo site_url('leads/leadssource/leadssource'); ?>"><?php echo get_phrase('leads_source'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('leads')) : ?>
						<li class="<?php if ($page_name == 'leadssource_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('leads/leadsstatus/leadsstatus'); ?>"><?php echo get_phrase('leads_statuses'); ?></a>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>


		</ul>

		<?php if (has_permission('user management')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'user_management' || $page_name == 'manage_group' || $page_name == 'manage_admin' || $page_name == 'manage_manager' || $page_name == 'manage_team') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'user_management' || $page_name == 'manage_group' || $page_name == 'manage_admin' | $page_name == 'manage_manager' | $page_name == 'manage_team') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('Usermanagement'); ?> </span>
					<span class="menu-arrow"></span>
				</a>

				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('user management')) : ?>
						<li class="<?php if ($page_name == 'manage_role' || $page_name == 'manage_role') echo 'active'; ?>">
							<a href="<?php echo site_url('group/role/manage_role'); ?>"><?php echo get_phrase('manage_role'); ?></a>
						</li>
					<?php endif; ?>


				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('user management')) : ?>
						<li class="<?php if ($page_name == 'manage_manager' || $page_name == 'manage_manager') echo 'active'; ?>">
							<a href="<?php echo site_url('group/manager/manage_manager'); ?>"><?php echo get_phrase('manage_manager'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('user management')) : ?>
						<li class="<?php if ($page_name == 'manage_manager') echo 'active'; ?>">
							<a href="<?php echo site_url('group/department/manage_department'); ?>"><?php echo get_phrase('manage_department'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('user management')) : ?>
						<li class="<?php if ($page_name == 'manage_team') echo 'active'; ?>">
							<a href="<?php echo site_url('group/team/manage_team'); ?>"><?php echo get_phrase('manage_team'); ?></a>
						</li>
					<?php endif; ?>


				</ul>
			</li>
		<?php endif; ?>

					</ul>

				


					<?php if (has_permission('mail')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'mail' || $page_name == 'mail_add' || $page_name == 'mail_starred' || $page_name == 'mail_sent' || $page_name == 'mail_trash' || $page_name == 'mail_edit') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'mail' || $page_name == 'mail_add' || $page_name == 'mail_sent' || $page_name == 'mail_trash' || $page_name == 'mail_trash' ) : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('mail'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					
					<?php if (has_permission('manage_mail')) : ?>
						<li class="<?php if ($page_name == 'manage_mail' || $page_name == 'mail_add' || $page_name == 'mail_starred') echo 'active'; ?>">
							<a href="<?php echo site_url('group/mail/manage_mail'); ?>"><?php echo get_phrase('manage_mail'); ?></a>
						</li>
					<?php endif; ?>		
				</ul>
			</li>
		<?php endif; ?>

					


	
</div>