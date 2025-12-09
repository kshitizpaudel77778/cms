<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Attendees</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Page Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Attendees</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <!-- Tab 1 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">                
                <?php echo form_open(base_url().'admin/attendee'); ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($attendee_page_info['seo_title']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($attendee_page_info['seo_meta_description']); ?></textarea>
                    </div>                    
                    <button type="submit" class="btn btn-success" name="form_attendee_page_info">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- // Tab 1 Content -->
    </div>


    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <!-- Tab 2 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Attendees</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addAttendeeModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addAttendeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Attendee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/attendee'); ?>
                                        <div class="form-group">
                                            <label for="">First Name *</label>
                                            <input type="text" class="form-control" name="first_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name *</label>
                                            <input type="text" class="form-control" name="last_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email *</label>
                                            <input type="text" class="form-control" name="email" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone *</label>
                                            <input type="text" class="form-control" name="phone" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Country *</label>
                                            <input type="text" class="form-control" name="country" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address *</label>
                                            <input type="text" class="form-control" name="address" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">State *</label>
                                            <input type="text" class="form-control" name="state" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">City *</label>
                                            <input type="text" class="form-control" name="city" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Zip Code *</label>
                                            <input type="text" class="form-control" name="zip" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Website</label>
                                            <input type="text" class="form-control" name="website" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Want to be listed?</label>
                                            <select name="want_to_be_listed" class="form-control">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select Ticket</label>
                                            <select name="ticket_id" class="form-control">
                                                <?php
                                                foreach($ticket_all as $rr)
                                                {
                                                    ?>
                                                    <option value="<?php echo safe_data($rr['ticket_id']); ?>"><?php echo safe_data($rr['ticket_name']); ?> (<?php echo '$'.safe_data($rr['ticket_price']); ?>)</option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_attendee_add">Submit</button>
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
                                <th>Ticket No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($attendee_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['ticket_no']); ?></td>
                                    <td><?php echo safe_data($row['first_name']); ?></td>
                                    <td><?php echo safe_data($row['last_name']); ?></td>
                                    <td><?php echo safe_data($row['email']); ?></td>
                                    <td><?php echo safe_data($row['phone']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewAttendeeModal<?php echo safe_data($i); ?>"><i class="fas fa-eye"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/attendee/delete-attendee/<?php echo safe_data($row['att_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="viewAttendeeModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Details about Attendee</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="">Ticket No</label>
                                                    <div><?php echo safe_data($row['ticket_no']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <div><?php echo safe_data($row['first_name']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Last Name</label>
                                                    <div><?php echo safe_data($row['last_name']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <div><?php echo safe_data($row['email']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <div><?php echo safe_data($row['phone']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Country</label>
                                                    <div><?php echo safe_data($row['country']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <div><?php echo safe_data($row['address']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <div><?php echo safe_data($row['state']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <div><?php echo safe_data($row['city']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Zip Code</label>
                                                    <div><?php echo safe_data($row['zip']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Website</label>
                                                    <div><?php echo safe_data($row['website']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Want to be listed?</label>
                                                    <div><?php echo safe_data($row['want_to_be_listed']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ticket Name</label>
                                                    <div><?php echo safe_data($row['ticket_name']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ticket Price</label>
                                                    <div><?php echo safe_data($row['ticket_price']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ticket Detail (What is available)</label>
                                                    <div><?php echo safe_data($row['ticket_detail_what_available']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ticket Detail (What is not available)</label>
                                                    <div><?php echo safe_data($row['ticket_detail_what_not_available']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Booking Date</label>
                                                    <div><?php echo safe_data($row['booking_date']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Booking Time</label>
                                                    <div><?php echo safe_data($row['booking_time']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Payment Method</label>
                                                    <div><?php echo safe_data($row['payment_method']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Payment Status</label>
                                                    <div><?php echo safe_data($row['payment_status']); ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Transaction ID</label>
                                                    <div><?php echo safe_data($row['transaction_id']); ?></div>
                                                </div>

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

</div>


<?php $this->view('admin/footer'); ?>