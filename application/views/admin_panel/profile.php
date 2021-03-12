<!doctype html>
<html lang="en">
<head>
    <title>Manage Account</title>
     <?php require_once('dash_css.php');?>
     <style type="text/css">
         .btn-xs {
            padding: 2px 5px;
            font-size: 12px;
        }
     </style>
</head>
<body>
    <div class="dashboard-main-wrapper">

       <?php require_once('dash_menu_bar.php');?>
        
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 >Manage Account</h3>
                                <p class="pageheader-text"></p>
                                 <?php if($this->session->flashdata('alert_msg')) { ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('alert_msg'); ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <h5 class="card-header">Personal Details</h5>
                                    <div class="card-body">
                                        <form >
                                          
                                            <div class="form-group">
                                                <label for="inputEmail">Full Name</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email ID</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail">Mobile Number</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" name="save_personal_detail">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                             <div class="col-sm-6">
                               <div class="card">
                                    <h5 class="card-header">Security Details</h5>
                                    <div class="card-body">
                                        <form>
                                              <div class="form-group">
                                                <label for="inputEmail">Current Password</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">New Password</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail">Confirm Password</label>
                                                <input id="inputEmail" type="email" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" name="save_personal_detail">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<div class="modal-dialog" role="document" style="max-width: 768px;">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User details</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
    </div>
    <div class="modal-body">
        <div style="text-align: center;min-height: 100px;" id="loading_section">
            <img src="<?php echo base_url('assets/images/loader.gif');?>" style="width: 50px;;">
            <p>Please wait... <br>
                We are loading your data.
            </p>
        </div>
        <div id="actual_section"></div>
    </div>
</div>
</div>
</div>


     <?php require_once('dash_scripts.php');?>

<script type="text/javascript">

    function loadMoreData(request_row_id) 
    {
        $('#actual_section').hide();
        $('#loading_section').show();
         $.ajax({
            type: "post",
            url: "<?php echo base_url('admi32n_ma4nager_con45trol_panel/users/user_details');?>",
            data: {request_row_id:request_row_id},
            success: function(data){
                $('#loading_section').hide();
                $('#actual_section').show();
                $('#actual_section').html(data);
            }
        });
    }
</script>     
</body>
</html>