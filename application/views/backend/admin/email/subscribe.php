<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('unsubscribe'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>







<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
                  <h4 class="mb-3 header-title"><?php echo get_phrase('unsubscribe');?></h4>
                     <form class="required-form" action="<?php echo site_url('Emailtemplate/subscribe_data/subscribe');?>" enctype="multipart/form-data" method="post" class="form-control">
                      <div class="form-group">
                        <label for="email"><?php echo get_phrase('email')?></label>
                        <input type="text" name = "email" id="email"  value="">
                        
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value = "send" name="">
                      </div>
                    </form>
      </div>
      
    </div>
  </div>

  
</div>





