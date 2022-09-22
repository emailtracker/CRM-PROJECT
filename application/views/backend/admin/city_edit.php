<?php
$city_details = $this->custom_model->get_city_details_by_id($city_id)->row_array();
?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_city'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_city_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('admin/city/edit/'.$city_id); ?>" method="post" enctype="multipart/form-data">		    		
		    		<div class="form-group">
		    			<label for="cc_countryid"><?php echo get_phrase('Country_name'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="cc_countryid" id="cc_countryid">
		    				<option value=""><?php echo get_phrase('select_a_country'); ?></option>
		    				<?php foreach($this->custom_model->get_country()->result_array() as $country): ?>
		    					<option value="<?php echo $country['c_id']; ?>" <?php if($country['c_id'] == $city_details['cc_countryid'])echo 'selected'; ?>><?php echo $country['c_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>
                    
	                     <div class="form-group">
	                        <label for="code"><?php echo get_phrase('city_name'); ?></label>
	                        <input type="text" class="form-control" id="cc_name" name = "cc_name" value="<?php echo $city_details['cc_name']; ?>">
	                    </div>
	                     <div class="form-group">
	                        <label for="cc_address"><?php echo get_phrase('City_address'); ?></label>
	                        <input type="text" class="form-control" id="cc_address" name = "cc_address" value="<?php echo $city_details['cc_address']; ?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="cc_about"><?php echo get_phrase('City_about'); ?></label>
	                        <input type="text" class="form-control" id="cc_about" name = "cc_about" value="<?php echo $city_details['cc_about']; ?>">
	                    </div>
					
					 <div class="form-group">
                        <label for="parent"><?php echo get_phrase('city_status'); ?></label>
                         <select class="form-control select2" data-toggle="select2" name="cc_status " id="cc_status ">
                              <option value="1" <?php if ($city_details['cc_status'] == 1) echo 'selected'; ?>>Enable</option>
                              <option value="0" <?php if ($city_details['cc_status'] == 0) echo 'selected'; ?>>Disable</option>
                        </select>
                    </div>
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>