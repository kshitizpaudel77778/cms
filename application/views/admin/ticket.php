<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Ticket</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Page Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Ticket</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Ticket Detail</a>
    </li>
</ul>



<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
        <!-- Tab 1 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">                
                <?php echo form_open(base_url().'admin/ticket'); ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($ticket_page_info['seo_title']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($ticket_page_info['seo_meta_description']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_ticket_page_info">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- // Tab 1 Content -->
    </div>


    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
        <!-- Tab 2 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Ticket</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicketModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addTicketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Ticket</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open(base_url().'admin/ticket'); ?>
                                        <div class="form-group">
                                            <label for="">Ticket Name *</label>
                                            <input type="text" class="form-control" name="ticket_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ticket Price *</label>
                                            <input type="text" class="form-control" name="ticket_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ticket Maximum *</label>
                                            <input type="text" class="form-control" name="ticket_maximum">
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_ticket_add">Submit</button>
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
                                <th>Ticket Name</th>
                                <th>Ticket Price</th>
                                <th>Ticket Maximum</th>
                                <th>Ticket Sold</th>
                                <th>Ticket Available</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($ticket_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['ticket_name']); ?></td>
                                    <td><?php echo safe_data($row['ticket_price']); ?></td>
                                    <td><?php echo safe_data($row['ticket_maximum']); ?></td>
                                    <td><?php echo safe_data($row['ticket_sold']); ?></td>
                                    <td><?php echo safe_data($row['ticket_maximum']-$row['ticket_sold']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTicketModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/ticket/delete-ticket/<?php echo safe_data($row['ticket_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editTicketModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Ticket</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open(base_url().'admin/ticket'); ?>
                                                    <input type="hidden" name="ticket_id" value="<?php echo safe_data($row['ticket_id']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Ticket Name *</label>
                                                        <input type="text" class="form-control" name="ticket_name" value="<?php echo safe_data($row['ticket_name']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ticket Price *</label>
                                                        <input type="text" class="form-control" name="ticket_price" value="<?php echo safe_data($row['ticket_price']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ticket Maximum *</label>
                                                        <input type="text" class="form-control" name="ticket_maximum" value="<?php echo safe_data($row['ticket_maximum']); ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_ticket_update">Update</button>
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
        <!-- // Tab 2 Content -->
    </div>


    <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
        <!-- Tab 3 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Ticket Detail</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicketDetailModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addTicketDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Ticket Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open(base_url().'admin/ticket'); ?>
                                        <div class="form-group">
                                            <label for="">Ticket Detail Text *</label>
                                            <input type="text" class="form-control" name="ticket_detail_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ticket Detail Available</label>
                                            <select name="ticket_detail_available" class="form-control">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select Ticket *</label>
                                            <select name="ticket_id" class="form-control">
                                                <?php
                                                foreach($ticket_all as $row)
                                                {
                                                    ?>
                                                    <option value="<?php echo safe_data($row['ticket_id']); ?>"><?php echo safe_data($row['ticket_name']); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_ticket_detail_add">Submit</button>
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
                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Ticket Detail Text</th>
                                <th>Ticket Detail Available</th>
                                <th>Ticket</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($ticket_detail_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['ticket_detail_text']); ?></td>
                                    <td><?php echo safe_data($row['ticket_detail_available']); ?></td>
                                    <td><?php echo safe_data($row['ticket_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTicketDetailModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/ticket/delete-ticket-detail/<?php echo safe_data($row['ticket_detail_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editTicketDetailModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Ticket Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open(base_url().'admin/ticket'); ?>
                                                    <input type="hidden" name="ticket_detail_id" value="<?php echo safe_data($row['ticket_detail_id']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Ticket Detail Text *</label>
                                                        <input type="text" class="form-control" name="ticket_detail_text" value="<?php echo safe_data($row['ticket_detail_text']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ticket Detail Available</label>
                                                        <select name="ticket_detail_available" class="form-control">
                                                            <option value="Yes" <?php if($row['ticket_detail_available'] == 'Yes') {echo 'selected';} ?>>Yes</option>
                                                            <option value="No" <?php if($row['ticket_detail_available'] == 'No') {echo 'selected';} ?>>No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Select Ticket</label>
                                                        <select name="ticket_id" class="form-control">
                                                            <?php
                                                            foreach($ticket_all as $rr)
                                                            {
                                                                ?>
                                                                <option value="<?php echo safe_data($rr['ticket_id']); ?>" <?php if($row['ticket_id'] == $rr['ticket_id']) {echo 'selected';} ?>><?php echo safe_data($rr['ticket_name']); ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_ticket_detail_update">Update</button>
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
        <!-- // Tab 3 Content -->
    </div>


</div>

<?php $this->view('admin/footer'); ?>