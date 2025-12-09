<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Events</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Events</h6>
        <div class="float-right d-inline">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEventModal">
                <i class="fa fa-plus"></i> Add New
            </button>            
            <!-- Modal Start -->
            <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(base_url().'admin/event'); ?>
                                <div class="form-group">
                                    <label for="">Name *</label>
                                    <input type="text" class="form-control" name="e_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Time *</label>
                                    <input type="text" class="form-control" name="e_time">
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description *</label>
                                    <textarea name="e_short_description" class="form-control h_100" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Description *</label>
                                    <textarea name="e_description" class="form-control editor" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Event Date *</label>
                                    <select name="ed_id" class="form-control">
                                        <?php
                                        foreach($all_event_date as $row)
                                        {
                                            ?>
                                            <option value="<?php echo safe_data($row['ed_id']); ?>"><?php echo safe_data($row['ed_name']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Speaker *</label>
                                    <select name="speaker_id" class="form-control">
                                        <?php
                                        foreach($all_speaker as $row)
                                        {
                                            ?>
                                            <option value="<?php echo safe_data($row['id']); ?>"><?php echo safe_data($row['name']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" name="form_event_add">Submit</button>
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
                        <th>Time</th>
                        <th>Event Date Name</th>
                        <th>Event Date Month and Day</th>
                        <th>Speaker</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($event_all as $row)
                    {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($i); ?></td>
                            <td><?php echo safe_data($row['e_name']); ?></td>
                            <td><?php echo safe_data($row['e_time']); ?></td>
                            <td><?php echo safe_data($row['ed_name']); ?></td>
                            <td><?php echo safe_data($row['ed_month'].' '.$row['ed_day']); ?></td>
                            <td><?php echo safe_data($row['name']); ?></td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editEventModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/event/delete-event/<?php echo safe_data($row['e_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Start -->
                        <div class="modal fade" id="editEventModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open(base_url().'admin/event'); ?>
                                            <input type="hidden" name="e_id" value="<?php echo safe_data($row['e_id']); ?>">
                                            <div class="form-group">
                                                <label for="">Name *</label>
                                                <input type="text" class="form-control" name="e_name" value="<?php echo safe_data($row['e_name']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Time *</label>
                                                <input type="text" class="form-control" name="e_time" value="<?php echo safe_data($row['e_time']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Short Description *</label>
                                                <textarea name="e_short_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($row['e_short_description']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description *</label>
                                                <textarea name="e_description" class="form-control editor" cols="30" rows="10"><?php echo safe_data($row['e_description']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Event Date *</label>
                                                <select name="ed_id" class="form-control">
                                                    <?php
                                                    foreach($all_event_date as $row1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo safe_data($row1['ed_id']); ?>" <?php if($row['ed_id'] == $row1['ed_id']) {echo 'selected';} ?>><?php echo safe_data($row1['ed_name']); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Speaker *</label>
                                                <select name="speaker_id" class="form-control">
                                                    <?php
                                                    foreach($all_speaker as $row1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo safe_data($row1['id']); ?>" <?php if($row['speaker_id'] == $row1['id']) {echo 'selected';} ?>><?php echo safe_data($row1['name']); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="form_event_update">Update</button>
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