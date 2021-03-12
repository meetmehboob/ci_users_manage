<!doctype html>
<html lang="en">
<head>
    <title>Users</title>
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
                                <h3 >Users List</h3>
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


                        <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th>Registered On</th>
                                                <th scope="col">User Name(ID)</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">City</th>
                                                <th scope="col">A/C Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sl=1;
                                            if(!empty($get_users_list))
                                            { 
                                            foreach($get_users_list as $list)
                                            {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $sl++;?></th>
                                                <td><?php echo date('d, M Y h:i a',strtotime($list['date_n_time']));?></td>
                                                <td><?php echo ucwords($list['full_name']);?></td>
                                                <td><?php echo $list['mobile_number'];?></td>
                                                <td><?php echo $list['city_name'];?>, <?php echo $list['district_name'];?>, <?php echo $list['state_name'];?></td>
                                                <td>
                                                     <?php if($list['login_status'] == 0) { ?>
                                                        Disabled
                                                     <?php } else { ?>
                                                        Enabled
                                                     <?php } ?>   
                                                </td>
                                                <td>
                                                <?php if($list['login_status'] == 1) { ?>
                                                    <form method="post" action="" style="display: inline-block;">
                                                        <input type="hidden" value="<?php echo ($list['id']);?>" name="request_row_id" id="request_row_id">
                                                        <button class="btn btn-xs btn-warning" type="submit" name="disable_user_account">Disable</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <form method="post" action="" style="display: inline-block;">
                                                        <input type="hidden" value="<?php echo ($list['id']);?>" name="request_row_id" id="request_row_id">
                                                        <button class="btn btn-xs btn-success" type="submit" name="enable_user_account">Enable</button>
                                                    </form>
                                                <?php } ?>   
                                                    <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#exampleModal" onclick="loadMoreData('<?php echo ($list['id']);?>')">View </a>
                                                </td>
                                            </tr>
                                        <?php } 
                                            }?>
                                        </tbody>
                                    </table>
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