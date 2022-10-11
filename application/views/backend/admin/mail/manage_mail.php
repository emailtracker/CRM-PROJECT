<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-web title_icon"></i> <?php echo get_phrase('Mailbox'); ?>
          <a href="<?php echo site_url('group/mail_form/add_mail'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('compose_new_mail'); ?></a>
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
              <a href="<?php echo site_url(''); ?>" class="btn btn-outline-primary  btn-rounded"><i class="mdi mdi-plus"></i><?php echo get_phrase('inbox'); ?></a><br><br>

              <a href="<?php echo site_url(''); ?>" class="btn btn-outline-primary  btn-rounded"><i class="mdi mdi-plus"></i> <?php echo get_phrase('sent'); ?></a><br><br>

              <a href="<?php echo site_url(''); ?>" class="btn btn-outline-primary  btn-rounded"><i class="mdi mdi-plus"></i> <?php echo get_phrase('trash'); ?></a><br><br>

              <a href="<?php echo site_url(''); ?>" class="btn btn-outline-primary  btn-rounded"> <i class="mdi mdi-plus"></i><?php echo get_phrase('draft'); ?></a><br><br>

              </tr>
            </thead>
          
          </table>
        </div>
      </div>
    </div>
  </div>
</div>