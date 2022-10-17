<?php
$leads_details = $this->custom_model->get_leads_details_by_id($leads_id)->row_array();
?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update_leads'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_lead_form'); ?></h4>

          <form class="required-form" action="<?php echo site_url('leads/leads/edit/'.$leads_id); ?>" method="post" enctype="multipart/form-data">		    		
		    	
                    
	                     <div class="form-group">
	                        <label for="fulname"><?php echo get_phrase('fullname'); ?></label>
	                        <input type="text" class="form-control" id="name" name = "name" value="<?php echo $leads_details['name']; ?>">
	                    </div>
	                     <div class="form-group">
	                        <label for="email"><?php echo get_phrase('email'); ?></label>
	                        <input type="text" class="form-control" id="email" name = "email" value="<?php echo $leads_details['email']; ?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="phonenumber"><?php echo get_phrase('phone_number'); ?></label>
	                        <input type="text" class="form-control" id="phonenumber" name = "phonenumber" value="<?php echo $leads_details['phonenumber']; ?>">
	                    </div>

                      <div class="form-group">
	                        <label for="website"><?php echo get_phrase('website'); ?></label>
	                        <input type="text" class="form-control" id="website" name = "website" value="<?php echo $leads_details['website']; ?>">
	                    </div>

                      <div class="form-group">
	                        <label for="company"><?php echo get_phrase('company'); ?></label>
	                        <input type="text" class="form-control" id="company" name = "company" value="<?php echo $leads_details['company']; ?>">
	                    </div>


                      <div class="form-group">
	                        <label for="designation"><?php echo get_phrase('designation'); ?></label>
	                        <input type="text" class="form-control" id="designation" name = "designation" value="<?php echo $leads_details['designation']; ?>">
	                    </div>

                      <div class="form-group">
	                        <label for="address"><?php echo get_phrase('address'); ?></label>
	                        <input type="text" class="form-control" id="address" name = "address" value="<?php echo $leads_details['address']; ?>">
	                    </div>

                      <div class="form-group">
		    			<label for="category"><?php echo get_phrase('preffered_category'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="category" id="category">
		    				<option value=""><?php echo get_phrase('select_a_category'); ?></option>
		    				<?php foreach($this->crud_model->get_categories()->result_array() as $category): ?>
		    					<option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $leads_details['category'])echo 'selected'; ?>><?php echo $category['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

					
					<div class="form-group">
		    			<label for="course"><?php echo get_phrase('preffered_course'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="course" id="course">
		    				<option value=""><?php echo get_phrase('select_a_course'); ?></option>
		    				<?php foreach($this->crud_model->get_course()->result_array() as $course): ?>
		    					<option value="<?php echo $course['id']; ?>" <?php if($course['id'] == $leads_details['course'])echo 'selected'; ?>><?php echo $course['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


					
					

            <div class="form-group">
	                        <label for="tmode"><?php echo get_phrase('training_mode'); ?></label>
	                        <input type="text" class="form-control" id="tmode" name = "tmode" value="<?php echo $leads_details['tmode']; ?>">
	                    </div>



                             
            <div class="form-group">
		    			<label for="country"><?php echo get_phrase('preffered_country'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="country" id="country">
		    				<option value=""><?php echo get_phrase('select_a_country'); ?></option>
		    				<?php foreach($this->custom_model->get_country()->result_array() as $country): ?>
		    					<option value="<?php echo $country['c_id']; ?>" <?php if($country['c_id'] == $leads_details['country'])echo 'selected'; ?>><?php echo $country['c_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


            <div class="form-group">
		    			<label for="city"><?php echo get_phrase('preffered_city'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="city" id="city">
		    				<option value=""><?php echo get_phrase('select_a_city'); ?></option>
		    				<?php foreach($this->custom_model->get_city()->result_array() as $city): ?>
		    					<option value="<?php echo $city['cc_id']; ?>" <?php if($city['cc_id'] == $leads_details['city'])echo 'selected'; ?>><?php echo $city['cc_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>
            

            <div class="form-group">
	                        <label for="zipcode"><?php echo get_phrase('zipcode'); ?></label>
	                        <input type="text" class="form-control" id="zip" name = "zip" value="<?php echo $leads_details['zip']; ?>">
	                    </div>


                      <div class="form-group">
		    			<label for="leadsource"><?php echo get_phrase('lead_source'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="leadsource" id="leadsource">
		    				<option value=""><?php echo get_phrase('select_a_lead_source'); ?></option>
		    				<?php foreach($this->custom_model->get_leads_source()->result_array() as $ls): ?>
		    					<option value="<?php echo $ls['id']; ?>" <?php if($ls['id'] == $leads_details['leadsource'])echo 'selected'; ?>><?php echo $ls['sourcename']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


            <div class="form-group">
		    			<label for="assigned_to"><?php echo get_phrase('assigned_to'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="assigned" id="assigned">
		    				<option value=""><?php echo get_phrase('assigned_to'); ?></option>
		    				<?php foreach($this->custom_model->get_role()->result_array() as $role): ?>
		    					<option value="<?php echo $role['id']; ?>" <?php if($role['id'] == $leads_details['assigned'])echo 'selected'; ?>><?php echo $role['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

            <div class="form-group">
		    			<label for="cc_countryid"><?php echo get_phrase('lead_status'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="leadstatus" id="leadstatus">
		    				<option value=""><?php echo get_phrase('select_a_lead_status'); ?></option>
		    				<?php foreach($this->custom_model-> get_leads_status()->result_array() as $leadstatus): ?>
		    					<option value="<?php echo $leadstatus['id']; ?>" <?php if($leadstatus['id'] == $leads_details['leadstatus'])echo 'selected'; ?>><?php echo $leadstatus['leadsstatus']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>
        

					
	
            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>