<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('mail_list'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-body">
				<div class="col-lg-12">
					<h4 class="mb-3 header-title"><?php echo get_phrase('mail_list');?></h4>
                     <form class="required-form" action="<?php echo site_url('Emailtemplate/mail_list_form/mail_list');?>" enctype="multipart/form-data" method="post" class="form-control">
                     	<div class="form-group">
                     		<label for="group_name"><?php echo get_phrase('group_name')?></label>
                     		<input type="text" name="group_name" id="group_name"  value="">
                     		
                     	</div>
                         <div class="form-group">
                     		<label for="select_name"><?php echo get_phrase('select_name')?></label>
                     		<!-- <input type="text" name="select_name" id="select_name"> -->
                     		<select name="select_name" id="select_name" onchange="abc(this.value)">
                     			<option value="">select name</option>
                     			<?php foreach($template_name as $row) : ?>
                     				<option value="<?= $row['select_name'];?>"><?= $row['select_name'];?></option>
                     			<?php endforeach; ?>
                     		</select>
                     		
                     	</div>
                               
                     	<div class="form-group">
                     		<label for="email_address"><?php echo get_phrase('email_address')?></label>
                     		<textarea class="form-control" id="" name="email_address"></textarea>
                     		
                     	</div>

                     	<div class="form-group">
                     		<label for="template_name"><?php echo get_phrase('template_name')?></label>
                     		<select name="template_name" id="template_name">
                     			<option value="">select name</option>
                     			<?php foreach($add_template as $row) : ?>
                     				<option value="<?= $row['template_name'];?>"><?= $row['template_name'];?></option>
                     			<?php endforeach; ?>
                     		</select>
                     		
                     	</div>



                     	<!-- <div class="form-group">
                     		<label for="template_name"><?php echo get_phrase('template_name')?></label>
                     		<input type="text" name="template_name" id="template_name">
                     		
                     	</div> -->

<!--                       <div class="form-group">
                     		<label for="upload"><?php echo get_phrase('upload')?></label>
                     		<input type="file" name="image_name[]" id="upload" accept="xlsx,csv">
                     		
                     	</div> -->
                     	<div class="form-group">
                     		<label for="date"><?php echo get_phrase('Set the time interval:')?></label>
                     		<!-- <input type="datetime-local" name="time_interval" id="time_interval" placeholder="enter in second"> -->
                     		<input type="text" name="time_interval" id="time_interval" placeholder="enter in second">
                     	</div>
                     	<div class="form-group">
                     		
                     		<input type="submit" class="btn btn-primary" value="sendmail">
                     		
                     	</div>

                     </form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<script type="text/javascript">
	const abc = (a) =>{

		// var b = document.getElementById('email_idd').value;
		$('#').val(a);
	}
</script>