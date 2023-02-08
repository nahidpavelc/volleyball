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
          <h3 class="box-title"><?php echo $this->lang->line('edit_member_registration'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/member-registration/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('member_registration_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">

            <form action="<?php echo base_url("admin/member-registration/edit/" . $member_registration_list->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Personal Information</h4>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('name_bn'); ?> </label>
                      <input name="name_bn" value="<?php echo $member_registration_list->name_bn; ?>" placeholder="<?php echo $this->lang->line('name_bn'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('name_en'); ?> </label>
                      <input name="name_en" value="<?php echo $member_registration_list->name_en; ?>" placeholder="<?php echo $this->lang->line('name_en'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('father_name'); ?> </label>
                      <input name="father_name" value="<?php echo $member_registration_list->father_name; ?>" placeholder="<?php echo $this->lang->line('father_name'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('phone'); ?> </label>
                      <input name="phone" value="<?php echo $member_registration_list->phone; ?>" placeholder="<?php echo $this->lang->line('phone'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('birth_date'); ?> </label>
                      <input name="birth_date" value="<?php echo $member_registration_list->birth_date; ?>" id="date" placeholder="<?php echo $this->lang->line('birth_date'); ?> " class="form-control inner_shadow_teal " required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('nid_card'); ?> </label>
                      <input name="nid_card" value="<?php echo $member_registration_list->nid_card; ?>" placeholder="<?php echo $this->lang->line('nid_card'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('email'); ?> </label>
                      <input name="email" value="<?php echo $member_registration_list->email; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('facebook_url'); ?> </label>
                      <input name="facebook_url" value="<?php echo $member_registration_list->facebook_url; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " class="form-control inner_shadow_teal" required="" type="url">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('live_interview_link'); ?> </label>
                      <input name="live_interview_link" value="<?php echo $member_registration_list->live_interview_link; ?>" placeholder="<?php echo $this->lang->line('live_interview_link'); ?> " class="form-control inner_shadow_teal" required="" type="url">
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="box box-teal" style="margin-left: 15px;">
                      <div class="box-header"> <label> <?php echo $this->lang->line('nid_picture'); ?> </label> </div>
                      <div class="box-body box-profile">
                        <center>
                          <img id="member_registration_photo" class="img-responsive" src="<?= base_url('assets/preview.png'); ?>" alt="profile picture" style="max-width:80; width: 100px; height: 100px;"><small style="color: gray">width : 400px, Height : 400px</small>
                          <br>
                          <input type="file" name="attachment2" onchange="readpicture(this);">
                        </center>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box box-teal" style="margin-left: 15px;">
                      <div class="box-header"> <label> <?php echo $this->lang->line('profile_picture'); ?> </label> </div>
                      <div class="box-body box-profile">
                        <center>
                          <img id="nid_photo" class="img-responsive" src="<?php echo base_url($member_registration_list->photo); ?>" alt="profile picture" style="max-width:80; width: 100px; height: 100px;"><small style="color: gray">width : 400px, Height : 400px</small>
                          <br>
                          <input type="file" name="photo" onchange="readpicture1(this);">
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Present Address</h4>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_division_id'); ?> </label>
                      <select name="pre_division_id" id="pre_division_id" class="form-control select2">
                        <?php foreach ($divissions as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->pre_division_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_zilla_id'); ?> </label>
                      <select name="pre_zilla_id" id="pre_zilla_id" class="form-control select2">
                        <?php foreach ($zilla as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->pre_zilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_upozilla_id'); ?> </label>
                      <select name="pre_upozilla_id" id="pre_upozilla_id" class="form-control select2">
                        <?php foreach ($upozilla as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->pre_upozilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_village_road'); ?> </label>
                      <input name="pre_village_road" value="<?php echo $member_registration_list->pre_village_road; ?>" placeholder="<?php echo $this->lang->line('pre_village_road'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Parmanent Address</h4>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('par_division_id'); ?> </label>
                      <select name="par_division_id" id="par_division_id" class="form-control select2">
                        <?php foreach ($divissions as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->par_division_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('par_zilla_id'); ?> </label>
                      <select name="par_zilla_id" id="par_zilla_id" class="form-control select2">
                        <?php foreach ($zilla as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->par_zilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('par_upozilla_id'); ?> </label>
                      <select name="par_upozilla_id" id="par_upozilla_id" class="form-control select2">
                        <?php foreach ($upozilla as $key => $value) { ?>
                          <option value="<?php echo $value->id ?>" <?php if ($member_registration_list->par_upozilla_id == $value->id) echo "selected" ?>><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('par_village_road'); ?> </label>
                      <input name="par_village_road" value="<?php echo $member_registration_list->par_village_road; ?>" placeholder="<?php echo $this->lang->line('par_village_road'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="category_select">
                    <div class="pressent_heading" style="font-weight: bold;">Workplace</div>
                    <div class="category_list">
                      <div class="category_heading">Select category </div>
                      <div class="checkbox_list">
                        <label>
                          <input type="checkbox" name="keloyar" id="keloyar">Player
                        </label>
                        <label>
                          <input type="checkbox" name="cocha" id="cocha">Coach
                        </label>
                        <label>
                          <input type="checkbox" name="refary" id="refary">Referee
                        </label>
                        <label>
                          <input type="checkbox" name="others" id="others"> Other
                        </label>
                      </div>
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="school_volley" id="school_volley"> <span class="voly_span ">School volleyball </span> <input type="text" class="input_control inner_shadow_teal" name="school_start_sal" id="school_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="school_end_sal" id="school_end_sal" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="jela_volley" id="jela_volley"> <span class="voly_span">District Volleyball </span> <input type="text" class="input_control inner_shadow_teal" name="jela_start_sal" id="jela_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="jela_end_sal" id="jela_start_end" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="club_volley" id="club_volley"> <span class="voly_span">Club volleyball </span> <input type="text" class="input_control inner_shadow_teal" name="club_start_sal" id="club_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="club_end_sal" id="club_end_sal" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="eco_volley" id="eco_volley"> <span class="voly_span">Economics Volleyball </span> <input type="text" class="input_control inner_shadow_teal" name="eco_start_sal" id="eco_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="eco_end_sal" id="eco_end_sal" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="naclub_volley" id="naclub_volley"> <span class="voly_span">National Club Volleyball </span> <input type="text" class="input_control inner_shadow_teal" name="naclub_start_sal" id="naclub_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="club_end_sal" id="club_end_sal" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="national_volley" id="national_volley"> <span class="voly_span">National Team</span> <input type="text" class="input_control inner_shadow_teal" name="national_start_sal" id="national_start_sal" placeholder="Year"> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="national_end_sal" id="national_end_sal" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="" id=""> <span class="voly_span">Official </span> <input type="text" class="input_control inner_shadow_teal" placeholder="Year" name="" id=""> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="" id="" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="" id=""> <span class="voly_span">Host </span> <input type="text" class="input_control inner_shadow_teal" placeholder="Year" name="" id=""> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="" id="" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="" id=""> <span class="voly_span">Volunteer </span> <input type="text" class="input_control inner_shadow_teal" placeholder="Year" name="" id=""> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="" id="" placeholder="Year">
                    </div>
                    <div class="option_checklist">
                      <input type="checkbox" name="" id=""> <span class="voly_span">Other Volleyball </span> <input type="text" class="input_control inner_shadow_teal" placeholder="Year" name="" id=""> <span>To</span> <input type="text" class="input_control inner_shadow_teal" name="" id="" placeholder="Year">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
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
      yearRange: "-10:+10"
    });

  });
</script>
