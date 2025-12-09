<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Admins</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Admins</h6>
        <div class="float-right d-inline">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Add New
            </button>
            <!-- Modal Start -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart(base_url().'admin/admin'); ?>
                                <div class="form-group">
                                    <label for="">Full Name *</label>
                                    <input type="text" class="form-control" name="full_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email *</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password *</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="">Photo *</label>
                                    <div><input type="file" name="photo"></div>
                                </div>
                                <button type="submit" class="btn btn-success" name="form_add">Submit</button>
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
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($admin_all as $row)
                    {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($i); ?></td>
                            <td>
                                <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="" class="w_100">
                            </td>
                            <td><?php echo safe_data($row['full_name']); ?></td>
                            <td><?php echo safe_data($row['email']); ?></td>
                            <td><?php echo safe_data($row['role']); ?></td>
                            <td>
                                <?php if($row['role']!='Super Admin'): ?>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdminModal<?php echo safe_data($i); ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/admin/delete/<?php echo safe_data($row['id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                <?php endif; ?>

                            </td>
                        </tr>

                        <!-- Modal Start -->
                        <div class="modal fade" id="editAdminModal<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart(base_url().'admin/admin'); ?>
                                            <input type="hidden" name="id" value="<?php echo safe_data($row['id']); ?>">
                                            <input type="hidden" name="current_photo" value="<?php echo safe_data($row['photo']); ?>">
                                            <div class="form-group">
                                                <label for="">Full Name *</label>
                                                <input type="text" class="form-control" name="full_name" value="<?php echo safe_data($row['full_name']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email *</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo safe_data($row['email']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control" value=""><span class="text-danger">Keep this blank, if you don't want to change password</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Existing Photo</label>
                                                <div>
                                                    <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="" class="w_100">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Change Photo</label>
                                                <div><input type="file" name="photo"></div>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="form_update">Update</button>
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