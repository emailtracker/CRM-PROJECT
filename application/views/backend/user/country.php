<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-web title_icon"></i> <?php echo get_phrase('country'); ?>
          <a href="<?php echo site_url('user/country_form/add_country'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_country'); ?></a>
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
                <th><?php echo get_phrase('country_name'); ?></th>
                <th><?php echo get_phrase('currency_name'); ?></th>
                <th><?php echo get_phrase('contact_number'); ?></th>
                <th><?php echo get_phrase('status'); ?></th>
                <th><?php echo get_phrase('actions'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($country->result_array() as $ctry) : ?>
                <tr class="gradeU">
                  <td><?php echo $ctry['c_name']; ?></td>
                  <td><?php echo $ctry['c_currency_name']; ?></td>
                  <td><?php echo $ctry['c_cnumber']; ?></td>
                  <td style="<?php echo (!$ctry['c_status'] ? 'background-color:red;color:white;' : 'background-color:green;color:white;'); ?>">
                                        <?php echo $ctry['c_status'] ? 'Enabled' : 'Disabled'; ?>
                  </td>
                  <td>
                    <div class="dropright dropright">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('user/country_form/edit_country/'.$ctry['c_id']); ?>"><?php echo get_phrase('edit'); ?></a></li>

                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/country/delete/' . $ctry['c_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
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