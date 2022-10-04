<!-- start page title -->

<html>
    <body>
    
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_leads'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('add_leads'); ?></h4>

                <form class="required-form" action="<?php echo site_url('leads/leads/add'); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label for="name"><?php echo get_phrase('fullname'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name" required>
                    </div>

                   

                    <div class="form-group ">
                        <label for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name = "email" required>
                    </div>

                    <div class="form-group ">
                        <label for="phonenumber"><?php echo get_phrase('mobile'); ?></label>
                        <input type="text" class="form-control" id="phonenumber" name = "phonenumber">
                    </div>

                    <div class="form-group ">
                        <label for="website"><?php echo get_phrase('website'); ?></label>
                        <input type="text" class="form-control" id="website" name = "website" >
                    </div>

                    <div class="form-group ">
                        <label for="company"><?php echo get_phrase('company'); ?></label>
                        <input type="text" class="form-control" id="company" name = "company" >
                    </div>


                    <div class="form-group ">
                        <label for="desigination"><?php echo get_phrase('designation'); ?></label>
                        <input type="text" class="form-control" id="designation" name = "designation" >
                    </div>


                    <div class="form-group ">
                        <label for="address"><?php echo get_phrase('address'); ?></label>
                        <input type="text" class="form-control" id="address" name = "address" >
                    </div>

                     <div class="form-group ">
		    			<label for="category"><?php echo get_phrase('preffered_category'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="category" id="category" >
		    				<option value=""><?php echo get_phrase('select_a_category'); ?></option>
		    				<?php foreach($this->crud_model->get_categories()->result_array() as $category): ?>
		    					<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    <div class="form-group ">
		    			<label for="course"><?php echo get_phrase('preffered_course');  ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="course" id="course" >
		    				
                            <option value="">Select Course</option>
                            
		    			</select>
		    		</div>


                    <div class="form-group ">
                        <label for="tmode"><?php echo get_phrase('training_mode'); ?></label>
                        <input type="text" class="form-control" id="tmode" name = "tmode" >
                    </div>

                    <div class="form-group ">
		    			<label for="country"><?php echo get_phrase('preffered_country'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="country" id="country" >
		    				<option value=""><?php echo get_phrase('select_a_country'); ?> </option>
		    				<?php foreach($this->custom_model->get_country()->result_array() as $country): ?>
		    					<option value="<?php echo $country['c_id']; ?>"><?php echo $country['c_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


                    
                    <div class="form-group ">
		    			<label for="city"><?php echo get_phrase('preffered_city');  ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="city" id="city" >
		    				
                            <option value="">Select City</option>
                            
		    			</select>
		    		</div>


                    <div class="form-group ">
                        <label for="zip"><?php echo get_phrase('Zip Code'); ?></label>
                        <input type="text" class="form-control" id="zip" name = "zip" >
                    </div>


                    <div class="form-group ">
		    			<label for="leadsource"><?php echo get_phrase('lead_source'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="leadsource" id="leadsource" >
		    				<option value=""><?php echo get_phrase('lead_source'); ?> </option>
		    				<?php foreach($this->custom_model->get_leads_source()->result_array() as $leadssource): ?>
		    					<option value="<?php echo $leadssource['id']; ?>"><?php echo $leadssource['sourcename']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                    

                    
                    <div class="form-group ">
		    			<label for="role"><?php echo get_phrase('assign_to'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="assigned" id="assigned" >
		    				<option value=""><?php echo get_phrase('assign_to'); ?></option>
		    				<?php foreach($this->custom_model->get_role()->result_array() as $role): ?>
		    					<option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

                   


                    <div class="form-group ">
		    			<label for="lead_status"><?php echo get_phrase('lead_status'); ?> </label>
		    			<select class="form-control select2" data-toggle="select2" name="leadstatus" id="leadstatus" >
		    				<option value=""><?php echo get_phrase('lead_status'); ?></option>
		    				<?php foreach($this->custom_model->get_leads_status()->result_array() as $leadsstatus): ?>
		    					<option value="<?php echo $leadsstatus['id']; ?>"><?php echo $leadsstatus['leadsstatus']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>


                    <div class="form-group  ">
                        <label for="description"><?php echo get_phrase('description'); ?></label>
                        <textarea class="form-control" id="description" name = "description" ></textarea>
                    </div>
                           
                            
                            
                                                                                            									             
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                            </body>

<script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>

$("document"). ready(function(){

$("#country").change(function(){
var cc_countryid = $(this).val();
if(cc_countryid!=""){

$.ajax ({
    url:'<?php echo base_url('admin/getcities') ?>',
    type: 'get',
    data: {cc_countryid:cc_countryid},
    
    success: function(data){
        $("#city").html(data);
    }
});

}
else {
$("city").html(' <option value="">Select City</option>');
}
});
});


$("document"). ready(function(){

    $("#category").change(function(){
        var parent = $(this).val();
        if(parent!=""){
            $.ajax ({
                url:'<?php echo base_url('admin/getcourse')?>',
                type:'get',
                data: {parent:parent},

                success: function(data){
                    $("#course").html(data);
                }
            });
        }
        else{

            $("course").html ('<option value="">Select Course</option>');
        }
    });

});





    </script>
                                


</html>