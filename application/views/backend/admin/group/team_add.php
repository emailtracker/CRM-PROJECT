<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_team_member'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('add_team_member'); ?></h4>

                <form class="required-form" action="<?php echo site_url('group/team/add'); ?>" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="manager"><?php echo get_phrase('name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="first_name" name = "first_name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name = "email" required>
                    </div>
                                
                    
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase('phone'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="phone" name = "phone" required>
                    </div>
 
                    <div class="form-group ">
		    			<label for="role"><?php echo get_phrase('select_a_role'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="role_id" id="role_id" >
		    				<option value=""><?php echo get_phrase('role'); ?></option>
		    				<?php foreach($this->group_model->get_role()->result_array() as $role): ?>
		    					<option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    <div class="form-group ">
		    			<label for="department"><?php echo get_phrase('select_a_department'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="department_id" id="department_id" >
		    				<option value=""><?php echo get_phrase('department'); ?></option>
		    				<?php foreach($this->group_model->get_department()->result_array() as $department): ?>
		    					<option value="<?php echo $department['id']; ?>"><?php echo $department['department']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    <div class="form-group ">
		    			<label for="manager"><?php echo get_phrase('select_a_manager'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="manager_id" id="manager_id" >
		    				<option value=""><?php echo get_phrase('select_a_manager'); ?></option>
		    				<?php foreach($this->group_model->get_manager()->result_array() as $manager): ?>
		    					<option value="<?php echo $manager['id']; ?>"><?php echo $manager['first_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    <div class="form-group">
                        <label for="designation"><?php echo get_phrase('designation'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="designation" name = "designation" required>
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo get_phrase('password'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="password" name = "password" required>
                      
                    </div>

  


                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


