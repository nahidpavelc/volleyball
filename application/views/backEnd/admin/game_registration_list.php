<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('game_registration_list'); ?></h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('admin/game-registration/add') ?>" class="btn bg-purple btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('game_registration_add'); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="userListTable" class="table table-bordered table-striped table_th_teal">
            <thead>
              <tr>
                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('banner_photo'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('name'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('opening_date'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('full_address'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('contact_person'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('phone'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('mail'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl = 1;
              foreach ($game_registration_list as $value) {
              ?>
                <tr>
                  <td> <?php echo $sl++; ?> </td>
                  <td>
                    <img class="img" src="<?php if (file_exists($value->game_banner)) echo base_url($value->game_banner);
                                          else echo base_url('assets/logo.png') ?>" alt="photo" width="50px" height="50px">
                  </td>
                  <td> <?php echo $value->game_name; ?> </td>
                  <td> <?php echo $value->opening_date; ?> </td>
                  <td> <?php echo $value->full_address;?> </td>
                  <td> <?php echo $value->contact_person_name; ?> </td>
                  <td> <?php echo $value->contact_person_phone; ?> </td>
                  <td> <?php echo $value->contact_person_mail; ?> </td>

                  <td>
                    <a href="<?php echo base_url('admin/game_registration/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/game_registration/delete/' . $value->id); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
<script type="text/javascript">
  $(function() {
    $("#userListTable").DataTable();
  });
</script>
