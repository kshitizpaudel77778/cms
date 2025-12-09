<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Social Media</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Social Media</h6>
        <div class="float-right d-inline">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSocialMediaModal">
                <i class="fa fa-plus"></i> Add New
            </button>            
            <!-- Modal Start -->
            <div class="modal fade" id="addSocialMediaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Social Media</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'admin/social-media'); ?>
                                <div class="form-group">
                                    <label for="">URL *</label>
                                    <input type="text" class="form-control" name="url">
                                </div>
                                <div class="form-group">
                                    <label for="">Icon (Font Awesome Code) *</label>
                                    <input type="text" class="form-control" name="icon">
                                </div>
                                <button type="submit" class="btn btn-success" name="form_social_media_add">Submit</button>
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
                        <th>URL</th>
                        <th>Icon (Font Awesome)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($social_media_all as $row)
                    {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($i); ?></td>
                            <td><?php echo safe_data($row['url']); ?></td>
                            <td><?php echo safe_data($row['icon']); ?></td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSocialMediaModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/social-media/delete-social-media/<?php echo safe_data($row['id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Start -->
                        <div class="modal fade" id="editSocialMediaModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Social Media</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart(base_url().'admin/social-media'); ?>
                                            <input type="hidden" name="id" value="<?php echo safe_data($row['id']); ?>">
                                            <div class="form-group">
                                                <label for="">URL *</label>
                                                <input type="text" class="form-control" name="url" value="<?php echo safe_data($row['url']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Icon (Font Awesome) *</label>
                                                <input type="text" class="form-control" name="icon" value="<?php echo safe_data($row['icon']); ?>">
                                            </div>
                                            <button type="submit" class="btn btn-success" name="form_social_media_update">Update</button>
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