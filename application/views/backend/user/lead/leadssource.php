<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-web title_icon"></i> <?php echo get_phrase('leadssource'); ?>
          <a href="<?php echo site_url('leads/leadssource_form/add_leads_source'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_leadssource'); ?></a>
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
                <th><?php echo get_phrase('Leadssource_name'); ?></th>
              
                <th><?php echo get_phrase('actions'); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($leads_source->result_array() as $ctry) : ?>
                <tr class="gradeU">
                  <td><?php echo $ctry['sourcename']; ?></td>
                  <td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('leads/leadssource_form/edit_leads_source/' . $ctry['id']);?>"><?php echo get_phrase('edit'); ?></a></li>

                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('leads/leadssource/delete/' . $ctry['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
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