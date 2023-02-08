<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-teal box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line("member_registration_category_list"); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url("admin/member-registration-category/add"); ?>" class="btn bg-purple btn-sm" style="color: white; "><i class="fa fa-plus"></i> <?php echo $this->lang->line('member_registration_category_add') ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    
                    <table id="userListTable" class="table table-bordered table-striped table_th_teal" style="width: 100%;">
                        <thead>
                            <tr>
                            <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('member_name'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('member_category'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('category_values'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('action'); ?></th>
                                
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            
                            foreach ($member_registration_category_list as $key=>$value) {
                                ?>
                                <tr >
                                    
                                    <td><?php echo ++$new_serial; ?></td>
                                    <td><?php echo $value->name_bn; ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->category_values; ?></td>
                                    
                                    <td> 
                                        <a href="<?php echo base_url('admin/member-registration-category/edit/'.$value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/member-registration-category/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                                    </td>
                                   
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <center>
                            <?php echo $links; ?>
                        </center>
                    </div>
                </div>
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
