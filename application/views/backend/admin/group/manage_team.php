<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-web title_icon"></i> <?php echo get_phrase('team'); ?>
          <a href="<?php echo site_url('group/team_form/add_team'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_team_member'); ?></a>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<!-- Start page title end -->
<div class="row justify-content-center">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive-sm mt-4">
          <table id="basic-datatable" class="table table-striped table-centered mb-0">
          <thead>
              <tr>
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('email'); ?></th>
                <th><?php echo get_phrase('phone'); ?></th>
                <th><?php echo get_phrase('role'); ?></th>
                <th><?php echo get_phrase('department'); ?></th>           
                <th><?php echo get_phrase('designation'); ?></th>  
               
              </tr>
            </thead>
        
            <tbody>
            <?php foreach ($team->result_array() as $team) : 
              $role = $this->db->order_by('id', 'DESC')->get('role')->result();
              $department = $this->db->order_by('id', 'DESC')->get('department')->result();
              $manager = $this->db->order_by('id', 'DESC')->get('users')->result();
              ?>
                <tr class="gradeU">
                  <td><?php echo $team['first_name']; ?></td>
                  <td><?php echo $team['email']; ?></td>
                  <td><?php echo $team['phone']; ?></td>
                  <td><?php
                  		 foreach ($role as $role)
                         {
                           if ($role->id == $team['role_id'])
                           {
                            echo $role->name;
                            break;
                            }
                         }
                  	?></td>
              
                  <td><?php
                  		 foreach ($department as $department)
                         {
                           if ($department->id == $team['department_id'])
                           {
                            echo $department->department;
                            break;
                            }
                         }
                  	?></td>




                 <td><?php echo $team['designation']; ?></td>
                  
                  <td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                      <a class="dropdown-item"href="<?php echo site_url('group/team_form/edit_team/'.$team['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>

                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('group/team/delete/' . $team['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                      </ul>
                    </div>
                  </td>
                 
                </tr>
                 
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>