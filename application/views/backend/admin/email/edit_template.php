 <?php
$mailtemplate_details = $this->email_model->get_mailtemplate_details_by_id($mailtemplate_id)->row_array();

 ?>  
 
<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_email_template'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_template_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('Emailtemplate/mailtemplate/edit/'.$mailtemplate_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
          <div class="form-group">
                        <label for="templatename"><?php echo get_phrase('templatename'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="template_name" name = "template_name" value="<?php echo $mailtemplate_details['template_name']; ?>" required>
         </div>

            <div class="form-group">
            <label for="body"> <?php echo get_phrase('body'); ?> <span class="required">*</span></label>
              
              <textarea name="body" type="text"  id="summernote-basic" class="form-control" value="">
                <?php echo $mailtemplate_details['body']; ?>
              </textarea>
                                            
            </div>

            <div class="form-group">
              <label for="remainder interval date"> <?php echo get_phrase('remainder interval date');?><span class="required">*</span></label>
              <input type="number" name="remainder_interval_date" id="remainder_interval_ date" class="form-control" value="<?php echo $mailtemplate_details['remainder_interval_date']; ?>" required>
            </div>
	                   
					
					
            <button type="button" class="btn btn-primary"  onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
