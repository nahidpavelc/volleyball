<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('member_registration_list'); ?></h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('admin/member-registration/add') ?>" class="btn bg-purple btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_member_registration'); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="userListTable" class="table table-bordered table-striped table_th_teal">
            <thead>
              <tr>
                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('name_bn'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('name_en'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('father_name'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('phone'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('email'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('photo'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl = 1;
              foreach ($member_registration_list as $value) {
              ?>
                <tr>
                  <td> <?php echo $sl++; ?> </td>
                  <td> <?php echo $value->name_bn; ?> </td>
                  <td> <?php echo $value->name_en; ?> </td>
                  <td> <?php echo $value->father_name; ?> </td>
                  <td> <?php echo $value->phone; ?> </td>

                  <td> <?php echo $value->email; ?> </td>

                  <td>
                    <img src="<?php echo base_url($value->photo) ?>" alt="" width="50px" height="50px">
                  </td>
                  <td>
                    <a href="<?php echo base_url('admin/member-registration/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/member-registration/delete/' . $value->id); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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
