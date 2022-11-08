<!-- start page title -->
<div class="row">
  <div class="col-12">
  	 <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('import_courses_scheduled'); ?></h4>
            </div> <!-- end card body-->
        </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('import_country_file'); ?></h4>

          <form class="required-form" action="<?php echo site_url('admin/country/import'); ?>" method="post" enctype="multipart/form-data">		    				    		
		    		<div class="form-group">
                       <label for="schedule_crse"><?php echo get_phrase('Import_Excel_File'); ?></label>
                       <div>
                       		<input type="file" class="form-control" name="country_files" id="country_files">
						</div>
					</div>
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>