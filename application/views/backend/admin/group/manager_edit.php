<?php
$manager_details = $this->group_model->get_manager_details_by_id($manager_id)->row_array();

?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_manager'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_manager_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('group/manager/edit/'.$manager_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
          <div class="form-group">
                        <label for="name"><?php echo get_phrase('name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name" value="<?php echo $manager_details['name']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name = "email" value="<?php echo $manager_details['email']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase('phone'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="phone" name = "phone" value="<?php echo $manager_details['phone']; ?>" required>
                        
                    </div>


                    <div class="form-group">
		    			<label for="role_id"><?php echo get_phrase('choose_a_role'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="role_id" id="role_id">
		    				<option value=""><?php echo get_phrase('select_a_role'); ?></option>
		    				<?php foreach($this->group_model-> get_role()->result_array() as $role): ?>
		    					<option value="<?php echo $role['id']; ?>" <?php if($role['id'] == $manager_details['role_id'])echo 'selected'; ?>><?php echo $role['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    <div class="form-group">
                        <label for="designation"><?php echo get_phrase('designation'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="designation" name = "designation" value="<?php echo $manager_details['designation']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo get_phrase('password'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="password" name = "password" value="<?php echo $manager_details['password']; ?>" required>
                        
                    </div>
	                   
					
					
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
