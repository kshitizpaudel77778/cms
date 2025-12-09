<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Event Dates</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Event Dates</h6>
        <div class="float-right d-inline">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEventDateModal">
                <i class="fa fa-plus"></i> Add New
            </button>            
            <!-- Modal Start -->
            <div class="modal fade" id="addEventDateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Event Date</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(base_url().'admin/event-date'); ?>
                                <div class="form-group">
                                    <label for="">Name *</label>
                                    <input type="text" class="form-control" name="ed_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Month *</label>
                                    <select name="ed_month" class="form-control">
                                        <?php
                                        for($i=1;$i<=12;$i++)
                                        {
                                            $temp = date('F', mktime(0, 0, 0, $i, 10));
                                            ?>
                                            <option value="<?php echo safe_data($temp); ?>"><?php echo safe_data($temp); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Day *</label>
                                    <select name="ed_day" class="form-control">
                                        <?php
                                        for($i=1;$i<=31;$i++)
                                        {
                                            ?>
                                            <option value="<?php echo safe_data($i); ?>"><?php echo safe_data($i); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" name="form_event_date_add">Submit</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Modal End -->
        </div>
    </div>
    <div class="card-body">       
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $m=0;
                    foreach($event_date_all as $row)
                    {
                        $m++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($m); ?></td>
                            <td><?php echo safe_data($row['ed_name']); ?></td>
                            <td><?php echo safe_data($row['ed_month']); ?></td>
                            <td><?php echo safe_data($row['ed_day']); ?></td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editEventDateModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/event-date/delete-event-date/<?php echo safe_data($row['ed_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Start -->
                        <div class="modal fade" id="editEventDateModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Event Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open(base_url().'admin/event-date'); ?>
                                            <input type="hidden" name="ed_id" value="<?php echo safe_data($row['ed_id']); ?>">
                                            <div class="form-group">
                                                <label for="">Name *</label>
                                                <input type="text" class="form-control" name="ed_name" value="<?php echo safe_data($row['ed_name']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Month *</label>
                                                <select name="ed_month" class="form-control">
                                                    <?php
                                                    for($i=1;$i<=12;$i++)
                                                    {
                                                        $temp = date('F', mktime(0, 0, 0, $i, 10));
                                                        ?>
                                                        <option value="<?php echo safe_data($temp); ?>" <?php if($row['ed_month'] == $temp) {echo 'selected';} ?>><?php echo safe_data($temp); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Day *</label>
                                                <select name="ed_day" class="form-control">
                                                    <?php
                                                    for($i=1;$i<=31;$i++)
                                                    {
                                                        ?>
                                                        <option value="<?php echo safe_data($i); ?>" <?php if($row['ed_day'] == $i) {echo 'selected';} ?>><?php echo safe_data($i); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="form_event_date_update">Update</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Modal End -->

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

<?php $this->view('admin/footer'); ?>