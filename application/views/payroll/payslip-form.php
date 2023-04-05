<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5>Payslip</h5>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <hr/>
        <div class="card-content">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div class="card-body">
                <div class="row sameheight-container">
                    <div class="col-md-6">
                        <div class="card card-block sameheight-item">

                            <form action="<?php echo base_url() ?>payroll/payslip" method="post" role="form">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                       value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="pay_cat">Employee</label>

                                    <div class="col-sm-9">
                                        <select name="employee" class="form-control">
                                            <?php
                                            foreach ($employees as $row) {
                                                $cid = $row['id'];
                                                $name = $row['name'];
                                                echo "<option value='$cid'>$name</option>";
                                            }
                            ?>
                                        </select>


                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="month">Month</label>

                                    <div class="col-sm-9">
                                        <select name="month" class="form-control">
                                            <option value='1'>January</option>
                                            <option value='2'>February</option>
                                            <option value='3'>March</option>
                                            <option value='4'>April</option>
                                            <option value='5'>May</option>
                                            <option value='6'>June</option>
                                            <option value='7'>July</option>
                                            <option value='8'>August</option>
                                            <option value='9'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="year">Year</label>

                                    <div class="col-sm-9">
                                        <select name="year" class="form-control">
                                            <?php $years = range(2020, 2030, 1); ?>
                                            <?php foreach ($years as $v) { ?>
                                                <option value='<?= $v ?>'><?= $v ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="payslip_submit"></label>

                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-md" value="View">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
