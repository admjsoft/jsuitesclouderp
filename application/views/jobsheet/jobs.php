<article class="content-body">
<div class="row">
<div class="col-12">
<?php if (isset($_SESSION['status'])) {
    echo '<div id="notify" class="alert alert-'.$_SESSION['status'].'">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message">' .$_SESSION['message']. '</div>
        </div>';
    unset($_SESSION['status']);
    unset($_SESSION['message']);
} ?>
</div>
</div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink"><?php echo $assign ?></h3>
                                <span><?php echo $this->lang->line('Waiting') ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-clock-o pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="blue"><?php echo $pending ?></h3>
                                <span><?php echo $this->lang->line('Pending') ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-refresh blue font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="success"><?php echo $completed ?></h3>
                                <span><?php echo $this->lang->line('Completed') ?>Completed</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-check-circle success font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="cyan"><?php echo $totalt ?></h3>
                                <span><?php echo $this->lang->line('Total') ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-pie-chart cyan font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">
            <div class="header-block">
                <h3 class="title">
                    <?php //echo $this->lang->line('Support Tickets')?>
                </h3></div>


            <p>&nbsp;</p>

            <table id="doctable" class="table table-striped table-bordered zero-configuration" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $this->lang->line('Subject') ?></th>
                    <th><?php echo $this->lang->line('Added') ?></th>
                    <th><?php echo $this->lang->line('Status') ?></th>
                    <th><?php echo $this->lang->line('Action') ?></th>


                </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
    <input type="hidden" id="dashurl" value="tickets/ticket_stats">
</article>
<div id="delete_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><?php echo $this->lang->line('Delete') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('delete this ticket') ?></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" value="">
                <input type="hidden" id="action-url" value="jobsheets/delete_ticket">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="delete-confirm"><?php echo $this->lang->line('Delete') ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $this->lang->line('Cancel') ?></button>
            </div>
        </div>
    </div>
</div>
<?php echo form_open('jobsheets/assign');
?>
<div id="assign_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><?php //echo $this->lang->line('Assign')?>Assign</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?php //echo $this->lang->line('delete this ticket')?>Employee</p>
        <select name="employee" class="form-control employee emp-list" >
            <option>-- Select Employee --</option>
        </select>
        <br />
        <p>Job type</p>
        <input type="text" class="form-control" name="jobtype" value="" placeholder="Like:Task, Urgent, Imidate or etc." />
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" class="jobid" name="jobid" value="">
                <input type="submit" class="btn btn-primary" value="<?php // echo $this->lang->line('Assign')?>Assign" />
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $this->lang->line('Cancel') ?></button>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function () {

        $('#doctable').DataTable({

            "processing": true,
            "serverSide": true,
            responsive: true,
            <?php datatable_lang();?>
            "ajax": {
                "url": "<?php if (isset($_GET['filter'])) {
                    $filter = $_GET['filter'];
                } else {
                    $filter = '';
                }    echo site_url('jobsheets/tasks_load_list?stat=' . $filter)?>",
                "type": "POST",
                'data': {'<?=$this->security->get_csrf_token_name()?>': crsf_hash}
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false,
                },
            ],
            "order": [[2, "desc"]]

        });
        miniDash();


        $.ajax({

        url: "<?php echo site_url('employee/employee_list') ?>",
        type: 'POST',
        success: function (data) {
            $('.emp-list').append(data);
        },
        error: function(data) {
        //console.log(data);
            console.log("Error not get emp list")
        }

    });
});

$(document).on('click', ".assign-object", function (e) {
    e.preventDefault();
    $('.jobid').val($(this).attr('data-object-id'));
    $(this).closest('tr').attr('id',$(this).attr('data-object-id'));
    $('#assign_model').modal({backdrop: 'static', keyboard: false});
});

</script>
