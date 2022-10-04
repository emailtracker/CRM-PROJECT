<?php
$role_details = $this->group_model->get_role_details_by_id($role_id)->row_array();

?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_role'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_role_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('group/role/edit/'.$role_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
          <div class="form-group">
                        <label for="name"><?php echo get_phrase('name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name" value="<?php echo $role_details['name']; ?>" required>
                        
                    </div>
	                   
					
					
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
