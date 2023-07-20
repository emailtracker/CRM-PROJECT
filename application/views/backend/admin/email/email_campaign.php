<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"><i class="mdi mdi-envelop title_icon"></i><?php echo get_phrase('email_campaign'); ?>
				<a href="<?php echo site_url('Emailtemplate/import/import_file'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('Import'); ?></a>
				
				</h4>
                  
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="row justify-content-center">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive-sm mt-4">
					<table id="basic-datatable" class="table table-striped table-centered mb-0">
						<thead>
							<tr>
								<th><?php echo get_phrase('email'); ?></th>
								<th><?php echo get_phrase('filename'); ?></th> 
								 
								<th><?php echo get_phrase('course'); ?></th> 
								<th><?php echo get_phrase('action'); ?></th> 


							</tr>
						</thead>
						 <tbody>
						 	<?php 
						 	foreach($abc as $row) : ?>
                     
						<tr class="gradeU ">
						<td><?= $row['email_address']; ?></td>
						<td><?= $row['upload']; ?></td>	
						 <td><?= $row['template_name']; ?></td>
						 <td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      
                    </div>
                  </td>
						</tr>
						<?php endforeach; ?>
					     </tbody>
					</table>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

