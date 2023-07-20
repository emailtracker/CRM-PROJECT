<!-- start page title -->
<div class="row">
  <div class="col-12">
  	 <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('import_file'); ?></h4>
            </div> <!-- end card body-->
        </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('import_file'); ?></h4>

          <form class="required-form" action="<?php echo site_url('Emailtemplate/import_data'); ?>" method="post"  enctype="multipart/form-data">	
           <div class="form-group">
                        <label for="select_name"><?php echo get_phrase('select_name')?></label>
                         <input type="text" name="select_name" id="name">
                        
                      </div>
                               	    				    		
		    		           <div class="form-group">
                       <label for="schedule_crse"><?php echo get_phrase('Import_Excel_File'); ?></label>
                       <div>
                       		<input type="file" class="form-control" name="image_name[]" id="">
						</div>
					</div>
          <!-- <a href="<?php echo site_url('Emailtemplate/download'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><i class="mdi mdi-plus"></i> <?php echo get_phrase('Download file'); ?></a> -->
            <!-- <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button> -->

                    <div class="form-group">
                        
                        <input type="submit" class="btn btn-primary" value="upload">
                        
                      </div>
          </form>
          <!-- <div class="table-responsive" id="customer_data"> -->

    </div>
        </div>
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
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('filename'); ?></th> 
                 
                


              </tr>
            </thead>
             <tbody>
              <?php 
              foreach($abc as $row) : ?>
                     
            <tr class="gradeU ">
            <td><?= $row['select_name']; ?></td>
            <td><a href="<?= base_url()?><?= $row['upload']?>" download="<?= $row['upload']?>"><?= $row['upload']; ?></td> 
             <td><?= $row['']; ?></a></td>
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
