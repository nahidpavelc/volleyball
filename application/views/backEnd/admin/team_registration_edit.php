<style>
    .formThFlex{
        display: flex;
        
    }
    .formThFlex p{
        flex:0 0 14.5%;
    }
    .fromInputFlex{
        display: flex;
        gap:3%;
    }
    .fromInputFlex .form-control{
        flex: 0 0 11.4%!important;
    }
    .fromInputFlex input[type="file"] {
        display: block;
        flex: 0 0 9.8%;
    }
    .thWidth{
        display: block;
        width: 100%;
    }
    
    
 
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-purple box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('edit_team_registration'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/team-registration/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('team_registration_details'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <form action="<?php echo base_url("admin/team-registration/edit/" . $team_registration_details->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-12">
                                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Team Information</h4>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_name'); ?> </label>
                                            <input name="team_name" value="<?php echo $team_registration_details->team_name; ?>" placeholder="<?php echo $this->lang->line('team_name'); ?> " class="form-control inner_shadow_purple"  type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('registration_number'); ?> </label>
                                            <input name="registration_number" value="<?php echo $team_registration_details->registration_number; ?>" placeholder="<?php echo $this->lang->line('registration_number'); ?> " class="form-control inner_shadow_purple"  type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_gender'); ?> </label>
                                            <input name="team_gender" value="<?php echo $team_registration_details->team_gender; ?>" placeholder="<?php echo $this->lang->line('team_gender'); ?> " class="form-control inner_shadow_purple"  type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_zoon_type_id'); ?> </label>
                                            <input name="team_zoon_type_id" value="<?php echo $team_registration_details->team_zoon_type_id; ?>" placeholder="<?php echo $this->lang->line('team_zoon_type_id'); ?> " class="form-control inner_shadow_purple"  type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('mobile_number'); ?> </label>
                                            <input name="mobile_number" value="<?php echo $team_registration_details->mobile_number; ?>" placeholder="<?php echo $this->lang->line('mobile_number'); ?> " class="form-control inner_shadow_purple"  type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('registration_year'); ?> </label>
                                            <input name="registration_year" value="<?php echo $team_registration_details->registration_year; ?>" placeholder="<?php echo $this->lang->line('registration_year'); ?> " class="form-control inner_shadow_purple"  type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('facebook_link'); ?> </label>
                                            <input name="facebook_link" value="<?php echo $team_registration_details->facebook_link; ?>" placeholder="<?php echo $this->lang->line('facebook_link'); ?> " class="form-control inner_shadow_purple"  type="url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('youtube_link'); ?> </label>
                                            <input name="youtube_link" value="<?php echo $team_registration_details->youtube_link; ?>" placeholder="<?php echo $this->lang->line('youtube_link'); ?> " class="form-control inner_shadow_purple"  type="url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('website_link'); ?> </label>
                                            <input name="website_link" value="<?php echo $team_registration_details->website_link; ?>" placeholder="<?php echo $this->lang->line('website_link'); ?> " class="form-control inner_shadow_purple"  type="url">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12">
                                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Address</h4>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('division'); ?></label>
                                            <select class="form-control select2" name="divission_id" id="division" >
                                                <option value=""><?php echo $this->lang->line('select_a_division'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('district') ?></label>
                                            <select class="form-control select2" name="district" id="zilla">
                                                <option value=""><?php echo $this->lang->line('select_division_first'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('upozilla') ?></label>
                                            <select class="form-control select2" name="address" id="upozilla">
                                                <option value=""><?php echo $this->lang->line('select_district_first'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('post_code'); ?> </label>
                                            <input name="post_code" value="<?php echo $team_registration_details->post_code; ?>" placeholder="<?php echo $this->lang->line('post_code'); ?> " class="form-control inner_shadow_purple"  type="number">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('road_house'); ?> </label>
                                            <input name="road_house" value="<?php echo $team_registration_details->road_house; ?>" placeholder="<?php echo $this->lang->line('road_house'); ?> " class="form-control inner_shadow_purple"  type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('club_logo'); ?> </label>
                                            <input type="file" name="group_banner" value="<?php echo $team_registration_details->club_logo; ?>"  onchange="readpicture(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('group_banner'); ?> </label>
                                            <input type="file" name="group_banner" value="<?php echo $team_registration_details->group_banner; ?>" onchange="readpicture1(this);">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('cancel') ?></button>
                                        <button type="submit" class="btn btn-sm bg-primary"><?php echo $this->lang->line('update') ?></button>
                                    </center>
                                </div>

                            </div>
                        </form>

                            <div class="col-md-12">
                                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Team Members</h4>

                               
                                <table id="userListTable" class="table table-bordered table-striped table_th_purple table_custom">
                                    <thead>
                                        <tr>

                                            <th class="thWidth">
                                                <div class="formThFlex">
                                                    <p>Name</p>
                                                    <p>Phone number</p>
                                                    <p>Designation</p>
                                                    <p>Priority</p>
                                                    <p>Member type</p>
                                                    <p>Photo</p>
                                                    <p>Action</p>
                                                </div>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody data-repeater-list="items">
                                    <?php foreach ($team_registration_member_lsit as $single_team_member) { ?>
                                        <tr>
                                            <td>
                                                <form data-id="<?= $single_team_member->id; ?>" id="team_member_id_<?= $single_team_member->id; ?>"  method="post" enctype="multipart/form-data" class="form-horizontal tem_member_update_class">
                                                <div class="fromInputFlex">
                                                <input name="team_member_id" type="hidden" value="<?= $single_team_member->id; ?>" >     
                                                   <input name="name" placeholder="Name" class="form-control inner_shadow_purple" type="text" value="<?= $single_team_member->name; ?>" > 
                                                   <input name="phone_number" placeholder="Phone Number" class="form-control inner_shadow_purple" type="number" value="<?= $single_team_member->phone_number; ?>">
                                                   <input name="designation" placeholder="Designation" class="form-control inner_shadow_purple" type="text" value="<?= $single_team_member->designation; ?>"> 
                                                   <input name="priority" placeholder="priority" class="form-control inner_shadow_purple" type="Number" value="<?= $single_team_member->priority; ?>"> 
                                                   <input name="member_type" placeholder="member_type" class="form-control inner_shadow_purple" type="text" value="<?= $single_team_member->member_type; ?>">  
                                                   <input type="file" name="photo"  multiple="" onchange="readpicture(this);">
                                                   <span id="result_<?= $single_team_member->id; ?>"></span>
                                                   <div>
                                                    <button type="submit" class="btn btn-sm bg-teal " ><i class="fa fa-edit"></i></button> 
                                                        <a href="<?php echo base_url('admin/team-registration/delete/'.$single_team_member->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                                                   </div>
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>  
                            </div>  
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
</section>
<script>
    // profile picture change
    function readpicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#member_registration_photo')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readpicture1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#nid_photo')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {

        $('#date').datepicker({
            autoclose: true,
            changeYear: true,
            changeMonth: true,
            dateFormat: "dd M yy",
            yearRange: "-10:+10"
        });

    });
</script>
<script>
    $(document).ready(function() {

        // this is for presend address change only
        $('#division').change(function() {
            $('#zilla').find('option').remove().end().append("<option value=''>Select Division First</option>");
            $('#upozilla').find('option').remove().end().append("<option value=''>Select District First</option>");
            loadZilla($(this).find(':selected').val());
        });

        $('#zilla').change(function() {
            $('#upozilla').find('option').remove().end().append("<option value=''>Select District First</option>");
            loadUpozilla($(this).find(':selected').val());
        });

        // init the divisions
        loadDivision();

    });


    function loadDivision() {

        $.post("<?php echo base_url() . "admin/get_division"; ?>", {
                'asd': 'asd'
            },
            function(data2) {

                var data = JSON.parse(data2);
                $.each(data, function() {

                    $("#division").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                });

            });
    }

    function loadZilla(divisionId) {

        $.post("<?php echo base_url() . "admin/get_zilla_from_division/"; ?>" + divisionId, {
                'nothing': 'nothing'
            },
            function(data2) {
                var data = JSON.parse(data2);
                $.each(data, function(i, item) {

                    $("#zilla").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                });
            });

    }

    function loadUpozilla(zillaId) {
        $.post("<?php echo base_url() . "admin/get_upozilla_from_division_zilla/"; ?>" + zillaId, {
                'nothing': 'nothing'
            },
            function(data2) {
                var data = JSON.parse(data2);
                $.each(data, function(i, item) {

                    $("#upozilla").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                });
            });
    }
</script>

<script>

    /*function testtem_member_info_updatefunction (id) {

        
        alert(id)
    }*/
$(document).ready(function() {
 
    $('.tem_member_update_class').on('submit', function(e){

    e.preventDefault();  

        alert('asd');

        if(false) { 

            alert("Please Fillup Input Field"); 

        } else {  

            var row_id = $(this).attr("data-id");

            $("#result_"+row_id).text('Uploading data... '); 
            
            $.ajax({  

                url: base_url + "admin/update_single_team_member_update/",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,
                cache: false,  
                processData:false,
                success: function(res) {

                    res = JSON.parse(res); 

                    if(res.status == "SUCCESS") {

                        $("#result_"+row_id).css('color', 'green'); 
                        $("#result_"+row_id).html(res.data.message );


                    } else {

                        $("#result_" + row_id).css('color', 'red');
                        $("#result_" + row_id).html(res.error[0]);
                        $("#upload_result_form_id")[0].reset(); 

                    }

                    //

                    //location.reload();
                },
                error: function(xhr) {

                    safe_exit = true;
                    $("#result_"+row_id).html("Upload Failed : " + xhr.statusText);
                } 
            }).always(function() {

            }); 
        }
    });
});

</script>