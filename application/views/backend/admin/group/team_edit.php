<?php
$team_details = $this->group_model->get_team_details_by_id($team_id)->row_array();

?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_team_member'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_team_member_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('group/team/edit/'.$team_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
          <div class="form-group">
                        <label for="name"><?php echo get_phrase('name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="first_name" name = "first_name" value="<?php echo $team_details['first_name']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name = "email" value="<?php echo $team_details['email']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase('phone'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="phone" name = "phone" value="<?php echo $team_details['phone']; ?>" required>
                        
                    </div>

                    <div class="form-group">
		    			<label for="department_id"><?php echo get_phrase('select_a_department'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="department_id" id="department_id">
		    				<option value=""><?php echo get_phrase('select_a_department'); ?></option>
		    				<?php foreach($this->group_model-> get_department()->result_array() as $department): ?>
		    					<option value="<?php echo $department['id']; ?>" <?php if($department['id'] == $team_details['department_id'])echo 'selected'; ?>><?php echo $department['department']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


            <div class="form-group">
		    			<label for="role_id"><?php echo get_phrase('choose_a_role'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="role_id" id="role_id">
		    				<option value=""><?php echo get_phrase('select_a_role'); ?></option>
		    				<?php foreach($this->group_model-> get_role()->result_array() as $role): ?>
		    					<option value="<?php echo $role['id']; ?>" <?php if($role['id'] == $team_details['role_id'])echo 'selected'; ?>><?php echo $role['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


            <div class="form-group">
		    			<label for="manager_id"><?php echo get_phrase('select_a_manager'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="manager_id" id="manager_id">
		    				<option value=""><?php echo get_phrase('select_a_manager'); ?></option>
		    				<?php foreach($this->group_model-> get_manager()->result_array() as $manager): ?>
		    					<option value="<?php echo $manager['id']; ?>" <?php if($manager['id'] == $team_details['manager_id'])echo 'selected'; ?>><?php echo $manager['first_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>



                    <div class="form-group">
                        <label for="designation"><?php echo get_phrase('designation'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="designation" name = "designation" value="<?php echo $team_details['designation']; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo get_phrase('password'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="password" name = "password" value="<?php echo $team_details['password']; ?>" required>
                        
                    </div>
	                   
					
					
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
