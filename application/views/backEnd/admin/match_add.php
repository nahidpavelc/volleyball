<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('match_add'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/match/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('match_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">
          <div class="row">

            <form action="<?php echo base_url("admin/match/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-12">
                <h4 style="text-align: center; font-size: 23px; font-weight: bold; padding-bottom: 5px;">Match Registration</h4>

                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('match_registration_id'); ?> </label>
                      <select name="game_registration_id" id="game_registration_id" class="form-control inner_shadow_teal">
                        <option value="">Select Option</option>
                        <option value="1">Football</option>
                        <option value="2">Cricket</option>
                        <option value="3">Vollyball</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('name_bn'); ?> </label>
                      <input name="team_registration_id" placeholder="<?php echo $this->lang->line('name_bn'); ?> " class="form-control inner_shadow_teal" required="" type="text">
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
</script>
