<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Login Page Photo</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/setting/login-photo'); ?>
            <input type="hidden" name="current_photo" value="<?php echo safe_data($setting_login_photo['login_photo']); ?>">
            <div class="form-group">
                <label for="">Existing Photo</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($setting_login_photo['login_photo']); ?>" alt="" class="w_300"></div>
            </div>
            <div class="form-group">
                <label for="">Change Photo *</label>
                <div><input type="file" name="login_photo"></div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>