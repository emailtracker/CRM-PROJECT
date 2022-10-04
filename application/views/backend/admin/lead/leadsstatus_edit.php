<?php
$leads_status_details = $this->custom_model->get_leads_status_details_by_id($leadsstatus_id)->row_array();

?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_leadstatus'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_leadsstatus_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('leads/leadsstatus/edit/'.$leadsstatus_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
          <div class="form-group">
                        <label for="name"><?php echo get_phrase('leads_status'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="leadsstatus" name = "leadsstatus" value="<?php echo $leads_status_details['leadsstatus']; ?>" required>
                        
                    </div>
	                   
					
					
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
