<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-web title_icon"></i> <?php echo get_phrase('leads'); ?>
        <a href="<?php echo site_url('leads/leads_form/addleads'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_leads'); ?></a>

          <a href="<?php echo site_url('leads/export'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-publish"></i> <?php echo get_phrase('Export leads'); ?></a>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row justify-content-center">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive-sm mt-4">
          <table id="basic-datatable" class="table table-striped table-centered mb-0">
            <thead>
              <tr>
                <th><?php echo get_phrase('Date'); ?></th>
                <th><?php echo get_phrase('fullname'); ?></th>
                <th><?php echo get_phrase('email'); ?></th>
                <th><?php echo get_phrase('country'); ?></th>
                <th><?php echo get_phrase('city'); ?></th>
                <th><?php echo get_phrase('Training Mode'); ?></th>
                <th><?php echo get_phrase('category'); ?></th>
                <th><?php echo get_phrase('course'); ?></th>
                <th><?php echo get_phrase('lead_source'); ?></th>
                <th><?php echo get_phrase('lead_status'); ?></th>
              
                <th><?php echo get_phrase('actions'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                            $country_list = $this->db->order_by('c_id', 'DESC')->get('country')->result();
                            $city_list = $this->db->order_by('cc_id', 'DESC')->get('city')->result();
                            $category_list =$this->db->order_by('id', 'DESC')->get('category')->result();
                         //   $course_list = $this->db->order_by('parent', 'DESC')->get('category')->result();
                         $lead_source = $this->db->order_by('id', 'DESC')->get('leads_source')->result();
                         $lead_status = $this->db->order_by('id', 'DESC')->get('leads_status')->result();

            foreach ($leads->result_array() as $leads) : ?>
            <tr class="gradeU">
            <td><?php echo $leads['created_date']; ?></td>
            <td><?php echo $leads['name']; ?></td>
            <td><?php echo $leads['email']; ?></td>
          
            
         
            <td>
                  	<?php
                  		 foreach ($country_list as $co)
                         {
                           if ($co->c_id == $leads['country'])
                           {
                            echo $co->c_name;
                            break;
                            }
                         }
                  	?>
                  </td>

                  <td>
                  	<?php
                  		 foreach ($city_list as $city)
                         {
                           if ($city->cc_id == $leads['city'])
                           {
                            echo $city->cc_name;
                            break;
                            }
                         }
                  	?>
                  </td>
                  <td><?php echo $leads['tmode']; ?></td>
                  <td>
                  	<?php
                  		 foreach ($category_list as $category)
                         {
                           if ($category->id == $leads['category'])
                           {
                            echo $category->name;
                            break;
                            }
                         }
                  	?>
                  </td>

                  <td>
                  	<?php
                  		 foreach ($category_list as $category)
                         {
                           if ($category->id == $leads['course'])
                           {
                            echo $category->name;
                            break;
                            }
                         }
                  	?>
                  </td>

                  <td>
                  	<?php
                  		 foreach ($lead_source as $ls)
                         {
                           if ($ls->id == $leads['leadsource'])
                           {
                            echo $ls->sourcename;
                            break;
                            }
                         }
                  	?>
                  </td>

                  <td>
                  	<?php
                  		 foreach ($lead_status as $lss)
                         {
                           if ($lss->id == $leads['leadstatus'])
                           {
                            echo $lss->leadsstatus;
                            break;
                            }
                         }
                  	?>
                  </td>


                  <td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <a class="dropdown-item"href="<?php echo site_url('leads/leads_form/edit_leads/'.$leads['lead_id']); ?>"><?php echo get_phrase('edit'); ?></a></li>

                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('leads/leads/delete/' . $leads['lead_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                      </ul>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
         
        </div>
      </div>
    </div>
  </div>
</div>