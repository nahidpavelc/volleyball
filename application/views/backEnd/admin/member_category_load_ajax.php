<div class="table_box">
    <h3 style="text-align: center;"> <?= $category_details->name; ?> </h3>
    <table id="userListTable" class="table table-bordered table-striped table_th_teal table_custom">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Year</th>
                <th>To</th>
                <th>Year</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                $sl = 1;
                $category_array = explode("**", $category_details->fields);
                foreach ($category_array as $value) {
                    ?>
            <tr>
                <td> <input type="checkbox" aria-label="..."> </td>
                <td> <?php echo $value; ?>
                <input name="field_name" class="form-control inner_shadow_teal" type="hidden" value="<?= $value; ?>">
                </td>
                <td> <input name="year1" placeholder="Year " class="form-control inner_shadow_teal"  type="number"> </td>
                <td> - </td>
                <td> <input name="year2" placeholder="Year " class="form-control inner_shadow_teal" type="number"> </td> 
            </tr>
            <?php
                }
                ?>
        </tbody>
    </table>
</div>