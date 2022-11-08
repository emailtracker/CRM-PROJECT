<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('website_review'); ?></h4>

                <form class="required-form" action="<?php echo site_url('review/website_review/add'); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-wifi mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('social_information'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('website_review'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#media_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('media'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content b-0 mb-0">

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                            </div>

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" ><?php echo get_phrase('last_name'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="last_name" name="last_name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                                            <div class="col-md-9">
                                                <textarea name="biography" id = "summernote-basic" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="profile_image" name="profile_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                        <label class="custom-file-label" for="user_image"><?php echo get_phrase('choose_cutomer_image'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                           
                            <div class="tab-pane" id="social_information">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('facebook'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="facebook_link" name="facebook_link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="twitter_link"><?php echo get_phrase('twitter'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="twitter_link" name="twitter_link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('linkedin'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="linkedin_link" name="linkedin_link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="instagram_link"><?php echo get_phrase('instagram'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="instagram_link" name="instagram_link" class="form-control">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            
                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                	<div class="col-3"></div>
                                    <div class="col-6">
                                    	
				                    <div class="form-group">
						    			<label for="country_id"><?php echo get_phrase('Country_name'); ?></label>
						    			<select class="form-control select2" data-toggle="select2" name="country_id" id="country_id">
						    				<option value=""><?php echo get_phrase('select_a_country'); ?></option>
						    				<?php foreach($this->custom_model->get_country()->result_array() as $country): ?>
						    					<option value="<?php echo $country['c_id']; ?>"><?php echo $country['c_name']; ?></option>
						    				<?php endforeach; ?>
						    			</select>
						    		</div>
						    		
						    		<div class="form-group">
						    			<label for="city_id"><?php echo get_phrase('City_name'); ?></label>
						    			<select class="form-control select2" data-toggle="select2" name="city_id" id="city_id">
						    				<option value=""><?php echo get_phrase('select_a_city'); ?></option>
						    				<?php foreach($this->custom_model->get_city()->result_array() as $city): ?>
						    					<option value="<?php echo $city['cc_id']; ?>"><?php echo $city['cc_name']; ?></option>
						    				<?php endforeach; ?>
						    			</select>
						    		</div>
						    		<div class="form-group">
                                            <label class="" ><?php echo get_phrase('Rating'); ?></label>
                                            <div class="">
                                                <input type="text" class="form-control" id="rating" name="rating">
                                            </div>
                                        </div>
						    		<div class="form-group">
                                            <label><?php echo get_phrase('review'); ?></label>
                                            <div>
                                                <textarea name="comment" id = "review_comment" class="form-control"></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
					                        <label for="parent"><?php echo get_phrase('Review_status'); ?></label>
					                         <select class="form-control select2" data-toggle="select2" name="status" id="review_status">
					                              <option value="1"><?php echo get_phrase('Enable'); ?></option>
					                              <option value="0"><?php echo get_phrase('Disable'); ?></option>
					                        </select>
					                    </div>
                                    </div> <!-- end col -->
                                    <div class="col-3"></div>
                                </div> <!-- end row -->
                            </div>


                            <div class="tab-pane" id="media_info">
                                <div class="row">
                                	<div class="col-3"></div>
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label class="" for="course_overview_provider"><?php echo get_phrase('course_overview_provider'); ?></label>
                                                <div class="">
                                                    <select class="form-control select2" data-toggle="select2" name="video_type" id="course_overview_provider">
                                                        <option value="youtube"><?php echo get_phrase('youtube'); ?></option>
                                                        <option value="vimeo"><?php echo get_phrase('vimeo'); ?></option>
                                                        <option value="html5"><?php echo get_phrase('HTML5'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                       

                                       
                                            <div class="form-group">
                                                <label class="" for="video_url"><?php echo get_phrase('course_overview_url'); ?></label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="video_url" id="video_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w">
                                                </div>
                                            </div>
                                       <div class="form-group" id = "thumbnail-picker-area">
					                        <label> <?php echo get_phrase('review_video_image'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 200 X 200)</small> </label>
					                        <div class="input-group">
					                            <div class="custom-file">
					                                <input type="file" class="custom-file-input" id="review_video_image" name="review_video_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
					                                <label class="custom-file-label" for="review_video_image"><?php echo get_phrase('review_video_image'); ?></label>
					                            </div>
					                        </div>
					                    </div>
                                    </div> 
                                     </div> <!-- end col -->
                                    <div class="col-3"></div><!-- end col -->
                                </div> <!-- end row -->
                           
                            <div class="tab-pane" id="finish">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>

                                            <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <ul class="list-inline mb-0 wizard text-center">
                                <li class="previous list-inline-item">
                                    <a href="javascript:;" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                </li>
                                <li class="next list-inline-item">
                                    <a href="javascript:;" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

	<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#review_comment']);
  });
</script>
