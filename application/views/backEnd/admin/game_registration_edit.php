<style>
  .category_select {
    margin-left: 100px;
  }

  .category_list {
    display: flex;
    gap: 30px;
    margin-top: 10px;
    margin-bottom: 18px;
    font-size: 18px;
  }

  .category_heading {
    font-weight: bold;
  }

  .checkbox_list label {
    margin-right: 20px;
  }

  .pressent_heading {
    text-align: center;
    font-size: 20px;
    margin-top: 15px;
    margin-bottom: 10px;
  }

  .option_checklist {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
  }

  .option_checklist .input_control {
    width: 200px;
    border-radius: 0%;
    border: none;
    border: 1px solid #c9c9c9;
    padding: 0px 10px 4px 10px;
    line-height: 30px;

  }

  .option_checklist span {
    padding: 0px 12px;
  }

  .option_checklist .voly_span {
    flex: 0 0 168px;
  }

  input[type=checkbox],
  input[type=radio] {
    margin: 4px 5px 0;
    margin-top: 1px\9;
    line-height: normal;
  }
</style>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('game_registration_edit'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/game_registration/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('game_registration_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">

            <form action="<?php echo base_url("admin/game_registration/edit/" . $get_game_list->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;"><?php echo $this->lang->line('game_information') ?></h4>

                <div class="col-md-9">
                  <!-- game_name  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('game_name'); ?> *</label>
                        <input name="game_name" value="<?php echo $get_game_list->game_name; ?>" placeholder="<?php echo $this->lang->line('game_name'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Gender -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('team_gender'); ?> </label>
                        <select name="team_gender" id="" class="form-control select2" style="widows: 100%;">
                          <option value="1" <?php if ($get_game_list->team_gender == 1) echo "selected"; ?>><?php echo $this->lang->line("male"); ?></option>
                          <option value="2" <?php if ($get_game_list->team_gender == 2) echo "selected"; ?>><?php echo $this->lang->line("female"); ?></option>
                          <option value="2" <?php if ($get_game_list->team_gender == 3) echo "selected"; ?>><?php echo $this->lang->line("special"); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- team_zoon -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('team_zoon_type_id'); ?> *</label>

                        <select name="team_zoon_type_id" id="team_zoon_type_id" class="form-control select2" required="">
                          <?php foreach ($team_zoon_type_list as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>" <?php if ($get_game_list->team_zoon_type_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- opening date  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('opening_date'); ?> </label>
                        <input value="<?php if ($get_game_list->opening_date) echo date('d M Y', strtotime($get_game_list->opening_date)) ?>" name="opening_date" id="date" placeholder="<?php echo $this->lang->line('opening_date'); ?> " class="form-control inner_shadow_teal " type="text" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <!-- app last date -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('application_last_date'); ?> </label>
                        <input name="application_last_date" id="date1" value="<?php if ($get_game_list->application_last_date) echo date('d M Y', strtotime($get_game_list->application_last_date)) ?>" placeholder="<?php echo $this->lang->line('application_last_date'); ?> " class="form-control inner_shadow_teal " type="text" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <!-- Facebook link  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('facebook_link'); ?> </label>
                        <input name="facebook_link" value="<?php echo $get_game_list->facebook_link; ?>" placeholder="<?php echo $this->lang->line('facebook_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>
                  <!-- youtube link  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('youtube_link'); ?> </label>
                        <input name="youtube_link" value="<?php echo $get_game_list->youtube_link; ?>" placeholder="<?php echo $this->lang->line('youtube_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>
                  <!-- twitter_link -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('twitter_link'); ?> </label>
                        <input name="twitter_link" value="<?php echo $get_game_list->twitter_link; ?>" placeholder="<?php echo $this->lang->line('twitter_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Image  -->
                <div class="col-md-3">
                  <div class="box box-purple">
                    <div class="box-header"> <label> <?php echo $this->lang->line('photo_file'); ?> </label> </div>
                    <div class="box-body box-profile">
                      <center>
                        <img id="marketing_reports_change" class="img-responsive" src="<?php if (file_exists($get_game_list->game_banner)) echo base_url($get_game_list->game_banner);
                                                                                        else echo base_url('assets/upload.png') ?>" alt="Lecture Sheet Photo" style="width: 100px; height:100px"><small style="color: gray">width : 400px, Height : 400px</small>
                        <br>
                        <input type="file" name="group_banner" value="<?php echo $get_game_list->game_banner; ?>" onchange="readpicture1(this);">
                      </center>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>

                <!-- game_Venue -->
                <div class="col-md-12">
                  <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Game Venue</h4>
                  <!-- division id  -->

                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('division'); ?></label>

                        <select class="form-control select2" name="division_id" id="division_id">

                          <?php foreach ($divissions as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>" <?php if ($get_game_list->division_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                          <?php } ?>


                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('district') ?></label>

                        <select class="form-control select2" name="zilla_id" id="zilla_id">


                          <?php foreach ($zilla as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>" <?php if ($get_game_list->zilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                          <?php } ?>
                        </select>



                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('upozilla') ?></label>

                        <select class="form-control select2" name="upozilla_id" id="upozilla_id">


                          <?php foreach ($upozilla as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>" <?php if ($get_game_list->upozilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                          <?php } ?>
                        </select>


                      </div>
                    </div>
                  </div>

                  <!-- Full Address  -->
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('full_address'); ?> </label>
                        <input name="full_address" value="<?php echo $get_game_list->full_address; ?>" placeholder="<?php echo $this->lang->line('full_address'); ?> " class="form-control inner_shadow_teal" type="text">
                      </div>
                    </div>
                  </div>

                  <!-- contact_person_name -->
                  <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Contact Person</h4>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('person_name'); ?></label>
                        <input name="contact_person_name" value="<?php echo $get_game_list->contact_person_name; ?>" placeholder="<?php echo $this->lang->line('contact_person_name'); ?> " class="form-control inner_shadow_teal" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- contact_person_phone -->
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('person_phone'); ?> * </label>
                        <input name="contact_person_phone" value="<?php echo $get_game_list->contact_person_phone; ?>" autocomplete="off" placeholder="<?php echo $this->lang->line('contact_person_phone'); ?> " class="form-control inner_shadow_teal" type="tel" pattern="[0]{1}[1]{1}[3|4|5|6|7|8|9]{1}[0-9]{8}" required="">
                      </div>
                    </div>
                  </div>
                  <!-- contact_person_mail  -->
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('person_mail'); ?></label>
                        <input name="contact_person_mail" value="<?php echo $get_game_list->contact_person_mail ?>" placeholder="<?php echo $this->lang->line('contact_person_mail'); ?>" class="form-control inner_shadow_teal" type="email">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <center>
                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>
                    <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('update'); ?></button>
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

  $(document).ready(function() {
    $('#date1').datepicker({
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
        // this is for  address change only
        $('#pre_division_id').change(function() {
            $('#pre_zilla_id').find('option').remove().end().append("<option value=''>Select Division First</option>");
            $('#pre_upozilla_id').find('option').remove().end().append("<option value=''>Select District First</option>");
            loadZilla($(this).find(':selected').val());
        });

        $('#pre_zilla_id').change(function() {
            $('#pre_upozilla_id').find('option').remove().end().append("<option value=''>Select District First</option>");
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

                    $("#pre_division_id").append($('<option>', {
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

                    $("#pre_zilla_id").append($('<option>', {
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

                    $("#pre_upozilla_id").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                });
            });
    }
</script>