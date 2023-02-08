<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-purple box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo $this->lang->line('add_team'); ?> </h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <?php if (isset($team_info)) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo base_url('admin/team/edit/' . $team_id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="box-shadow: 0px 0px 10px 0px purple;padding: 20px; margin: 18px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label for="title_one"><?php echo $this->lang->line("name"); ?> *</label>
                                                    <input name="name" class="form-control inner_shadow_purple" placeholder="<?php echo $this->lang->line('name'); ?>" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('priority'); ?></label><small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>
                                                    <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" value="<?php echo $team_info->priority; ?>" class="form-control inner_shadow_purple" required="" type="number">
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
                    <?php } else { ?>

                        <div class="row">
                            <div class="col-md-12" style="margin:18px ;">
                                <form action="<?php echo base_url('admin/team/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="box-shadow: 0px 0px 10px 0px purple;padding: 20px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label for="title_one"><?php echo $this->lang->line("name"); ?> *</label>
                                                    <input name="name" autocomplete="off" class="form-control inner_shadow_purple" placeholder="<?php echo $this->lang->line('name'); ?>" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('priority'); ?></label><small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>
                                                    <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_purple" required="" type="number">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom_table_box">
                                <table id="userListTable" class="table table-bordered table-striped table_th_purple custom_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;"><?php echo $this->lang->line('sl'); ?></th>
                                            <th style="width: 20%;"><?php echo $this->lang->line('name'); ?></th>
                                            <th style="width: 20%;"><?php echo $this->lang->line('priority'); ?></th>
                                            <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($team_list as $key => $value) {
                                        ?>

                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->priority; ?></td>

                                                <td>
                                                    <a href="<?= base_url('admin/team/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"> <i class="fa fa-edit"></i> </a>
                                                    <a href="<?= base_url('admin/team/delete/' . $value->id); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-red"> <i class="fa fa-trash"></i> </a>
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

                <div class=" box-footer">
                </div>

            </div>

        </div>

    </div>
</section>

<script type="text/javascript">
    $(function() {
        $("#userListTable").DataTable();
    });
</script>