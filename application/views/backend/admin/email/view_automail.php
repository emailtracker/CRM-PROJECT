<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"><i class="mdi mdi-envelop title_icon"></i><?php echo get_phrase('email'); ?>
				<a href="<?php echo site_url('Emailtemplate/viewautomail_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_template'); ?></a>	
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
								<th><?php echo get_phrase('view_automail'); ?></th> 
								<!-- <th><?php echo get_phrase('template_body'); ?></th>  -->
								<th><?php echo get_phrase('Action'); ?></th> 
 
							</tr>
						</thead>
						 <tbody>
						 
                         <?php 
						 	foreach ($mailtemplate->result_array() as $templatenames) : ?>
                     
						<tr class="gradeU ">
						 <td><?php  $name = $_GET['to']; echo $name; ?></td>
						 <td><?php echo $templatenames['body']; ?></td>
							<td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('Emailtemplate/email_form/edit_template/'.$templatenames['id']);?>"><?php echo get_phrase('edit'); ?></a></li>

                        <li><a class="dropdown-item" href="#" id="frm" onclick="confirm_modal('<?php echo site_url('Emailtemplate/view_template/delete/'.$templatenames['id'] ); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                      </ul>
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



 


 

