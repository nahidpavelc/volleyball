<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('game_registration_add'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/game_registration/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('game_registration_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">

            <form action="<?php echo base_url("admin/game_registration/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Game Information</h4>
                <div class="col-md-9">
                  <!-- game name  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('game_name'); ?>* </label>
                        <input name="game_name" placeholder="<?php echo $this->lang->line('game_name'); ?> " class="form-control inner_shadow_teal" type="text" required="">
                      </div>
                    </div>
                  </div>
                  <!-- Gender -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('gender'); ?> </label>
                        <select name="team_gender" id="" class="form-control select2" style="widows: 100%;">
                          <option value=""><?php echo $this->lang->line("select_gender"); ?></option>
                          <option value="male"><?php echo $this->lang->line("male"); ?></option>
                          <option value="female"><?php echo $this->lang->line("female"); ?></option>
                          <option value="special"><?php echo $this->lang->line("special"); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- team_zoon -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('team_zoon_type_id'); ?>* </label>

                        <select name="team_zoon_type_id" id="team_zoon_type_id" class="form-control select2" required="">
                          <option value="">Team Zoon Type</option>
                          <?php foreach ($team_zoon_type_list as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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
                        <input name="opening_date"  id="date" placeholder="<?php echo $this->lang->line('opening_date'); ?> " class="form-control inner_shadow_teal " type="text" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <!-- app last date -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('application_last_date'); ?> </label>
                        <input name="application_last_date" id="date1" autocomplete="off" placeholder="<?php echo $this->lang->line('application_last_date'); ?> " class="form-control inner_shadow_teal " type="text" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <!-- Facebook link  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('facebook_link'); ?> </label>
                        <input name="facebook_link" placeholder="<?php echo $this->lang->line('facebook_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>
                  <!-- youtube link  -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('youtube_link'); ?> </label>
                        <input name="youtube_link" placeholder="<?php echo $this->lang->line('youtube_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>
                  <!-- twitter_link -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label><?php echo $this->lang->line('twitter_link'); ?> </label>
                        <input name="twitter_link" placeholder="<?php echo $this->lang->line('twitter_link'); ?> " class="form-control inner_shadow_teal" type="url">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="row" style="float:none; margin:0 auto;">
                    <div class="col-md-12">
                      <div class="box box-teal" style="margin-left: 15px;">
                        <div class="box-header"> <label> <?php echo $this->lang->line('banner_image'); ?> </label> </div>
                        <div class="box-body box-profile">
                          <center>
                            <img id="nid_photo" class="img-responsive" src="<?= base_url('assets/preview.png'); ?>" alt="profile picture" style="max-width:80; width: 100px; height: 100px;"><small style="color: gray">width : 400px, Height : 400px</small>
                            <br>
                            <input type="file" name="game_banner" onchange="readpicture1(this);">
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- game_Venue -->
              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Game Venue</h4>
                <!-- division id  -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_division_id'); ?> </label>
                      <select name="division_id" id="pre_division_id" class="form-control select2">
                        <option value=""><?php echo $this->lang->line('select_a_division'); ?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- Zilla id  -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_zilla_id'); ?> </label>
                      <select name="zilla_id" id="pre_zilla_id" class="form-control select2">
                        <option value=""><?php echo $this->lang->line('select_division_first'); ?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- Upozilla id  -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_upozilla_id'); ?> </label>

                      <select name='upozilla_id' id='pre_upozilla_id' class='form-control select2'>
                        <option value="" class="form-control select2"><?php echo $this->lang->line('select_district_first'); ?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- Full Address  -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('full_address'); ?> </label>
                      <input name="full_address" value="<?php echo $this->lang->line('full_address'); ?>" placeholder="<?php echo $this->lang->line('full_address'); ?> " class="form-control inner_shadow_teal" type="text">
                    </div>
                  </div>
                </div>

                <!-- contact_person_name -->
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Contact Person</h4>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('person_name'); ?> *</label>
                      <input name="contact_person_name" placeholder="<?php echo $this->lang->line('contact_person_name'); ?> " class="form-control inner_shadow_teal" type="text">
                    </div>
                  </div>
                </div>
                <!-- contact_person_phone -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('person_phone'); ?> * </label>
                      <input name="contact_person_phone" autocomplete="off" placeholder="<?php echo $this->lang->line('contact_person_phone'); ?> " class="form-control inner_shadow_teal" type="tel" pattern="[0]{1}[1]{1}[3|4|5|6|7|8|9]{1}[0-9]{8}">
                    </div>
                  </div>
                </div>
                <!-- contact_person_mail  -->
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('person_mail'); ?></label>
                      <input name="contact_person_mail" placeholder="<?php echo $this->lang->line('contact_person_mail'); ?>" class="form-control inner_shadow_teal" type="email">
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-md-12" style="margin-top: 15px;">
                <center>
                  <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>
                  <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('save'); ?></button>
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
      yearRange: "-5:+5"
    });
  });
  $(document).ready(function() {
    $('#date1').datepicker({
      autoclose: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd M yy",
      yearRange: "-5:+5"
    });
  });
</script>

<script>
  function load_category_form(category_id) {
    alert(category_id);

    if ($('#category_' + category_id).is(':checked')) {

      $.post("<?php echo base_url() . "admin/load_member_category_ajax/"; ?>", {
          category_id: category_id
        },
        function(data2) {
          $("#set_fields_" + category_id).html(data2);
        });
    } else {
      $("#set_fields_" + category_id).html("");
    }
  }
</script>

<script>
  $(document).ready(function() {
    // this is for present address change only
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
