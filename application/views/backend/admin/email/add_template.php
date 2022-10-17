<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"><i class="mdi mdi-envelop"></i> <?php echo get_phrase('add_new_template');?>
					
				</h4>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="row justify-content-center">
	<div class="col-xl-7">
		<div class="card">
			<div class="card-body">
				<div class="col-xl-12">
					<h4 class="mb-3 header-title"> <?php echo get_phrase('add_template') ?></h4>
					<form class="required-form" action="<?php echo site_url('Emailtemplate/mailtemplate/add'); ?>" method="post">


						<div class="form-group">
							<label for="template name"> <?php echo get_phrase('template name'); ?><span class="required">*</span></label>
							<input type="text" name="template_name" class="form-control" id="template_ name" value="" required>
							
						</div>

						<div class="form-group">
							<label for="body"> <?php echo get_phrase('body'); ?> <span class="required">*</span></label>
							
                                                <textarea name="body" id="summernote-basic" class="form-control"></textarea>
                                            
						</div>

						<div class="form-group">
							<label for="remainder interval date"> <?php echo get_phrase('remainder interval date');?><span class="required">*</span></label>
							<input type="number" name="remainder_interval_date" id="remainder_interval_ date" class="form-control" value="">
                             
                             <div class="d-flex flex-row pt-2">
							<button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('save'); ?></button>
							<button type="button" class="btn btn-outline-primary "><?php echo get_phrase('cancel');?></button>
							</div>
						</div>
						
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>