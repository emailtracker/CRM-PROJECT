<?php
   
 ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> 
                	 <?php
                            if(strtolower($this->session->userdata('role')) == 'user'){
                                if($this->session->userdata('is_campaign_manager')){
                                    echo get_phrase('Campaign_Manager_dashboard');
                                }
                            }else{
                                echo get_phrase('dashboard');
                            }
                        ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
