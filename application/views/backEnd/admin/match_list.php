<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('match_list'); ?></h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('admin/match/add') ?>" class="btn bg-purple btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('match_add'); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="userListTable" class="table table-bordered table-striped table_th_teal">
            <thead>
              <tr>
                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('game_id'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('team_id'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('enroll_date'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('approve_date'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('insert_time'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl = 1;
              foreach ($match_list as $value) {
              ?>
                <tr>
                  <td> <?php echo $sl++; ?> </td>
                  <td> <?php echo $value->game_registration_id; ?> </td>
                  <td> <?php echo $value->team_registration_id; ?> </td>
                  <td> <?php echo $value->enroll_date; ?> </td>
                  <td> <?php echo $value->approved; ?> </td>
                  <td> <?php echo $value->insert_time; ?> </td>

                  <td>
                    <a href="<?php echo base_url('admin/match/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/match/delete/' . $value->id); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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
