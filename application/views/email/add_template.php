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
					<form class="required-form" action="<?php echo site_url(''); ?>" method="post">


						<div class="form-group">
							<label for="template name"> <?php echo get_phrase('template name'); ?><span class="required">*</span></label>
							<input type="text" name="template name" class="form-control" id="template name" required>
							
						</div>

						<div class="form-group">
							<label for="body"> <?php echo get_phrase('body'); ?> <span class="required">*</span></label>
							<input type="text" name="body" id="body" class="form-control">
						</div>

						<div class="form-group">
							<label for="remainder interval date"> <?php echo get_phrase('remainder interval date');?><span class="required">*</span></label>
							<input type="number" name="remainder interval date" id="remainder interval date" class="form-control">
                             
                             <div class="d-flex flex-column">
							<button type="button" class="btn btn-primary"><?php echo get_phrase('save'); ?></button>
							<button type="button" class="btn btn-outline-primary "><?php echo get_phrase('cancel');?></button>
							</div>
						</div>
						
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>