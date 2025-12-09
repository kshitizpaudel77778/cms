<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Update Profile</h1>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Change Information</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Change Photo</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <!-- Tab 1 Content -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">        
                        <?php echo form_open(base_url().'admin/profile'); ?>
                            <div class="form-group">
                                <label for="">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" value="<?php echo safe_data($this->session->userdata('full_name')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address *</label>
                                <input type="email" name="email" class="form-control" value="<?php echo safe_data($this->session->userdata('email')); ?>">
                            </div>
                            <button type="submit" class="btn btn-success" name="form1">Update</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Tab 1 Content -->

    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <!-- Tab 2 Content -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">        
                        <?php echo form_open(base_url().'admin/profile'); ?>
                            <div class="form-group">
                                <label for="">New Password *</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Retype New Password *</label>
                                <input type="password" name="re_password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success" name="form2">Update</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Tab 2 Content -->

    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

        <!-- Tab 3 Content -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">        
                        <?php echo form_open_multipart(base_url().'admin/profile'); ?>
                            <div class="form-group">
                                <label for="">Existing Photo </label>
                                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($this->session->userdata('photo')); ?>" class="w_150"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Change Photo *</label>
                                <div><input type="file" name="photo"></div>
                            </div>
                            <button type="submit" class="btn btn-success" name="form3">Update</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Tab 3 Content -->

    </div>
</div>

<?php $this->view('admin/footer'); ?>