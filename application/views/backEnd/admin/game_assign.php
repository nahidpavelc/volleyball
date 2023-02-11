<style>
  .col-md-12 {
    width: 98%;
  }
</style>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-purple box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $this->lang->line(''); ?> </h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <!-- Edit  -->
          <?php if (isset($game_assign_info)) { ?>
            <div class="row">
              <div class="col-md-12">
                <form action="<?php echo base_url('admin/game_assign/edit/' . $game_assign_id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="col-md-1"></div>
                  <div class="col-md-12" style="box-shadow: 0px 0px 10px 0px purple;padding: 20px; margin: 18px;">

                    <!-- enroll_date  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('enroll_date'); ?> </label>
                          <input name="enroll_date" autocomplete="off" placeholder="<?php echo $this->lang->line('enrollment_date'); ?> " class="form-control inner_shadow_purple date" required="" type="text" value="<?php echo date("d M Y"); ?>">
                        </div>
                      </div>
                    </div>
                    <!-- game_name  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('game_registration_id'); ?></label>
                          <select name="game_registration_id" id="game_registration_id" class="form-control select2">
                            <option value="0">Select Game</option>
                            <?php foreach ($game_registration_list as $key => $value) { ?>
                              <option value="<?php echo $value->id ?>" <?php if ($game_assign_info->game_registration_id == $value->id) echo "selected" ?>><?php echo $value->game_name ?></option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- team_name  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('team_registration_id   '); ?></label>
                          <select name="team_registration_id" id="team_registration_id" class="form-control select2">
                            <option value="0"> Select Team </option>

                            <?php foreach ($team_list as $key => $value) { ?>
                              <option value="<?php echo $value->id ?>" <?php if ($game_assign_info->team_registration_id == $value->id) echo "selected" ?>><?php echo $value->team_name ?></option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Status  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('status'); ?> </label>
                          <select name="approved" id="" class="form-control select2" style="widows: 100%;">
                            <option value="1"><?php echo $this->lang->line("approved"); ?></option>
                            <option value="2"><?php echo $this->lang->line("notapproved"); ?></option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <center>
                        <button type="reset" class="btn-sm btn btn-danger"> <?php echo $this->lang->line('cancel'); ?> </button>
                        <button type="submit" class="btn btn-sm bg-teal"> <?php echo $this->lang->line('update'); ?> </button>
                      </center>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </form>
              </div>
            </div>
            <!-- Add data  -->
          <?php } else { ?>
            <!-- Add  -->
            <div class="row">
              <div class="col-md-12" style="margin:18px ;">
                <form action="<?php echo base_url('admin/game_assign/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="col-md-1"></div>
                  <div class="col-md-12" style="box-shadow: 0px 0px 10px 0px purple;padding: 20px;">

                    <!-- enroll_date  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('enroll_date'); ?> </label>
                          <input name="enroll_date" autocomplete="off" placeholder="<?php echo $this->lang->line('enrollment_date'); ?>" class="form-control inner_shadow_purple date" type="text">
                        </div>
                      </div>
                    </div>
                    <!-- game_name  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('game_name'); ?></label>
                          <select name="game_registration_id" id="game_registration_id" class="form-control select2">
                            <option value="0">Select Game</option>
                            <?php foreach ($game_registration_list as $key => $value) { ?>
                              <option value="<?php echo $value->id; ?>"><?php echo $value->game_name; ?></option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- team_name  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('team_name'); ?></label>
                          <select name="team_registration_id" id="team_registration_id" class="form-control select2">
                            <option value="0"> Select Team </option>

                            <?php foreach ($team_list as $key => $value) { ?>
                              <option value="<?php echo $value->id; ?>"><?php echo $value->team_name; ?></option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Status  -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label><?php echo $this->lang->line('status'); ?> </label>
                          <select name="approved" id="" class="form-control select2" style="widows: 100%;">
                            <option value="1"><?php echo $this->lang->line("approved"); ?></option>
                            <option value="2"><?php echo $this->lang->line("notapproved"); ?></option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <center>
                        <button type="reset" class="btn-sm btn btn-danger"> <?php echo $this->lang->line('reset'); ?> </button>
                        <button type="submit" class="btn btn-sm bg-teal"> <?php echo $this->lang->line('save'); ?> </button>
                      </center>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </form>
              </div>
            </div>
          <?php } ?>
          <!-- List -->
          <div class="row">
            <div class="col-sm-12">
              <div class="custom_table_box">
                <table id="userListTable" class="table table-bordered table-striped table_th_purple custom_table">
                  <thead>
                    <tr>
                      <th style="width: 10%;"><?php echo $this->lang->line('sl'); ?></th>
                      <th style="width: 15%;"><?php echo $this->lang->line('match_name'); ?></th>
                      <th style="width: 20%;"><?php echo $this->lang->line('team_name'); ?></th>
                      <th style="width: 20%;"><?php echo $this->lang->line('enroll_date'); ?></th>
                      <th style="width: 20%;"><?php echo $this->lang->line('status'); ?></th>
                      <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($game_assign_list as $key => $value) {
                    ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php if ($value->game_registration_id) {echo $value->team_name;} ?></td>
                        <td><?php if ($value->game_registration_id) {echo $value->game_name;} ?></td>
                        <td><?php echo $value->enroll_date; ?></td>
                        <td>
                          <?php if ($value->approved == 1) { ?>
                            <span class="pull-right-container">
                              <small class="label bg-blue"><?php echo $this->lang->line('approved'); ?></small>
                            </span>

                          <?php } else if ($value->approved == 2) { ?>
                            <span class="pull-right-container">
                              <small class="label bg-red"><?php echo $this->lang->line('notapproved'); ?></small>
                            </span>
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?= base_url('admin/game_assign/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"> <i class="fa fa-edit"></i> </a>
                          <a href="<?= base_url('admin/game_assign/delete/' . $value->id); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-red"> <i class="fa fa-trash"></i> </a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class=" box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
</section>

<script type="text/javascript">
  $(function() {
    $("#userListTable").DataTable();
  });
</script>
<!-- Date  -->
<script>
  $(document).ready(function() {
    $('.date').datepicker({
      autoclose: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd M yy",
      yearRange: "-10:+10"
    });
  });
</script>
