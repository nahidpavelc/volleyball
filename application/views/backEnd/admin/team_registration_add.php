<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-purple box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('add_team_registration'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/team-registration/list" type="submit" class="btn bg-teal btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('team_registration_list'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <form action="<?php echo base_url("admin/team-registration/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-md-12">
                                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Team Information</h4>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_name'); ?> </label>
                                            <input name="team_name" placeholder="<?php echo $this->lang->line('team_name'); ?> " class="form-control inner_shadow_purple" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('registration_number'); ?> </label>
                                            <input name="registration_number" placeholder="<?php echo $this->lang->line('registration_number'); ?> " class="form-control inner_shadow_purple" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_gender'); ?> </label>
                                            <input name="team_gender" placeholder="<?php echo $this->lang->line('team_gender'); ?> " class="form-control inner_shadow_purple" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('team_zoon_type_id'); ?> </label>
                                            <input name="team_zoon_type_id" placeholder="<?php echo $this->lang->line('team_zoon_type_id'); ?> " class="form-control inner_shadow_purple" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('mobile_number'); ?> </label>
                                            <input name="mobile_number" placeholder="<?php echo $this->lang->line('mobile_number'); ?> " class="form-control inner_shadow_purple" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('registration_year'); ?> </label>
                                            <input name="registration_year" placeholder="<?php echo $this->lang->line('registration_year'); ?> " class="form-control inner_shadow_purple" type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('facebook_link'); ?> </label>
                                            <input name="facebook_link" placeholder="<?php echo $this->lang->line('facebook_link'); ?> " class="form-control inner_shadow_purple" type="url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('youtube_link'); ?> </label>
                                            <input name="youtube_link" placeholder="<?php echo $this->lang->line('youtube_link'); ?> " class="form-control inner_shadow_purple" type="url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('website_link'); ?> </label>
                                            <input name="website_link" placeholder="<?php echo $this->lang->line('website_link'); ?> " class="form-control inner_shadow_purple" type="url">
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
                                            <select class="form-control select2" name="divission_id" id="division">
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
                                            <select class="form-control select2" name="upozilla" id="upozilla">
                                                <option value=""><?php echo $this->lang->line('select_district_first'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('post_code'); ?> </label>
                                            <input name="post_code" placeholder="<?php echo $this->lang->line('post_code'); ?> " class="form-control inner_shadow_purple" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('road_house'); ?> </label>
                                            <input name="road_house" placeholder="<?php echo $this->lang->line('road_house'); ?> " class="form-control inner_shadow_purple" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('club_logo'); ?> </label>
                                            <input type="file" name="club_logo" onchange="readpicture(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('group_banner'); ?> </label>
                                            <input type="file" name="group_banner" onchange="readpicture1(this);">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Team Members</h4>

                                <table id="userListTable" class="table table-bordered table-striped table_th_purple table_custom repeater">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Phone number</th>
                                            <th>Designation</th>
                                            <th>Priority</th>
                                            <th>Member type</th>
                                            <th>Photo</th>

                                        </tr>
                                    </thead>
                                    <tbody data-repeater-list="items">

                                        <?php for ($i = 1; $i <= 20; $i++) { ?>
                                            <tr>
                                                <td> <input name="name[]" placeholder="Name" class="form-control inner_shadow_purple" type="text"> </td>
                                                <td> <input name="phone_number[]" placeholder="Phone Number" class="form-control inner_shadow_purple" type="number"> </td>
                                                <td> <input name="designation[]" placeholder="Designation" class="form-control inner_shadow_purple" type="text"> </td>
                                                <td> <input name="priority[]" placeholder="priority" class="form-control inner_shadow_purple" type="Number"> </td>

                                                <td> <input name="member_type[]" placeholder="member_type" class="form-control inner_shadow_purple" type="text"> </td>

                                                <td>
                                                    <input type="file" name="photo[]" multiple="" onchange="readpicture(this);">
                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>


                            </div>


                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                    <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('save') ?></button>
                                </center>
                            </div>

                        </form>

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
                $('#team_registration_photo')
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

        // this is for present address change only
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
