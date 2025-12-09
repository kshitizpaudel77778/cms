<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Photo Gallery</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Page Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Category</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Photo</a>
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
                <?php echo form_open(base_url().'admin/photo'); ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($photo_page_info['seo_title']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($photo_page_info['seo_meta_description']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_photo_page_info">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- // Tab 1 Content -->
    </div>




    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">

        <!-- Tab 2 Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Photo Categories</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPhotoCategoryModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addPhotoCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Photo Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/photo'); ?>
                                        <div class="form-group">
                                            <label for="">Photo Category Name *</label>
                                            <input type="text" class="form-control" name="photo_category_name">
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_photo_category_add">Submit</button>
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
                                <th>Photo Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($photo_category_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td><?php echo safe_data($row['photo_category_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPhotoCategoryModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/photo/delete-category/<?php echo safe_data($row['photo_category_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editPhotoCategoryModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Photo Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart(base_url().'admin/photo'); ?>
                                                    <input type="hidden" name="photo_category_id" value="<?php echo safe_data($row['photo_category_id']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Photo Category Name *</label>
                                                        <input type="text" class="form-control" name="photo_category_name" value="<?php echo safe_data($row['photo_category_name']); ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_photo_category_update">Update</button>
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
                <h6 class="m-0 mt-2 font-weight-bold text-primary">View Photo</h6>
                <div class="float-right d-inline">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPhotoModal">
                        <i class="fa fa-plus"></i> Add New
                    </button>            
                    <!-- Modal Start -->
                    <div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart(base_url().'admin/photo'); ?>
                                        <div class="form-group">
                                            <label for="">Photo *</label>
                                            <div>
                                                <input type="file" name="photo_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Photo Caption</label>
                                            <input type="text" class="form-control" name="photo_caption">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select Category *</label>
                                            <select name="photo_category_id" class="form-control">
                                                <?php
                                                foreach($photo_category_all as $row)
                                                {
                                                    ?>
                                                    <option value="<?php echo safe_data($row['photo_category_id']); ?>"><?php echo safe_data($row['photo_category_name']); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="form_photo_add">Submit</button>
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
                                <th>Caption</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($photo_all as $row)
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo safe_data($i); ?></td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo_name']); ?>" alt="" class="w_150">
                                    </td>
                                    <td><?php echo safe_data($row['photo_caption']); ?></td>
                                    <td><?php echo safe_data($row['photo_category_name']); ?></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPhotoModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/photo/delete-photo/<?php echo safe_data($row['photo_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Start -->
                                <div class="modal fade" id="editPhotoModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart(base_url().'admin/photo'); ?>
                                                    <input type="hidden" name="photo_id" value="<?php echo safe_data($row['photo_id']); ?>">
                                                    <input type="hidden" name="current_photo" value="<?php echo safe_data($row['photo_name']); ?>">
                                                    <div class="form-group">
                                                        <label for="">Existing Photo</label>
                                                        <div>
                                                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo_name']); ?>" alt="" class="w_150">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Change Photo</label>
                                                        <div>
                                                            <input type="file" name="photo_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Photo Caption</label>
                                                        <input type="text" class="form-control" name="photo_caption" value="<?php echo safe_data($row['photo_caption']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Select Category</label>
                                                        <select name="photo_category_id" class="form-control">
                                                            <?php
                                                            foreach($photo_category_all as $rr)
                                                            {
                                                                ?>
                                                                <option value="<?php echo safe_data($rr['photo_category_id']); ?>" <?php if($row['photo_category_id'] == $rr['photo_category_id']) {echo 'selected';} ?>><?php echo safe_data($rr['photo_category_name']); ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success" name="form_photo_update">Update</button>
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