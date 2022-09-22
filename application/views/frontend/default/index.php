<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo ucwords($page_title).' | '.get_settings('system_name'); ?></title>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5.0, minimum-scale=0.86">
	<meta name="author" content="<?php echo get_settings('author') ?>" />

	<meta name="keywords" content="<?php echo get_settings('website_keywords'); ?>"/>
	<meta name="description" content="<?php echo get_settings('website_description'); ?>" />

	<meta property="og:url" content="<?php echo current_url(); ?>" />
	<meta property="og:type" content="Learning management system" />
	<!--Social sharing content-->

	<link name="favicon" type="image/x-icon" href="<?php echo base_url('uploads/system/'.get_frontend_settings('favicon')); ?>" rel="shortcut icon" />
	<?php
	include 'includes_top.php';
	?>
	

</head>
<body class="gray-bg">
	<?php
	
	if ($this->session->userdata('user_login')) {
		include 'logged_in_header.php';
		}else {
			include 'logged_out_header.php';
		}

  	
  	if($page_name === null){
  		include $path;
  	}else{
		include $page_name.'.php';
	}
		include 'footer.php';
		include 'includes_bottom.php';		
		include 'common_scripts.php';
	
	?>
</body>
</html>
