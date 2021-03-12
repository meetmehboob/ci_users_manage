<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>

.splash-container {
    max-width: 600px;
}
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->


    <form class="splash-container" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                            <input class="form-control" type="text" name="mobile_number" value="<?php echo set_value('mobile_number');?>" placeholder="Mobile Number" autocomplete="off">
                        </div> 
                        <?php echo form_error('mobile_number');?>
                    </div>
                    <div class="col-sm-6">
                         <div class="form-group">
                            <div class="input-group ">
                              <span class="input-group-prepend">
                                <span class="">
                                <select class="form-control" name="gender_type">
                                    <option value="1">Mr.</option>
                                    <option value="2">Miss.</option>
                                </select>
                                </span>
                             </span>
                                <input type="text" placeholder="Full Name" class="form-control"  name="full_name" value="<?php echo set_value('full_name');?>">
                            </div>
                            <?php echo form_error('full_name');?>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6"> 
                        <div class="form-group">
                        <input class="form-control" type="text" name="email_id" value="<?php echo set_value('email_id');?>" placeholder="E-mail" autocomplete="off">
                        </div>
                        <?php echo form_error('email_id');?>
                    </div>




                     <div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control" name="state_row_id" id="state_row_id">
                            <option value="">Select State </option>
                            <?php
                                if(!empty($get_states)) {
                                foreach ($get_states as $list)
                                {
                             ?>
                             <option value="<?php echo $list['id']?>" <?php if(set_value('state_row_id') == $list['id']) { echo "selected";}?> ><?php echo $list['state_name']?></option>
                             <?php } 
                                } ?>   
                        </select>
                     </div> 
                     <?php echo form_error('state_row_id');?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <select class="form-control" name="city_row_id" id="city_row_id">
                        <option value="">Select City</option>
                    </select>
                    </div> 
                    <?php echo form_error('city_row_id');?>
                    </div>

                     <div class="col-sm-6"> 
                        <div class="form-group">
                            <input class="form-control " type="text" name="pincode" value="<?php echo set_value('pincode');?>" placeholder="Your Pincode" autocomplete="off">
                        </div>
                        <?php echo form_error('pincode');?>
                    </div>
                </div>
                
                


        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
            <input class="form-control" name="password" value="<?php echo set_value('password');?>" placeholder="Password">
            </div>
            <?php echo form_error('password');?>
        </div>

         <div class="col-sm-6"> 
            <div class="form-group">
            <input class="form-control " id="location" name="area_name" value="<?php echo set_value('area_name');?>" placeholder="Enter Area Name">
            </div>
            <?php echo form_error('area_name');?>
            </div>
        </div>



<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
        <select class="form-control" name="job_row_id">
        <option value="">Select your Type of Job</option>
        <?php
            if(!empty($get_users_job_types)) {
            foreach ($get_users_job_types as $list)
            {
         ?>
         <option value="<?php echo $list['id']?>" <?php if(set_value('job_row_id') == $list['id']) { echo "selected";}?>><?php echo $list['job_name']?></option>
         <?php } 
            } ?>
        </select>
     </div> 
     <?php echo form_error('job_row_id');?>
    </div>


 <div class="col-sm-6"> 
     <div class="form-group">
        <select class="form-control" name="experience_row_id">
            <option value="">Any Experience in the field</option>
            <?php
            if(!empty($get_users_experience_types)) {
            foreach ($get_users_experience_types as $list)
            {
         ?>
         <option value="<?php echo $list['id']?>" <?php if(set_value('experience_row_id') == $list['id']) { echo "selected";}?>><?php echo $list['experience_name']?></option>
         <?php } 
            } ?>
        </select>
    </div>
    <?php echo form_error('experience_row_id');?>
    </div>
</div>
       
                <div class="form-group">
                    <button class="btn btn-block btn-primary" name="save_n_register" type="submit">Register My Account</button>
                </div>


                
                 
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="#" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po"></script>  

<script>  
    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input);
</script>


<script>
    $("#state_row_id").change(function() {
       getCityList();
    });
    getCityList();
    function getCityList()
    {
         var state_row_id = $("#state_row_id").val();
         $.ajax({
            type: "post",
            url: "<?php echo base_url('r/get_city_list');?>",
            data: {state_row_id:state_row_id, set_value:"<?php echo set_value('city_row_id');?>"},
            success: function(data){
                $('#city_row_id').html(data);
            }
        });
    }


</script>
</html>