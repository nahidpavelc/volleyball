<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('add_member_registration'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/member-registration/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('member_registration_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">

            <form action="<?php echo base_url("admin/member-registration/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Personal Information</h4>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('name_bn'); ?> </label>
                      <input name="name_bn" placeholder="<?php echo $this->lang->line('name_bn'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('name_en'); ?> </label>
                      <input name="name_en" placeholder="<?php echo $this->lang->line('name_en'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('father_name'); ?> </label>
                      <input name="father_name" placeholder="<?php echo $this->lang->line('father_name'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('phone'); ?> </label>
                      <input name="phone" placeholder="<?php echo $this->lang->line('phone'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('birth_date'); ?> </label>
                      <input name="birth_date" id="date" placeholder="<?php echo $this->lang->line('birth_date'); ?> " class="form-control inner_shadow_teal " required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('nid_card'); ?> </label>
                      <input name="nid_card" placeholder="<?php echo $this->lang->line('nid_card'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('email'); ?> </label>
                      <input name="email" placeholder="<?php echo $this->lang->line('email'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('facebook_url'); ?> </label>
                      <input name="facebook_url" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " class="form-control inner_shadow_teal" required="" type="url">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('live_interview_link'); ?> </label>
                      <input name="live_interview_link" placeholder="<?php echo $this->lang->line('live_interview_link'); ?> " class="form-control inner_shadow_teal" required="" type="url">
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
                          <img id="nid_photo" class="img-responsive" src="<?= base_url('assets/preview.png'); ?>" alt="profile picture" style="max-width:80; width: 100px; height: 100px;"><small style="color: gray">width : 400px, Height : 400px</small>
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('pre_village_road'); ?> </label>
                      <input name="pre_village_road" placeholder="<?php echo $this->lang->line('pre_village_road'); ?> " class="form-control inner_shadow_teal" required="" type="text">
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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
                          <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('par_village_road'); ?> </label>
                      <input name="par_village_road" placeholder="<?php echo $this->lang->line('par_village_road'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Workplace</h4>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label> Select Category : </label>
                        <?php foreach ($member_categories as $member_category_single) { ?>
                          <input onclick="load_category_form('<?= $member_category_single->id; ?>')" type="checkbox" name="category_<?= $member_category_single->id; ?>" id="category_<?= $member_category_single->id; ?>"> <?= $member_category_single->name; ?>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <?php foreach ($member_categories as $member_category_single) { ?>
                      <span id="set_fields_<?= $member_category_single->id; ?>" style="width: 100%;"> </span>
                    <?php } ?>
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
<!-- // profile picture change -->
<script>
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
  //
</script>
