<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Sponsors</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Page Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Category</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Sponsor</a>
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
                <?php echo form_open(base_url().'admin/sponsor'); ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($sponsor_page_info['seo_title']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($sponsor_page_info['seo_meta_description']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_sponsor_page_info">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- // Tab 1 Content -->
    </div>


    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
        <!-- Tab 2 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Sponsor Categories</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSponsorCategoryModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addSponsorCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Sponsor Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/sponsor'); ?>
                                        <div class="form-group">
                                            <label for="">Sponsor Category Name *</label>
                                            <input type="text" class="form-control" name="sponsor_category_name">
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_sponsor_category_add">Submit</button>
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
                                <th>Sponsor Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($sponsor_category_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['sponsor_category_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSponsorCategoryModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/sponsor/delete-category/<?php echo safe_data($row['sponsor_category_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editSponsorCategoryModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Sponsor Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart(base_url().'admin/sponsor'); ?>
                                                    <input type="hidden" name="sponsor_category_id" value="<?php echo safe_data($row['sponsor_category_id']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Sponsor Category Name *</label>
                                                        <input type="text" class="form-control" name="sponsor_category_name" value="<?php echo safe_data($row['sponsor_category_name']); ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_sponsor_category_update">Update</button>
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
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Sponsor</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSponsorModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addSponsorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Sponsor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/sponsor'); ?>
                                        <div class="form-group">
                                            <label for="">Sponsor Photo *</label>
                                            <div>
                                                <input type="file" name="sponsor_photo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sponsor URL</label>
                                            <input type="text" class="form-control" name="sponsor_url">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select Category *</label>
                                            <select name="sponsor_category_id" class="form-control">
                                                <?php
                                                foreach($sponsor_category_all as $row)
                                                {
                                                    ?>
                                                    <option value="<?php echo safe_data($row['sponsor_category_id']); ?>"><?php echo safe_data($row['sponsor_category_name']); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_sponsor_add">Submit</button>
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
                                <th>Photo</th>
                                <th>URL</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($sponsor_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['sponsor_photo']); ?>" alt="" class="w_150">
                                    </td>
                                    <td><?php echo safe_data($row['sponsor_url']); ?></td>
                                    <td><?php echo safe_data($row['sponsor_category_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSponsorModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/sponsor/delete-sponsor/<?php echo safe_data($row['sponsor_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editSponsorModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Sponsor</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart(base_url().'admin/sponsor'); ?>
                                                    <input type="hidden" name="sponsor_id" value="<?php echo safe_data($row['sponsor_id']); ?>">
                                                    <input type="hidden" name="current_photo" value="<?php echo safe_data($row['sponsor_photo']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Existing Sponsor Photo</label>
                                                        <div>
                                                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['sponsor_photo']); ?>" alt="" class="w_150">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Change Sponsor Photo</label>
                                                        <div>
                                                            <input type="file" name="sponsor_photo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sponsor URL</label>
                                                        <input type="text" class="form-control" name="sponsor_url" value="<?php echo safe_data($row['sponsor_url']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Select Category</label>
                                                        <select name="sponsor_category_id" class="form-control">
                                                            <?php
                                                            foreach($sponsor_category_all as $rr)
                                                            {
                                                                ?>
                                                                <option value="<?php echo safe_data($rr['sponsor_category_id']); ?>" <?php if($row['sponsor_category_id'] == $rr['sponsor_category_id']) {echo 'selected';} ?>><?php echo safe_data($rr['sponsor_category_name']); ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_sponsor_update">Update</button>
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