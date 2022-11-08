<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('website_review'); ?>
                    <a href="<?php echo site_url('review/website_review_form/add_review'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_website_review'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('website_review'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('full_name'); ?></th>
                                <th><?php echo get_phrase('country'); ?></th>
                                <th><?php echo get_phrase('Review'); ?></th>                               
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
          					 <?php foreach ($website_review->result_array() as $review) : ?>
          					 	<?php
          					 
          					 	$get_country  = $this->db->where('c_id', $review['country_id'])->get('country')->row();
          					 	?>
			                <tr class="gradeU">
			                  <td><?php echo $review['id']; ?></td>
			                  <td><?php echo $review['first_name'].' '.$review['last_name']; ?></td>
			                  <td><?php echo $get_country->c_name; ?></td>
			                   <td><?php echo $review['comment']; ?></td>
			                  <td style="<?php echo (!$review['status'] ? 'background-color:red;color:white;' : 'background-color:#8e23aa;color:white;'); ?>">
			                                        <?php echo $review['status'] ? 'Enabled' : 'Disabled'; ?>
			                  </td>
			                  <td>
			                    <div class="dropright dropright">
			                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        <i class="mdi mdi-dots-vertical"></i>
			                      </button>
			                      <ul class="dropdown-menu">
			                        <a class="dropdown-item" href="<?php echo site_url('review/website_review_form/edit_review/'.$review['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
			
			                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('review/website_review/delete/' . $review['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
			                      </ul>
			                    </div>
			                  </td>
			                </tr>
			              <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>