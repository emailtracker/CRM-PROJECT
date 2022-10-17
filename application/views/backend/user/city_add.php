<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_city'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('city_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('user/city/add'); ?>" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
		    			<label for="cc_countryid"><?php echo get_phrase('Country_name'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="cc_countryid" id="cc_countryid" required>
		    				<option value=""><?php echo get_phrase('select_a_country'); ?></option>
		    				<?php foreach($this->custom_model->get_country()->result_array() as $country): ?>
		    					<option value="<?php echo $country['c_id']; ?>"><?php echo $country['c_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>
                    
                     <div class="form-group">
                        <label for="cc_name"><?php echo get_phrase('city_name'); ?></label>
                        <input type="text" class="form-control" id="cc_name" name = "cc_name">
                    </div>
                     <div class="form-group">
                        <label for="cc_address"><?php echo get_phrase('City_address'); ?></label>
                        <input type="text" class="form-control" id="cc_address" name = "cc_address">
                    </div>
                    <div class="form-group">
                        <label for="cc_about"><?php echo get_phrase('City_about'); ?></label>
                        <input type="text" class="form-control" id="cc_about" name = "cc_about">
                    </div>
					
					 <div class="form-group">
                        <label for="parent"><?php echo get_phrase('city_status'); ?></label>
                         <select class="form-control select2" data-toggle="select2" name="cc_status" id="cc_status">
                              <option value="1"><?php echo get_phrase('Enable'); ?></option>
                              <option value="0"><?php echo get_phrase('Disable'); ?></option>
                        </select>
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
