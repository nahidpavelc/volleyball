

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-purple box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('team_registration_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/team-registration/add') ?>" class="btn bg-teal btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_team_registration'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="userListTable" class="table table-bordered table-striped table_th_purple">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('team_name'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('registration_number	'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('team_gender'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('mobile_number'); ?></th>
                                
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                foreach ($team_registration_list as $value) {
                                	?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->team_name; ?> </td>
                                <td> <?php echo $value->registration_number; ?> </td>
                                <td> <?php echo $value->team_gender; ?> </td>
                                <td> <?php echo $value->mobile_number; ?> </td>
                               
                               
                                
                                <!-- <td>
                                    <img src="<?php echo base_url($value->photo) ?>" alt="" width="50px" height="50px">
                                </td> -->
                                <td> 
                                    <a href="<?php echo base_url('admin/team-registration/edit/'.$value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/team-registration/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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
    $(function () {
      $("#userListTable").DataTable();
    });
    
</script>

