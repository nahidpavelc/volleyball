
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-teal box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo $this->lang->line('member_registration_category_edit'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/member-registration-category/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('member_registration_category_list'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/member-registration-category/edit/". $member_Registration_category_list->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('membership_registration_id'); ?></label>
                                            <select name="membership_registration_id" id="membership_registration_id" class="form-control select2">
                                                <?php foreach($member_Registration_list as $key=>$value) {?>
                                                    <option value="<?php echo $value->id?>" <?php if($member_Registration_category_list->membership_registration_id == $value->id) echo "selected" ?>><?php echo $value->name_bn?></option>
                                                    <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('member_category_id') ?></label>
                                            <select name="member_category_id" id="member_category_id" class="form-control select2">
                                                <?php foreach($member_category_list as $key=> $value) {?>
                                                   <option value="<?php echo $value->id?>" <?php if($member_Registration_category_list->member_category_id == $value->id) echo "selected" ?>><?php echo $value->name?></option>
                                                   <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('category_values') ?></label>
                                            <input name="category_values" id="category_values" value="<?php echo $member_Registration_category_list->category_values; ?>" placeholder="<?php echo $this->lang->line('category_values'); ?>" class="form-control inner_shadow_teal" required="" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                    <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('save') ?></button>
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
    $(document).ready(function(){
    $("input").focus(function(){
      var course_fee = parseInt($("#course_fee").val());
      var admission_fee = parseInt($("#admission_fee").val());

      $("#total_fee").val(course_fee+admission_fee);
    });
    
});
</script>
