<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- Horizontal Form -->

            <div class="box box-purple box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title"> <?php echo $this->lang->line('slider'); ?> </h3>

                    <div class="box-tools pull-right">

                    </div>

                </div>

                <div class="box-body">
                        <div class="row" style="box-shadow: 0px 0px 10px 0px purple;margin: 10px 30px 40px 25px;padding: 30px 0px 30px 0px;">

                            <form action="<?php echo base_url('admin/slider') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <div class="col-md-1">

                                        </div>

                                        <div class="col-md-10 col-sm-12">

                                            <label> <?php echo $this->lang->line('title'); ?> *</label>

                                            <input name="title" value="<?= $slider_edit->title; ?>" autocomplete="off" class="form-control inner_shadow_purple" placeholder="<?php echo $this->lang->line('title'); ?>" required="" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1">

                                        </div>

                                        <div class="col-md-10 col-sm-12">

                                            <label> <?php echo $this->lang->line('sort_description'); ?> </label>
                                            <textarea name="sort_description" id="sort_description" rows="3" class="form-control inner_shadow_purple"><?= $slider_edit->sort_description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-10 ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!-- Profile Image -->
                                                    <div class="box box-purple">
                                                        <div class="box-header"> <label> <?php echo $this->lang->line('photo1'); ?> </label> </div>
                                                        <div class="box-body box-profile">
                                                            <center>
                                                                <img id="photo1" class="img-responsive" src="<?php if(file_exists($slider_edit->photo1)) echo base_url($slider_edit->photo1); else echo base_url('assets/uploads.png') ?>" alt="Lecture Sheet Photo" style="width: 70px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                                <br>
                                                                <input type="file" name="photo1" onchange="readpicture1(this);">
                                                            </center>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- Profile Image -->
                                                    <div class="box box-purple" >
                                                        <div class="box-header"> <label> <?php echo $this->lang->line('photo2'); ?> </label> </div>
                                                        <div class="box-body box-profile">
                                                            <center>
                                                                <img id="photo2" class="img-responsive" src="<?php if(file_exists($slider_edit->photo2)) echo base_url($slider_edit->photo2); else echo base_url('assets/uploads.png') ?>" alt="Lecture Sheet Photo" style="width: 70px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                                <br>
                                                                <input type="file" name="photo2" onchange="readpicture2(this);">
                                                            </center>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- Profile Image -->
                                                    <div class="box box-purple" >
                                                        <div class="box-header"> <label> <?php echo $this->lang->line('photo3'); ?> </label> </div>
                                                        <div class="box-body box-profile">
                                                            <center>
                                                                <img id="photo3" class="img-responsive" src="<?php if(file_exists($slider_edit->photo3)) echo base_url($slider_edit->photo3); else echo base_url('assets/uploads.png') ?>" alt="Lecture Sheet Photo" style="width: 70px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                                <br>
                                                                <input type="file" name="photo3" onchange="readpicture3(this);">
                                                            </center>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- Profile Image -->
                                                    <div class="box box-purple" >
                                                        <div class="box-header"> <label> <?php echo $this->lang->line('photo4'); ?> </label> </div>
                                                        <div class="box-body box-profile">
                                                            <center>
                                                                <img id="photo4" class="img-responsive" src="<?php if(file_exists($slider_edit->photo4)) echo base_url($slider_edit->photo4); else echo base_url('assets/uploads.png') ?>" alt="Lecture Sheet Photo" style="width: 70px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                                <br>
                                                                <input type="file" name="photo4" onchange="readpicture4(this);">
                                                            </center>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <center>

                                        <button type="reset" class="btn-sm btn btn-danger"> <?php echo $this->lang->line('reset'); ?> </button>

                                        <button type="submit" class="btn btn-sm bg-teal"> <?php echo $this->lang->line('update'); ?> </button>

                                    </center>

                                </div>

                            </form>

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

<script>
    // profile picture change
    function readpicture1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo1')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }
    function readpicture2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo2')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }
    function readpicture3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo3')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }
    function readpicture4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo4')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }

</script>



