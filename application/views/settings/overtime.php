<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="product_action" class="form-horizontal">
            <div class="card-body">
                <hr>
                <h5>Overtime Settings</h5>
                <p>...</p>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[normal_rate]">Normal Rate</label>
                    <div class="col-sm-6">
                        <input name="data[normal_rate]" type="number" max="100" min="0.1" step="0.1" class="form-control form-number" value="<?php echo $data['data']['normal_rate']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[public_holiday_rate]">Public Holiday Rate</label>
                    <div class="col-sm-6">
                        <input name="data[public_holiday_rate]" type="number" max="100" min="0.1" step="0.1" class="form-control form-number" value="<?php echo $data['data']['public_holiday_rate']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="data[extra_rate]">Extra Rate</label>
                    <div class="col-sm-6">
                        <input name="data[extra_rate]" type="number" max="100" min="0.1" step="0.1" class="form-control form-number" value="<?php echo $data['data']['extra_rate']; ?>"/>
                    </div>
                </div>

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="overtime_update" class="btn btn-success margin-bottom"
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
    $("#overtime_update").click(function (e) {
        e.preventDefault();
        var actionurl = baseurl + 'settings/overtime_settings';
        actionProduct(actionurl);
    });
</script>
