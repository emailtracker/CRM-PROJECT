 <div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('auto_mail_sending'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                     <h4 class="mb-3 header-title"><?php echo get_phrase('auto_mail_sending');?></h4>
                     <form class="required-form" action="<?php echo site_url('Emailtemplate/automail_form/automail_template');?>" enctype="multipart/form-data" method="post" class="form-control">


                        <div class="form-group">
                            <label for="from"><?php echo get_phrase('from'); ?> <span class="required">*</span></label>
                            <input type="text" name="from_mail" id = "from" class="form-control" value="<?php echo get_settings('from');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="to"><?php echo get_phrase('to'); ?> <span class="required">*</span></label>
                            <input type="text" name = "to_mail" id = "to" class="form-control" value="<?php echo get_settings('to');  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cc"><?php echo get_phrase('cc'); ?> <span class="required">*</span></label>
                            <input type="text" name = "cc" id = "cc" class="form-control" value="<?php echo get_settings('cc');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="subject"><?php echo get_phrase('subject'); ?> <span class="required">*</span></label>
                            <input type="text" name = "subject" id = "subject" class="form-control" value="<?php echo get_settings('subject');  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="body"><?php echo get_phrase('body'); ?> <span class="required">*</span></label>
                            <textarea name="message" id="summernote-basic" class="form-control"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="attache file"><?php echo get_phrase('attache file'); ?> <span class="required">*</span></label>
                            <div>
                            <input type="file" class="form-control" name="image_name" id="files">
                            <input type="file" class="form-control" name="image_name" id="files">
                            <input type="file" class="form-control" name="image_name" id="files">
                        </div>
                        </div> -->
                        <div class="form-group">
                            <label for="automail"><?php echo get_phrase('auto mail'); ?> <span class="required">*</span></label>
                             <select class="form-control select2" data-toggle="select"  id="automail">
                              <option value=""><?php echo get_phrase('aws certification'); ?></option>
                              <option value=""><?php echo get_phrase('project management'); ?></option>
                              <option value=""><?php echo get_phrase('leadership'); ?></option>
                              <option value=""><?php echo get_phrase('pmp certificate '); ?></option>
                              <option value=""><?php echo get_phrase('marketing certification '); ?></option>
                              <option value=""><?php echo get_phrase('sales certification '); ?></option>
                              <option value=""><?php echo get_phrase('skill trade certification '); ?></option>
                              <option value=""><?php echo get_phrase('human resourse certification '); ?></option>
                            </select>
                        </div>
 


                       <!--  <div class="form-group">
		    			<label for="cc_countryid"><?php echo get_phrase('Country_name'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="cc_countryid" id="cc_countryid" required>
		    				<option value=""><?php echo get_phrase('select_a_country'); ?></option>
		    				<?php foreach($this->email_model->get_mailtemplate()->result_array() as $country): ?>
		    					<option value="<?php echo $country['id']; ?>"><?php echo $country['template_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>  -->


                    <!-- <div class="form-group">
		    			<label for=""><?php echo get_phrase('template_name_title'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="template_id" id="template_id" required>
		    				<option value=""><?php echo get_phrase('select_a_template'); ?></option>
		    				<?php foreach($this->email_model->get_mailtemplate()->result_array() as $country): ?>
		    					<option value="<?php echo $country['id']; ?>"><?php echo $country['template_name']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>
 
                          <button type="button" class="btn btn-outline-primary " onclick="checkRequiredFields()"><?php echo get_phrase('cancel'); ?></button>
                          <button type="button" class="btn btn-primary me-3" onclick="checkRequiredFields()"><?php echo get_phrase('send'); ?></button> -->

                            <div class="form-group">
                            <label for="attach file"><?php echo get_phrase('attach file'); ?> <span class="required">*</span></label>
                            <input type="file" name="image_name[]" multiple="mutiple" id="image_name">
                               <input type="submit" class="btn btn-primary" value="upload">
                        </div>
                         

                     </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>
 
<div class="container">

<?php if($this->session->set_flashdata('danger')) {?>
    <div class="alert alert-success">
        <?php echo $this->session->set_flashdata('danger');?>
        
    </div>


<?php } ?>

 <div class="card-body">
<form class="required-form" action="<?php echo site_url('Emailtemplate/new/automail_template');?>" enctype="multipart/form-data" method="post" class="form-control">
        <div class="mb-3">
            <input type="file" name="image_name[]" multiple="mutiple" id="image_name">
            <input type="submit" class="btn btn-primary" value="upload">
            
        </div>
    </form>


     
 </div>
</div>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('auto_mail_sending'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

 <div class="row ">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                     <h4 class="mb-3 header-title"><?php echo get_phrase('auto_mail_sending');?></h4>
                     <form class="required-form" action="<?php echo site_url('Emailtemplate/automail_form/auto_mail');?>" method="post" enctype="multipart/form-data" class="form-control">
                       

                         <div class="form-group">
                            <label for="from"><?php echo get_phrase('from'); ?> <span class="required">*</span></label>
                            <input type="text" name = "from_mail" id = "from_mail" class="form-control" value="<?php echo get_settings('from');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="to"><?php echo get_phrase('to'); ?> <span class="required">*</span></label>
                            <input type="text" name = "to_mail" id = "to_mail" class="form-control" value="<?php echo get_settings('to');  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cc"><?php echo get_phrase('cc'); ?> <span class="required">*</span></label>
                            <input type="text" name = "cc" id = "cc" class="form-control" value="<?php echo get_settings('cc');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="subject"><?php echo get_phrase('subject'); ?> <span class="required">*</span></label>
                            <input type="text" name = "subject" id = "subject" class="form-control" value="<?php echo get_settings('subject');  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="message"><?php echo get_phrase('message'); ?> <span class="required">*</span></label>
                            <textarea name="message" id="summernote-basic" class="form-control"></textarea>
                        </div>
                      
                     



                        <div class="form-group">
                            <label for="automail"><?php echo get_phrase('auto mail'); ?> <span class="required">*</span></label>
                             <select class="form-control select2" data-toggle="select"  id="automail">
                              
                              <option value=""><?php echo get_phrase('leadership'); ?></option>
                              <option value=""><?php echo get_phrase('pmp certificate '); ?></option>
                              <option value=""><?php echo get_phrase('marketing certification '); ?></option>
                              <option value=""><?php echo get_phrase('sales certification '); ?></option>
                              <option value=""><?php echo get_phrase('skill trade certification '); ?></option>
                              <option value=""><?php echo get_phrase('human resourse certification '); ?></option>
                            </select>
                        </div>

                                <!-- <div class="form-group"> -->
                                    <!-- <label class="form-label" id="uploadFile">Select Files</label> -->
                                  <!-- <label for="attach file"><?php echo get_phrase('attach_file'); ?><span class="required">*</span></label>  -->
                                    <!-- <input multiple="mutiple" id="image_name" type="file" name="image_name[]" > -->
                                <!-- </div>   -->
                                
                              <!-- <input type="submit" class="btn btn-primary" value="Upload" >  -->

<table id="table" width="50%">
<thead>
<tr class="text-center">
<th colspan="3" style="height:50px;"></th>
</tr>
</thead>
<tbody>
<tr class="add_row">
<td id="no" width="5%">#</td>
 <label for="attach file"><?php echo get_phrase('attach_file'); ?><span class="required">*</span></label> 
<td width="75%"><input class="file " name='image_name[]' type='file' multiple="mutiple" /></td>

<td width="20%"></td>
</tr>
</tbody>
<tfoot>
<tr>
<td colspan="4">
   <button class="btn btn-success btn-sm" type="button" id="add" title='Add new file'/>Add new file</button>
</td>
</tr>
<tr class="last_row">
<td colspan="4" style="text-align:center;">
 <!--   <button class="btn btn-primary submit" name="btnSubmit" type='submit'>Upload</button> -->
  <input type="submit" class="btn btn-primary" value="Upload" > 
</td>
</tr>
</tfoot>
</table>
                                <?php 
                                if($this->session->flashdata('messgae'))
                                {
                                    ?>
                                    <p class="text-success"> <?=$this->session->flashdata('messgae')?></p>
                                <?php }
                                ?>

                          <!-- <button type="button" value="cancel" class="btn btn-outline-primary " onclick="checkRequiredFields()"><?php echo get_phrase('cancel'); ?></button>
                          <button type="button" value="upload" class="btn btn-primary me-3" onclick="checkRequiredFields()"><?php echo get_phrase('upload'); ?></button> -->

                         
                     </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div> 






<!-- <script type="text/javascript">
  
$(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    });
   
</script> -->
 
    
<!-- <div class="card-body">
                <form action="<?=base_url('emailtemplate//auto_mail')?>" enctype="multipart/form-data" method="post">
                                 
                                    
                                

                                <div class="mb-3">
                                    <label class="form-label" id="uploadFile">Select Files</label>
                                    <input multiple="mutiple" type="file" name="image_name[]" >
                                </div>
                                


                                <input type="submit" class="btn btn-primary" value="Upload" name="submit">

                                <?php 
                                if($this->session->flashdata('messgae'))
                                {
                                    ?>
                                    <p class="text-success"> <?=$this->session->flashdata('messgae')?></p>
                                <?php }
                                ?>
                        </form> 
                    </div>
 -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   // Validation
   $('.submit').click(function(){
    var file_val = $('.file').val();
    if(file_val == "")
    {
       alert("Please select at least one file.");
       return false;
    }
    else{
       $('form').attr('action', 'index.php');
    }
    });
            
   // Append new row
   $('#table').on('click', "#add", function(e) {
    $('tbody').append('<tr class="add_row"><td>#</td><td><input name="files[]" type="file" multiple /></td><td class="text-center"><button type="button" class="btn btn-danger btn-sm" id="delete" title="Delete file">Delete file</button></td><tr>');
    e.preventDefault();
   });
            
   // Delete row
   $('#table').on('click', "#delete", function(e) {
    if (!confirm("Are you sure you want to delete this file?"))
    return false;
    $(this).closest('tr').remove();
    e.preventDefault();
   });
});
</script>