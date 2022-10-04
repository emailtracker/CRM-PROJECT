<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_leadssource'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('add_leadssource'); ?></h4>

                <form class="required-form" action="<?php echo site_url('leads/leadsstatus/add'); ?>" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group ">
                        <label for="name"><?php echo get_phrase('leads_statuses'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="leadsstatus" name = "leadsstatus" required>
                    </div>

                    
                                                                                            									             
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


