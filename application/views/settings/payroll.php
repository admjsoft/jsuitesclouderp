<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="product_action" class="form-horizontal">
            <div class="card-body">
                <hr>
                <h5>General Payroll Settings</h5>
                <p>...</p>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data['signatory_name']">Signatory of payroll forms</label>
                    <div class="col-sm-6">
                        <input name="data[signatory_name]" type="text" class="form-control" value="<?php echo $data['data']['signatory_name']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data['standard_working_hours']">Standard Working Hours</label>
                    <div class="col-sm-6">
                        <input name="data[standard_working_hours]" type="number" max="24" min="1" step="1" class="form-control form-number" value="<?php echo $data['data']['standard_working_hours']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data['report_show_zero']">Show zero net-pay in payroll report</label>
                    <div class="col-sm-6">
                        <select name="data[report_show_zero]" class="form-control">
                            <option value="0" <?php echo ! $data['data']['report_show_zero'] ? 'selected' : '' ?> ><?php echo $this->lang->line('No') ?></option>
                            <option value="1" <?php echo $data['data']['report_show_zero'] ? 'selected' : '' ?>><?php echo $this->lang->line('Yes') ?></option>
                        </select>
                    </div>
                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="general_payroll_update" class="btn btn-success margin-bottom"
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
            if (!/[0-9]/.test(keyValue)) {
                e.preventDefault();
            }
        }
    });
    $("#general_payroll_update").click(function (e) {
        e.preventDefault();
        var actionurl = baseurl + 'settings/payroll_settings';
        actionProduct(actionurl);
    });
</script>
