<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_country'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('country_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('user/country/add'); ?>" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('Country_name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="c_name" name = "c_name" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="code"><?php echo get_phrase('Country_code'); ?></label>
                        <input type="text" class="form-control" id="c_code" name = "c_code">
                    </div>
                     <div class="form-group">
                        <label for="code"><?php echo get_phrase('Time_zone'); ?></label>
                        <input type="text" class="form-control" id="c_timezone" name = "c_timezone" value="">
                    </div>
                     <div class="form-group">
                        <label for="code"><?php echo get_phrase('Currency_name'); ?></label>
                        <input type="text" class="form-control" id="c_currency_name" name = "c_currency_name" value="">
                    </div>
                     <div class="form-group">
                        <label for="code"><?php echo get_phrase('Currency_symbol'); ?></label>
                        <input type="text" class="form-control" id="c_currency_symbol" name = "c_currency_symbol" value="">
                    </div>
                    <div class="form-group">
                        <label for="code"><?php echo get_phrase('Contact_cnumber'); ?></label>
                        <input type="text" class="form-control" id="c_cnumber" name = "c_cnumber" value="">
                    </div>
					
					 <div class="form-group">
                        <label for="parent"><?php echo get_phrase('Country_status'); ?></label>
                         <select class="form-control select2" data-toggle="select2" name="c_status" id="c_status">
                              <option value="1"><?php echo get_phrase('Enable'); ?></option>
                              <option value="0"><?php echo get_phrase('Disable'); ?></option>
                        </select>
                    </div>
                    <div class="form-group" id = "thumbnail-picker-area">
                        <label> <?php echo get_phrase('Country_flag'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 50 X 50)</small> </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="country_thumbnail" name="country_thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                <label class="custom-file-label" for="country_thumbnail"><?php echo get_phrase('choose_flag'); ?></label>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script type="text/javascript">
    function checkCategoryType(category_type) {
        if (category_type > 0) {
            $('#thumbnail-picker-area').hide();
        }else {
            $('#thumbnail-picker-area').show();
        }
    }
</script>
