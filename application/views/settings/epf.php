<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="product_action" class="form-horizontal">
            <div class="card-body">
                <hr>
                <h5>EPF Settings</h5>
                <p>...</p>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[employer_rate]">EPF Employer Rate</label>
                    <div class="col-sm-6">
                        <select name="data[employer_rate]" class="form-control">
                            <option value="0" <?php echo ! $data['data']['employer_rate'] ? 'selected' : '' ?> >Extra on top of normal employer EPF</option>
                            <option value="1" <?php echo $data['data']['employer_rate'] ? 'selected' : '' ?>>Fixed rate for staff with salary RM5K+ on top of individual's extra</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[employer_addon_percentage]">EPF Employer Addon Percentage (%)</label>
                    <div class="col-sm-6">
                        <input name="data[employer_addon_percentage]" type="number" max="100" min="0.1" step="0.1" class="form-control form-number" value="<?php echo $data['data']['employer_addon_percentage']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[non_malaysian_epf]">For non-Malaysian, pay normal EPF rate</label>
                    <div class="col-sm-6">
                        <select name="data[non_malaysian_epf]" class="form-control">
                            <option value="0" <?php echo ! $data['data']['non_malaysian_epf'] ? 'selected' : '' ?> ><?php echo $this->lang->line('No') ?></option>
                            <option value="1" <?php echo $data['data']['non_malaysian_epf'] ? 'selected' : '' ?>><?php echo $this->lang->line('Yes') ?></option>
                        </select>
                    </div>
                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="epf_update" class="btn btn-success margin-bottom"
                               value="<?php echo $this->lang->line('Update') ?>" data-loading-text="Updating...">
                    </div>
                </div>

            </div>
        </form>
    </div>

</article>
<script type="text/javascript">
    $(".form-number").keypress(function (e) {
        const keyValue = e.key;
        // If the input is empty and the key pressed is "0" nothing is printed
        if (!e.target.value && keyValue === 0) {
            e.preventDefault();
        } else {
            // If the key pressed is not a number or a period, nothing is printed
            if (!/[0-9.]/.test(keyValue)) {
                e.preventDefault();
            } else {
                // If the number has one or two whole numbers and a point, another
                // point won't be printed
                if (/[0-9]{1,2}[.]/.test(e.target.value) && keyValue === ".") {
                    e.preventDefault();
                }
                // If the number has one or two whole numbers and a point
                else if (/[0-9]{1,2}[.]/.test(e.target.value)) {
                    // We can write up to two more numbers after the point
                    if (/[0-9]{1,2}[.][0-9]{2}/.test(e.target.value)) {
                        e.preventDefault();
                    }
                }
                    // If there are 3 numbers and we press another, a point
                    // will be printed automatically
                // And we can write up to two more numbers after the point
                else if (/[0-9]{3}/.test(e.target.value) && keyValue !== ".") {
                    e.target.value += ".";
                    if (/[0-9]{3}[.][0-9]{2}/.test(e.target.value)) {
                        e.preventDefault();
                    }
                }
            }
        }
    });
    $("#epf_update").click(function (e) {
        e.preventDefault();
        var actionurl = baseurl + 'settings/epf_settings';
        actionProduct(actionurl);
    });
</script>
