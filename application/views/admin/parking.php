<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Parking</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Page Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Parking Place</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <!-- Tab 1 Content -->
        <?php echo form_open(base_url().'admin/parking'); ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Description</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Parking Page Description</label>
                    <textarea name="description" class="form-control editor" cols="30" rows="10"><?php echo safe_data($parking_description['description']); ?></textarea>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($parking_description['seo_title']); ?>">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($parking_description['seo_meta_description']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="form_description">Update</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        <!-- // Tab 1 Content -->
    </div>


    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <!-- Tab 2 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Parking Places</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addParkingModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addParkingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Parking Place</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/parking'); ?>
                                        <div class="form-group">
                                            <label for="">Parking Place Name *</label>
                                            <input type="text" class="form-control" name="parking_place_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Parking Place Description</label>
                                            <textarea name="parking_place_description" class="form-control h_200"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Parking Place Map *</label>
                                            <textarea name="parking_place_map" class="form-control h_200"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_parking_place_add">Submit</button>
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
                                <th>Parking Map Preview</th>
                                <th>Parking Place Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($parking_place_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['parking_place_map']); ?></td>
                                    <td><?php echo safe_data($row['parking_place_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editParkingModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/parking/delete-parking-place/<?php echo safe_data($row['parking_place_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editParkingModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Parking Place</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart(base_url().'admin/parking'); ?>
                                                    <input type="hidden" name="parking_place_id" value="<?php echo safe_data($row['parking_place_id']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Parking Place Name *</label>
                                                        <input type="text" class="form-control" name="parking_place_name" value="<?php echo safe_data($row['parking_place_name']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Parking Place Description</label>
                                                        <textarea name="parking_place_description" class="form-control h_200"><?php echo safe_data($row['parking_place_description']); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Parking Place Map *</label>
                                                        <textarea name="parking_place_map" class="form-control h_200"><?php echo safe_data($row['parking_place_map']); ?></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_parking_place_update">Update</button>
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

</div>

<?php $this->view('admin/footer'); ?>